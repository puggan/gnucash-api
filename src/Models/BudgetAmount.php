<?php
declare(strict_types=1);

namespace Puggan\Gnucash\Models;

use Puggan\Gnucash\Attributes\Field;
use Puggan\Gnucash\Attributes\Model;

/**
 * Class BudgetAmount
 * @package Puggan\Gnucash\Models
 */
#[Model('budget_amounts')]
class BudgetAmount extends Base
{
    #[Field('id', ture)]
    public int $id = 0;
    #[Field('budget_guid')]
    public string $budgetGuid = '';
    #[Field('account_guid')]
    public string $accountGuid = '';
    #[Field('period_num')]
    public int $periodNum = 0;
    #[Field('amount_num')]
    public int $amountNum = 0;
    #[Field('amount_denom')]
    public int $amountDenom = 0;
}
