<?php
declare(strict_types=1);

namespace Puggan\Gnucash\Models;

use Puggan\Gnucash\Attributes\Field;
use Puggan\Gnucash\Attributes\Model;
use Puggan\Gnucash\Interfaces\GuidModel;

/**
 * Class Vendor
 * @package Puggan\Gnucash\Models
 */
#[Model('vendors')]
class Vendor extends Base
{
    use GuidModel;
    #[Field]
    public string $name = '';
    #[Field]
    public string $id = '';
    #[Field]
    public string $notes = '';
    #[Field]
    public string $currency = '';
    #[Field]
    public int $active = 0;
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
    #[Field]
    public ?string $terms;
    #[Field('tax_inc')]
    public ?string $taxInc;
    #[Field('tax_table')]
    public ?string $taxTable;
}