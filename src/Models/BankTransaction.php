<?php
declare(strict_types=1);

namespace Puggan\Gnucash\Models;

use JetBrains\PhpStorm\Pure;

/**
 * Class BankTransaction
 * @package Puggan\Gnucash\Models
 */
class BankTransaction extends Base
{
    public string $bdate = '';
    public string $vdate = '';
    public int $vnr = 0;
    public string $vtext = '';
    public float $amount = 0;
    public float $saldo = 0;
    public ?string $account;
    public ?string $bankTid;
    public int $bankTRow = 0;

    #[Pure]
    public function tableName(): string
    {
        return 'bank_transactions';
    }

    /**
     * @return string[]
     */
    #[Pure]
    public function fieldNames(): array
    {
        return [
            'bdate' => 'bdate',
            'vdate' => 'vdate',
            'vnr' => 'vnr',
            'vtext' => 'vtext',
            'amount' => 'amount',
            'saldo' => 'saldo',
            'account' => 'account',
            'bank_tid' => 'bankTid',
            'bank_t_row' => 'bankTRow',
        ];
    }
}
