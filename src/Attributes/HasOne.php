<?php
declare(strict_types=1);

namespace Puggan\Gnucash\Attributes;

use JetBrains\PhpStorm\Pure;
use Puggan\Gnucash\Models\Base;

/**
 * Class HasOne
 * @package Puggan\Gnucash\Attributes
 */
#[\Attribute(\Attribute::TARGET_CLASS | \Attribute::IS_REPEATABLE)]
class HasOne extends Relation
{
    #[Pure]
    public function __construct(
        string $classname,
        string $property,
        public string $relationKey,
        public bool $reverse = false,
    ) {
        parent::__construct($classname, $property);
    }

    public function loadRelation(\PDO $database, Base $model): void
    {
        if (!is_subclass_of($this->classname, Base::class, true)) {
            throw new \RuntimeException('Bad class, not Base');
        }

        if ($this->reverse) {
            $primaryKeys = $model->primaryKeys();
            if (\count($primaryKeys) !== 1) {
                throw new \RuntimeException('Bad class, not 1 PK');
            }
            $model->{$this->property} = $this->classname::loadOneFromDb(
                $database,
                [$this->relationKey => $primaryKeys[0]]
            );
            return;
        }

        $otherPrimaryKey = $this->classname::primaryKeyNames();
        if (\count($otherPrimaryKey) !== 1) {
            throw new \RuntimeException('Bad class, not 1 PK');
        }
        $model->{$this->property} = $this->classname::loadOneFromDb(
            $database,
            [$otherPrimaryKey[0] => $model->{$this->relationKey}]
        );
    }
}
