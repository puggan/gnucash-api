<?php

namespace Puggan\Gnucash\Attributes;

use JetBrains\PhpStorm\Pure;
use Puggan\Gnucash\Models\Base;

#[\Attribute(\Attribute::TARGET_CLASS|\Attribute::IS_REPEATABLE)]
class HasMany extends Relation
{
    #[Pure]
    public function __construct(
        string $classname,
        string $property,
        public string $relationKey,
        public string $reverseProperty = '',
    )
    {
        parent::__construct($classname, $property);
    }

    public function loadRelation(\PDO $database, Base $model): void
    {
        if (!is_subclass_of($this->classname, Base::class, true)) {
            throw new \RuntimeException('Bad class, not Base');
        }

        $primaryKeys = $model->primaryKeys();
        if (\count($primaryKeys) !== 1) {
            throw new \RuntimeException('Bad class, not 1 PK');
        }

        $wherePart = Base::buildWhere($database, [$this->relationKey => array_values($primaryKeys)[0]]);
        $generator = $this->classname::loadAllFromDb($database, $wherePart);
        $model->{$this->property} = iterator_to_array($generator);
        if($this->reverseProperty) {
            /** @var Base $other */
            foreach($model->{$this->property} as $other) {
                $other->{$this->reverseProperty} = $model;
            }
        }
    }
}
