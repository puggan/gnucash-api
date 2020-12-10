<?php
declare(strict_types=1);

namespace Puggan\Gnucash\Models;

use JetBrains\PhpStorm\Pure;

/**
 * Class Entrie
 * @package Puggan\Gnucash\Models
 */
class Entrie extends Base
{
    public ?string $guid;
    public string $date = '';
    public ?string $dateEntered;
    public ?string $description;
    public ?string $action;
    public ?string $notes;
    public ?int $quantityNum;
    public ?int $quantityDenom;
    public ?string $iAcct;
    public ?int $iPriceNum;
    public ?int $iPriceDenom;
    public ?int $iDiscountNum;
    public ?int $iDiscountDenom;
    public ?string $invoice;
    public ?string $iDiscType;
    public ?string $iDiscHow;
    public ?int $iTaxable;
    public ?int $iTaxincluded;
    public ?string $iTaxtable;
    public ?string $bAcct;
    public ?int $bPriceNum;
    public ?int $bPriceDenom;
    public ?string $bill;
    public ?int $bTaxable;
    public ?int $bTaxincluded;
    public ?string $bTaxtable;
    public ?int $bPaytype;
    public ?int $billable;
    public ?int $billtoType;
    public ?string $billtoGuid;
    public ?string $orderGuid;

    #[Pure]
    public function tableName(): string
    {
        return 'entries';
    }

    /**
     * @return string[]
     */
    #[Pure]
    public function fieldNames(): array
    {
        return [
            'guid' => 'guid',
            'date' => 'date',
            'date_entered' => 'dateEntered',
            'description' => 'description',
            'action' => 'action',
            'notes' => 'notes',
            'quantity_num' => 'quantityNum',
            'quantity_denom' => 'quantityDenom',
            'i_acct' => 'iAcct',
            'i_price_num' => 'iPriceNum',
            'i_price_denom' => 'iPriceDenom',
            'i_discount_num' => 'iDiscountNum',
            'i_discount_denom' => 'iDiscountDenom',
            'invoice' => 'invoice',
            'i_disc_type' => 'iDiscType',
            'i_disc_how' => 'iDiscHow',
            'i_taxable' => 'iTaxable',
            'i_taxincluded' => 'iTaxincluded',
            'i_taxtable' => 'iTaxtable',
            'b_acct' => 'bAcct',
            'b_price_num' => 'bPriceNum',
            'b_price_denom' => 'bPriceDenom',
            'bill' => 'bill',
            'b_taxable' => 'bTaxable',
            'b_taxincluded' => 'bTaxincluded',
            'b_taxtable' => 'bTaxtable',
            'b_paytype' => 'bPaytype',
            'billable' => 'billable',
            'billto_type' => 'billtoType',
            'billto_guid' => 'billtoGuid',
            'order_guid' => 'orderGuid',
        ];
    }
}
