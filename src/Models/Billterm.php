<?php
declare(strict_types=1);

namespace Puggan\Gnucash\Models;

use JetBrains\PhpStorm\Pure;

/**
 * Class Billterm
 * @package Puggan\Gnucash\Models
 */
class Billterm extends Base
{
    public ?string $guid;
    public string $name = '';
    public string $description = '';
    public int $refcount = 0;
    public int $invisible = 0;
    public ?string $parent;
    public string $type = '';
    public ?int $duedays;
    public ?int $discountdays;
    public ?int $discountNum;
    public ?int $discountDenom;
    public ?int $cutoff;

    #[Pure]
    public function tableName(): string
    {
        return 'billterms';
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
            'description' => 'description',
            'refcount' => 'refcount',
            'invisible' => 'invisible',
            'parent' => 'parent',
            'type' => 'type',
            'duedays' => 'duedays',
            'discountdays' => 'discountdays',
            'discount_num' => 'discountNum',
            'discount_denom' => 'discountDenom',
            'cutoff' => 'cutoff',
        ];
    }
}
