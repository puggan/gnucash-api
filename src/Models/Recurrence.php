<?php
declare(strict_types=1);

namespace Puggan\Gnucash\Models;

use JetBrains\PhpStorm\Pure;

/**
 * Class Recurrence
 * @package Puggan\Gnucash\Models
 */
class Recurrence extends Base
{
    public int $id = 0;
    public string $objGuid = '';
    public int $recurrenceMult = 0;
    public string $recurrencePeriodType = '';
    public string $recurrencePeriodStart = '';
    public string $recurrenceWeekendAdjust = '';

    #[Pure]
    public function tableName(): string
    {
        return 'recurrences';
    }

    /**
     * @return string[]
     */
    #[Pure]
    public function fieldNames(): array
    {
        return [
            'id' => 'id',
            'obj_guid' => 'objGuid',
            'recurrence_mult' => 'recurrenceMult',
            'recurrence_period_type' => 'recurrencePeriodType',
            'recurrence_period_start' => 'recurrencePeriodStart',
            'recurrence_weekend_adjust' => 'recurrenceWeekendAdjust',
        ];
    }
}
