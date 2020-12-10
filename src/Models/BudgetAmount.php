<?php
declare(strict_types=1);

namespace Puggan\Gnucash\Models;

use JetBrains\PhpStorm\Pure;

/**
 * Class BudgetAmount
 * @package Puggan\Gnucash\Models
 */
class BudgetAmount extends Base
{
    public int $id = 0;
    public string $budgetGuid = '';
    public string $accountGuid = '';
    public int $periodNum = 0;
    public int $amountNum = 0;
    public int $amountDenom = 0;

    #[Pure]
    public function tableName(): string
    {
        return 'budget_amounts';
    }

    /**
     * @return string[]
     */
    #[Pure]
    public function fieldNames(): array
    {
        return [
            'id' => 'id',
            'budget_guid' => 'budgetGuid',
            'account_guid' => 'accountGuid',
            'period_num' => 'periodNum',
            'amount_num' => 'amountNum',
            'amount_denom' => 'amountDenom',
        ];
    }
}
