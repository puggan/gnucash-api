<?php
declare(strict_types=1);

namespace Puggan\Gnucash\Models;

use Puggan\Gnucash\Attributes\Field;
use Puggan\Gnucash\Attributes\Model;
use Puggan\Gnucash\Interfaces\GuidModel;

/**
 * Class Invoice
 * @package Puggan\Gnucash\Models
 */
#[Model('invoices')]
class Invoice extends Base
{
    use GuidModel;
    #[Field]
    public string $id = '';
    #[Field('date_opened')]
    public ?string $dateOpened;
    #[Field('date_posted')]
    public ?string $datePosted;
    #[Field]
    public string $notes = '';
    #[Field]
    public int $active = 0;
    #[Field]
    public string $currency = '';
    #[Field('owner_type')]
    public ?int $ownerType;
    #[Field('owner_guid')]
    public ?string $ownerGuid;
    #[Field]
    public ?string $terms;
    #[Field('billing_id')]
    public ?string $billingId;
    #[Field('post_txn')]
    public ?string $postTxn;
    #[Field('post_lot')]
    public ?string $postLot;
    #[Field('post_acc')]
    public ?string $postAcc;
    #[Field('billto_type')]
    public ?int $billtoType;
    #[Field('billto_guid')]
    public ?string $billtoGuid;
    #[Field('charge_amt_num')]
    public ?int $chargeAmtNum;
    #[Field('charge_amt_denom')]
    public ?int $chargeAmtDenom;
}