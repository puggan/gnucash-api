<?php
declare(strict_types=1);

namespace Puggan\Gnucash\Models;

use JetBrains\PhpStorm\Pure;

/**
 * Class Split
 * @package Puggan\Gnucash\Models
 */
class Split extends Base
{
    public ?string $guid;
    public string $txGuid = '';
    public string $accountGuid = '';
    public string $memo = '';
    public string $action = '';
    public string $reconcileState = '';
    public ?string $reconcileDate;
    public int $valueNum = 0;
    public int $valueDenom = 0;
    public int $quantityNum = 0;
    public int $quantityDenom = 0;
    public ?string $lotGuid;

    #[Pure]
    public function tableName(): string
    {
        return 'splits';
    }

    /**
     * @return string[]
     */
    #[Pure]
    public function fieldNames(): array
    {
        return [
            'guid' => 'guid',
            'tx_guid' => 'txGuid',
            'account_guid' => 'accountGuid',
            'memo' => 'memo',
            'action' => 'action',
            'reconcile_state' => 'reconcileState',
            'reconcile_date' => 'reconcileDate',
            'value_num' => 'valueNum',
            'value_denom' => 'valueDenom',
            'quantity_num' => 'quantityNum',
            'quantity_denom' => 'quantityDenom',
            'lot_guid' => 'lotGuid',
        ];
    }
}
