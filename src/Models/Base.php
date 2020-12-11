<?php
/** @noinspection PhpPropertyNamingConventionInspection */
declare(strict_types=1);

namespace Puggan\Gnucash\Models;

use JetBrains\PhpStorm\Pure;
use Puggan\Gnucash\Attributes\Field;
use Puggan\Gnucash\Attributes\Model;
use Puggan\Gnucash\Attributes\Relation;
use Puggan\Gnucash\Interfaces\PrimaryKeyGenerator;

/**
 * Class Base
 * @package Puggan\Gnucash\Models
 */
abstract class Base implements \JsonSerializable
{
    /** @var string[] $tables [tableNames...] */
    private static array $tables = [];
    /** @var string[][] $primaryKeys [dbNames...] */
    private static array $primaryKeys = [];
    /** @var \ReflectionProperty[][] $fields dbName => Property */
    private static array $fields = [];
    /** @var Relation[][] $relations */
    private static array $relations = [];

    protected array $_old = [];

    private static function loadAttribtes(): void
    {
        $class = new \ReflectionClass(static::class);

        //<editor-fold desc="Table">
        $models = $class->getAttributes(Model::class);
        if (\count($models) !== 1) {
            var_dump($class);
            throw new \UnexpectedValueException(
                'Models should have 1 Model attribute, ' . static::class . ' have ' . \count($models)
            );
        }
        /** @var Model $model */
        $model = $models[0]->newInstance();
        if (!$model->tableName) {
            $model->tableName = strtolower($class->name);
        }
        self::$tables[static::class] = $model->tableName;
        //</editor-fold>

        self::$primaryKeys[static::class] = [];
        self::$fields[static::class] = [];
        foreach ($class->getProperties() as $property) {
            //<editor-fold desc="Fields">
            $fields = $property->getAttributes(Field::class);
            if (!empty($fields[0])) {
                /** @var Field $field */
                $field = $fields[0]->newInstance();
                if (!$field->dbName) {
                    $field->dbName = strtolower($property->name);
                }
                if ($field->primaryKey) {
                    self::$primaryKeys[static::class][] = $field->dbName;
                }
                self::$fields[static::class][$field->dbName] = $property;
                continue;
            }
            //</editor-fold>

            //<editor-fold desc="Relation">
            $relations = $property->getAttributes(Relation::class);
            if (!empty($relations[0])) {
                /** @var Field $field */
                $relation = $relations[0]->newInstance();
                self::$relations[static::class][$property->name] = $relation;
            }
            //</editor-fold>
        }
    }

    /** @noinspection PhpPureFunctionMayProduceSideEffectsInspection */
    #[Pure]
    public static function primaryKeyNames(): array
    {
        if(empty(self::$tables[static::class])) {
            static::loadAttribtes();
        }
        return self::$primaryKeys[static::class];
    }

    #[Pure]
    public function primaryKeys(bool $old = false): array
    {
        $keys = [];
        $fields = static::fieldNames();
        $keyNames = static::primaryKeyNames();
        if ($old) {
            foreach($keyNames as $dbName) {
                $keys[$dbName] = $this->_old[$fields[$dbName]];
            }
        } else {
            foreach($keyNames as $dbName) {
                $keys[$dbName] = $this->{$fields[$dbName]};
            }
        }
        return $keys;
    }

    /** @noinspection PhpPureFunctionMayProduceSideEffectsInspection */
    #[Pure]
    public static function tableName(): string
    {
        if(empty(self::$tables[static::class])) {
            static::loadAttribtes();
        }
        return self::$tables[static::class];
    }

    /** @noinspection PhpPureFunctionMayProduceSideEffectsInspection */
    #[Pure]
    public static function fieldNames(): array
    {
        if(empty(self::$tables[static::class])) {
            static::loadAttribtes();
        }
        $names = [];
        foreach (self::$fields[static::class] as $dbName => $field) {
            $names[$dbName] = $field->name;
        }
        return $names;
    }

