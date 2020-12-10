<?php
declare(strict_types=1);

namespace Puggan\Gnucash\Models;

use JetBrains\PhpStorm\Pure;

/**
 * Class Invoice
 * @package Puggan\Gnucash\Models
 */
class Invoice extends Base
{
    public ?string $guid;
    public string $id = '';
    public ?string $dateOpened;
    public ?string $datePosted;
    public string $notes = '';
    public int $active = 0;
    public string $currency = '';
    public ?int $ownerType;
    public ?string $ownerGuid;
    public ?string $terms;
    public ?string $billingId;
    public ?string $postTxn;
    public ?string $postLot;
    public ?string $postAcc;
    public ?int $billtoType;
    public ?string $billtoGuid;
    public ?int $chargeAmtNum;
    public ?int $chargeAmtDenom;

    #[Pure]
    public function tableName(): string
    {
        return 'invoices';
    }

    /**
     * @return string[]
     */
    #[Pure]
    public function fieldNames(): array
    {
        return [
            'guid' => 'guid',
            'id' => 'id',
            'date_opened' => 'dateOpened',
            'date_posted' => 'datePosted',
            'notes' => 'notes',
            'active' => 'active',
            'currency' => 'currency',
            'owner_type' => 'ownerType',
            'owner_guid' => 'ownerGuid',
            'terms' => 'terms',
            'billing_id' => 'billingId',
            'post_txn' => 'postTxn',
            'post_lot' => 'postLot',
            'post_acc' => 'postAcc',
            'billto_type' => 'billtoType',
            'billto_guid' => 'billtoGuid',
            'charge_amt_num' => 'chargeAmtNum',
            'charge_amt_denom' => 'chargeAmtDenom',
        ];
    }
}
