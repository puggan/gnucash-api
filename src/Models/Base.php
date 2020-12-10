<?php

namespace Puggan\Gnucash\Models;

abstract class Base implements \JsonSerializable
{
    protected array $_old = [];

    abstract public function tableName(): string;

    abstract public function fieldNames(): array;

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
        $setParts = [];
        if (!$this->guid) {
            $this->guid = self::newGuid();
        }
        foreach ($this->fieldNames() as $dbName => $propertyName) {
            $setParts[$dbName] = $dbName . ' = ' . $database->quote($this->$propertyName);
        }

        $query = 'INSERT INTO ' . $this->tableName() . ' SET ' . implode(', ', $setParts);
        $database->exec($query);

        return self::loadOneFromDb($database, $this->guid);
    }

    public function save(\PDO $database, bool $force = false): static
    {
        if (!$this->guid || empty($this->_old['guid'])) {
            return $this->insert($database);
        }

        $fields = $force ? $this->getFields() : $this->getChanged();
        if (!$fields) {
            return self::loadOneFromDb($database, $this->guid);
        }

        $setParts = [];
        foreach ($this->fieldNames() as $dbName => $propertyName) {
            if (isset($fields[$propertyName])) {
                $setParts[$dbName] = $dbName . ' = ' . $database->quote($fields[$propertyName]);
                if ($fields[$propertyName] === false) {
                    $setParts[$dbName] = $dbName . ' = 0';
                }
            } elseif (\array_key_exists($propertyName, $fields)) {
                $setParts[$dbName] = $dbName . ' = NULL';
            }
        }
        $filter = ' guid = ' . $database->quote($this->_old['guid']);
        $query = 'UPDATE ' . $this->tableName() . ' SET ' . implode(', ', $setParts) . ' WHERE ' . $filter;
        $database->exec($query);

        return self::loadOneFromDb($database, $this->guid);
    }

    public static function guidClasses()
    {
        return [
            'accounts' => Account::class,
        ];
    }

    public static function getClassForGuid(\PDO $database, string $guid): ?string
    {
        $filter = ' WHERE guid = ' . $database->quote($guid);
        $subQueries = [];
        foreach (self::guidClasses() as $tableName => $className) {
            $subQueries[$tableName] = 'SELECT ' . $database->quote($className) . ' AS c FROM ' . $tableName . $filter;
        }
        $query = implode(' UNION ', $subQueries) . ' LIMIT 1';
        $statement = $database->query($query);
        $row = $statement->fetch(\PDO::FETCH_ASSOC);
        return $row ? $row['c'] : null;
    }

    /**
     * @param \PDO $database
     * @return string
     * @throws \Exception
     */
    public static function newGuid(\PDO $database): string
    {
        $max = 10000;
        do {
            $guid = bin2hex(random_bytes(16));
            if ($max-- <= 0) {
                throw new \RuntimeException('New GUID not found');
            }
        } while (self::getClassForGuid($database, $guid));

        return $guid;
    }

    public static function loadOneFromDb(\PDO $database, string $guid): static
    {
        return self::loadAllFromDb($database, 'guid = ' . $database->quote($guid) . ' LIMIT 1')->current();
    }

    /**
     * @param \PDO $database
     * @param string|null $filter
     * @return \Generator<static>
     */
    public static function loadAllFromDb(\PDO $database, string $filter = null)
    {
        $template = new static();
        $selectParts = [];
        foreach ($template->fieldNames() as $dbName => $propertyName) {
            if ($dbName === $propertyName) {
                $selectParts[$propertyName] = $dbName;
            } else {
                $selectParts[$propertyName] = $dbName . ' AS ' . $propertyName;
            }
        }

        $query = 'SELECT ' . implode(', ', $selectParts) . ' FROM ' . $template->tableName();
        if ($filter) {
            $query .= ' WHERE ' . $filter;
        }

        $statement = $database->query($query);
        $statement->setFetchMode(\PDO::FETCH_CLASS, static::class);
        while (false !== ($entity = $statement->fetch())) {
            /** @var static $entity */
            $entity->storeOld();
            yield $entity;
        }
    }
}
