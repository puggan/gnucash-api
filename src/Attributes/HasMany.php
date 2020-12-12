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
        public string $pivotTable = '',
        public string $pivotKey = '',
    )
    {
        parent::__construct($classname, $property);
    }

    public function loadRelation(\PDO $database, Base $model): void
    {
        // TODO: Implement loadRelation() method.
        $wherePart = Base::buildWhere([$otherPrimaryKey[0] => $model->{$this->relationKey}]);
    }
}
