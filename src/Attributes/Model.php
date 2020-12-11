<?php

namespace Puggan\Gnucash\Attributes;

/**
 * Class Model
 * @package Puggan\Gnucash\Attributes
 */
#[\Attribute(\Attribute::TARGET_CLASS)]
class Model
{
    public function __construct(
        public string $tableName = '',
    )
    {
    }
}
