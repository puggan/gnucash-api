<?php
declare(strict_types=1);

namespace Puggan\Gnucash\Models;

use Puggan\Gnucash\Attributes\Field;
use Puggan\Gnucash\Attributes\Model;
use Puggan\Gnucash\Interfaces\GuidModel;

/**
 * Class Split
 * @package Puggan\Gnucash\Models
 */
#[Model('splits')]
class Split extends Base
{
    use GuidModel;

    #[Field('tx_guid')]
    public string $txGuid = '';
    #[Field('account_guid')]
    public string $accountGuid = '';
    #[Field]
    public string $memo = '';
    #[Field]
    public string $action = '';
    #[Field('reconcile_state')]
    public string $reconcileState = '';
    #[Field('reconcile_date')]
    public ?string $reconcileDate;
    #[Field('value_num')]
    public int $valueNum = 0;
    #[Field('value_denom')]
    public int $valueDenom = 0;
    #[Field('quantity_num')]
    public int $quantityNum = 0;
    #[Field('quantity_denom')]
    public int $quantityDenom = 0;
    #[Field('lot_guid')]
    public ?string $lotGuid;
}
