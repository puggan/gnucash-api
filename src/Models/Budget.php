<?php
declare(strict_types=1);

namespace Puggan\Gnucash\Models;

use Puggan\Gnucash\Attributes\Field;
use Puggan\Gnucash\Attributes\Model;
use Puggan\Gnucash\Interfaces\GuidModel;

/**
 * Class Budget
 * @package Puggan\Gnucash\Models
 */
#[Model('budgets')]
class Budget extends Base
{
    use GuidModel;

    #[Field]
    public string $name = '';
    #[Field]
    public ?string $description;
    #[Field('num_periods')]
    public int $numPeriods = 0;
}
