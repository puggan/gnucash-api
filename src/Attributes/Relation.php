<?php
declare(strict_types=1);

namespace Puggan\Gnucash\Attributes;

use JetBrains\PhpStorm\Pure;
use Puggan\Gnucash\Models\Base;

/**
 * Class Relation
 * @package Puggan\Gnucash\Attributes
 */
#[\Attribute(\Attribute::TARGET_CLASS | \Attribute::IS_REPEATABLE)]
abstract class Relation
{
    /** @noinspection PhpPureFunctionMayProduceSideEffectsInspection */
    #[Pure]
    public function __construct(
        public string $classname,
        public string $property,
    ) {
        if (!class_exists($this->classname)) {
            throw new \TypeError('Unknonw Class: ' . $this->classname);
        }
        if (!is_subclass_of($classname, Base::class)) {
            throw new \TypeError($this->classname . ' should extend Base');
        }
    }

    /**
     * @param \PDO $database
     * @param Base $model
     */
    abstract public function loadRelation(\PDO $database, Base $model): void;
}
