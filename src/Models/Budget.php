<?php
declare(strict_types=1);

namespace Puggan\Gnucash\Models;

use JetBrains\PhpStorm\Pure;

/**
 * Class Budget
 * @package Puggan\Gnucash\Models
 */
class Budget extends Base
{
    public ?string $guid;
    public string $name = '';
    public ?string $description;
    public int $numPeriods = 0;

    #[Pure]
    public function tableName(): string
    {
        return 'budgets';
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
            'num_periods' => 'numPeriods',
        ];
    }
}
