<?php

namespace Puggan\Gnucash\Attributes;

#[\Attribute(\Attribute::TARGET_PROPERTY)]
class HasMany extends Relation
{
    public function __construct(string $relationKey, string $pivotTable = '', string $pivotKey = '')
    {
    }
}
