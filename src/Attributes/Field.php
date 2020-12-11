<?php

namespace Puggan\Gnucash\Attributes;

#[\Attribute(\Attribute::TARGET_PROPERTY)]
class Field
{
    public function __construct(
        public string $dbName = '',
        public bool $primaryKey = false,
    )
    {
    }
}
