<?php
declare(strict_types=1);

namespace Puggan\Gnucash\Models;

use Puggan\Gnucash\Attributes\Field;
use Puggan\Gnucash\Attributes\Model;

/**
 * Class BankTransaction
 * @package Puggan\Gnucash\Models
 */
#[Model('bank_transactions')]
class BankTransaction extends Base
{
    #[Field]
    public string $bdate = '';
    #[Field]
    public string $vdate = '';
    #[Field]
    public int $vnr = 0;
    #[Field]
    public string $vtext = '';
    #[Field]
    public float $amount = 0;
    #[Field]
    public float $saldo = 0;
    #[Field]
    public ?string $account;
    #[Field('bank_tid')]
    public ?string $bankTid;
    #[Field('bank_t_row', ture)]
    public int $bankTRow = 0;
}