    /** @noinspection PhpPureFunctionMayProduceSideEffectsInspection PDO::quote is Pure in our use-case */
    #[Pure]
    public static function buildWhere(\PDO $database, array $values, string $glue = ' AND '): string
    {
        $parts = [];
        foreach($values as $dbName => $value) {
            $value = $database->quote($value);
            $parts[] = "`{$dbName}` = $value";
        }
        return implode($glue, $parts);
    }

    public function jsonSerialize(): array
    {
        $data = $this->getFields();
        $data['_class'] = static::class;
        return $data;
    }

    public function getFields(): array
    {
        $data = get_object_vars($this);
        unset($data['_old']);
        return $data;
    }

    public function storeOld(): void
    {
        $this->_old = $this->getFields();
    }

    public function getChanged(): array
    {
        $data = $this->getFields();
        if (!$this->_old) {
            return $data;
        }
        $filter = fn($value, $propertyName) => $value !== $this->_old[$propertyName];
        return array_filter($data, $filter, ARRAY_FILTER_USE_BOTH);
    }

    public function insert(\PDO $database): static
    {
        $fieldNames = static::fieldNames();

        if ($this instanceOf PrimaryKeyGenerator) {
            $this->fixMissingPK();
        }

        $setParts = [];
        foreach ($fieldNames as $dbName => $propertyName) {
            $value = $database->quote($this->$propertyName);
            $setParts[$dbName] = "`{$dbName}` = {$value}";
        }

        $tableName = static::tableName();
        $setPart = implode(', ', $setParts);
        $database->exec("INSERT INTO `{$tableName}` SET {$setPart}");

        return self::loadOneFromDb($database, $this->primaryKeys());
    }

    public function save(\PDO $database, bool $force = false): static
    {
        $fieldNames = static::fieldNames();
        $primaryKeys = $this->primaryKeys(true);

        if (!$primaryKeys || !array_filter($primaryKeys)) {
            return $this->insert($database);
        }

        $fields = $force ? $this->getFields() : $this->getChanged();
        if (!$fields) {
            return self::loadOneFromDb($database, $primaryKeys);
        }

        $setParts = [];
        foreach ($fieldNames as $dbName => $propertyName) {
            if (isset($fields[$propertyName])) {
                $setParts[$dbName] = $dbName . ' = ' . $database->quote($fields[$propertyName]);
                if ($fields[$propertyName] === false) {
                    $setParts[$dbName] = $dbName . ' = 0';
                }
            } elseif (\array_key_exists($propertyName, $fields)) {
                $setParts[$dbName] = $dbName . ' = NULL';
            }
        }
        $tableName = static::tableName();
        $filter = self::buildWhere($database, $primaryKeys);
        $setPart = self::buildWhere($database, $setParts, ', ');
        $database->exec("UPDATE {$tableName} SET {$setPart} WHERE {$filter}");

        return self::loadOneFromDb($database, $primaryKeys);
    }

    public static function loadOneFromDb(\PDO $database, array $pkIds): static
    {
        return self::loadAllFromDb($database, self::buildWhere($database, $pkIds) . ' LIMIT 1')->current();
    }

    /**
     * @param \PDO $database
     * @param string|null $filter
     * @return \Generator<static>
     */
    public static function loadAllFromDb(\PDO $database, string $filter = null): \Generator
    {
        $selectParts = [];
        $fieldNames = static::fieldNames();
        foreach ($fieldNames as $dbName => $propertyName) {
            if ($dbName === $propertyName) {
                $selectParts[$propertyName] = $dbName;
            } else {
                $selectParts[$propertyName] = $dbName . ' AS ' . $propertyName;
            }
        }

        $tableName = self::tableName();
        $selectPart = implode(', ', $selectParts);
        if ($filter) {
            $statement = $database->query("SELECT {$selectPart} FROM {$tableName} WHERE {$filter}");
        } else {
            $statement = $database->query("SELECT {$selectPart} FROM {$tableName}");
        }
        $statement->setFetchMode(\PDO::FETCH_CLASS, static::class);
        while (false !== ($entity = $statement->fetch())) {
            /** @var static $entity */
            $entity->storeOld();
            yield $entity;
        }
    }
}
