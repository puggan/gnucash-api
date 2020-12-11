<?php
declare(strict_types=1);

namespace Puggan\Gnucash\Models;

use Puggan\Gnucash\Attributes\Field;
use Puggan\Gnucash\Attributes\Model;
use Puggan\Gnucash\Interfaces\GuidModel;

/**
 * Class Employee
 * @package Puggan\Gnucash\Models
 */
#[Model('employees')]
class Employee extends Base
{
    use GuidModel;

    #[Field]
    public string $username = '';
    #[Field]
    public string $id = '';
    #[Field]
    public string $language = '';
    #[Field]
    public string $acl = '';
    #[Field]
    public int $active = 0;
    #[Field]
    public string $currency = '';
    #[Field('ccard_guid')]
    public ?string $ccardGuid;
    #[Field('workday_num')]
    public int $workdayNum = 0;
    #[Field('workday_denom')]
    public int $workdayDenom = 0;
    #[Field('rate_num')]
    public int $rateNum = 0;
    #[Field('rate_denom')]
    public int $rateDenom = 0;
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
}
