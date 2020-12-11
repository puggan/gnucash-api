<?php
declare(strict_types=1);

namespace Puggan\Gnucash\Attributes;

/**
 * Class HasOne
 * @package Puggan\Gnucash\Attributes
 */
#[\Attribute(\Attribute::TARGET_PROPERTY)]
class HasOne extends Relation
{
    public function __construct(string $relationKey, bool $reverse = false)
    {
    }
}
