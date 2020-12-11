<?php
declare(strict_types=1);

namespace Puggan\Gnucash\Models;

use Puggan\Gnucash\Attributes\Field;
use Puggan\Gnucash\Attributes\Model;
use Puggan\Gnucash\Interfaces\GuidModel;

/**
 * Class Customer
 * @package Puggan\Gnucash\Models
 */
#[Model('customers')]
class Customer extends Base
{
    use GuidModel;

    #[Field]
    public string $name = '';
    #[Field]
    public string $id = '';
    #[Field]
    public string $notes = '';
    #[Field]
    public int $active = 0;
    #[Field('discount_num')]
    public int $discountNum = 0;
    #[Field('discount_denom')]
    public int $discountDenom = 0;
    #[Field('credit_num')]
    public int $creditNum = 0;
    #[Field('credit_denom')]
    public int $creditDenom = 0;
    #[Field]
    public string $currency = '';
    #[Field('tax_override')]
    public int $taxOverride = 0;
    #[Field('addr_name')]
    public ?string $addrName;
    #[Field('addr_addr1')]
    public ?string $addrAddr1;
    #[Field('addr_addr2')]
    public ?string $addrAddr2;
    #[Field('addr_addr3')]
    public ?string $addrAddr3;
    #[Field('addr_addr4')]
    public ?string $addrAddr4;
    #[Field('addr_phone')]
    public ?string $addrPhone;
    #[Field('addr_fax')]
    public ?string $addrFax;
    #[Field('addr_email')]
    public ?string $addrEmail;
    #[Field('shipaddr_name')]
    public ?string $shipaddrName;
    #[Field('shipaddr_addr1')]
    public ?string $shipaddrAddr1;
    #[Field('shipaddr_addr2')]
    public ?string $shipaddrAddr2;
    #[Field('shipaddr_addr3')]
    public ?string $shipaddrAddr3;
    #[Field('shipaddr_addr4')]
    public ?string $shipaddrAddr4;
    #[Field('shipaddr_phone')]
    public ?string $shipaddrPhone;
    #[Field('shipaddr_fax')]
    public ?string $shipaddrFax;
    #[Field('shipaddr_email')]
    public ?string $shipaddrEmail;
    #[Field]
    public ?string $terms;
    #[Field('tax_included')]
    public ?int $taxIncluded;
    #[Field]
    public ?string $taxtable;
}
