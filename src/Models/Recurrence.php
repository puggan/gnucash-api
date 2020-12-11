<?php
declare(strict_types=1);

namespace Puggan\Gnucash\Models;

use Puggan\Gnucash\Attributes\Field;
use Puggan\Gnucash\Attributes\Model;

/**
 * Class Recurrence
 * @package Puggan\Gnucash\Models
 */
#[Model('recurrences')]
class Recurrence extends Base
{
    #[Field('id', ture)]
    public int $id = 0;
    #[Field('obj_guid')]
    public string $objGuid = '';
    #[Field('recurrence_mult')]
    public int $recurrenceMult = 0;
    #[Field('recurrence_period_type')]
    public string $recurrencePeriodType = '';
    #[Field('recurrence_period_start')]
    public string $recurrencePeriodStart = '';
    #[Field('recurrence_weekend_adjust')]
    public string $recurrenceWeekendAdjust = '';
}
