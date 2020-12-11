<?php
declare(strict_types=1);

namespace Puggan\Gnucash\Models;

use Puggan\Gnucash\Attributes\Field;
use Puggan\Gnucash\Attributes\Model;
use Puggan\Gnucash\Interfaces\GuidModel;

/**
 * Class Entrie
 * @package Puggan\Gnucash\Models
 */
#[Model('entries')]
class Entrie extends Base
{
    use GuidModel;
    #[Field]
    public string $date = '';
    #[Field('date_entered')]
    public ?string $dateEntered;
    #[Field]
    public ?string $description;
    #[Field]
    public ?string $action;
    #[Field]
    public ?string $notes;
    #[Field('quantity_num')]
    public ?int $quantityNum;
    #[Field('quantity_denom')]
    public ?int $quantityDenom;
    #[Field('i_acct')]
    public ?string $iAcct;
    #[Field('i_price_num')]
    public ?int $iPriceNum;
    #[Field('i_price_denom')]
    public ?int $iPriceDenom;
    #[Field('i_discount_num')]
    public ?int $iDiscountNum;
    #[Field('i_discount_denom')]
    public ?int $iDiscountDenom;
    #[Field]
    public ?string $invoice;
    #[Field('i_disc_type')]
    public ?string $iDiscType;
    #[Field('i_disc_how')]
    public ?string $iDiscHow;
    #[Field('i_taxable')]
    public ?int $iTaxable;
    #[Field('i_taxincluded')]
    public ?int $iTaxincluded;
    #[Field('i_taxtable')]
    public ?string $iTaxtable;
    #[Field('b_acct')]
    public ?string $bAcct;
    #[Field('b_price_num')]
    public ?int $bPriceNum;
    #[Field('b_price_denom')]
    public ?int $bPriceDenom;
    #[Field]
    public ?string $bill;
    #[Field('b_taxable')]
    public ?int $bTaxable;
    #[Field('b_taxincluded')]
    public ?int $bTaxincluded;
    #[Field('b_taxtable')]
    public ?string $bTaxtable;
    #[Field('b_paytype')]
    public ?int $bPaytype;
    #[Field]
    public ?int $billable;
    #[Field('billto_type')]
    public ?int $billtoType;
    #[Field('billto_guid')]
    public ?string $billtoGuid;
    #[Field('order_guid')]
    public ?string $orderGuid;
}