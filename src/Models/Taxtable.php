<?php
declare(strict_types=1);

namespace Puggan\Gnucash\Models;

use JetBrains\PhpStorm\Pure;

/**
 * Class Taxtable
 * @package Puggan\Gnucash\Models
 */
class Taxtable extends Base
{
    public ?string $guid;
    public string $name = '';
    public int $refcount = 0;
    public int $invisible = 0;
    public ?string $parent;

    #[Pure]
    public function tableName(): string
    {
        return 'taxtables';
    }

    /**
     * @return string[]
     */
    #[Pure]
    public function fieldNames(): array
    {
        return [
            'guid' => 'guid',
            'name' => 'name',
            'refcount' => 'refcount',
            'invisible' => 'invisible',
            'parent' => 'parent',
        ];
    }
}
