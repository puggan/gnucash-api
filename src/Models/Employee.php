<?php
declare(strict_types=1);

namespace Puggan\Gnucash\Models;

use JetBrains\PhpStorm\Pure;

/**
 * Class Employee
 * @package Puggan\Gnucash\Models
 */
class Employee extends Base
{
    public ?string $guid;
    public string $username = '';
    public string $id = '';
    public string $language = '';
    public string $acl = '';
    public int $active = 0;
    public string $currency = '';
    public ?string $ccardGuid;
    public int $workdayNum = 0;
    public int $workdayDenom = 0;
    public int $rateNum = 0;
    public int $rateDenom = 0;
    public ?string $addrName;
    public ?string $addrAddr1;
    public ?string $addrAddr2;
    public ?string $addrAddr3;
    public ?string $addrAddr4;
    public ?string $addrPhone;
    public ?string $addrFax;
    public ?string $addrEmail;

    #[Pure]
    public function tableName(): string
    {
        return 'employees';
    }

    /**
     * @return string[]
     */
    #[Pure]
    public function fieldNames(): array
    {
        return [
            'guid' => 'guid',
            'username' => 'username',
            'id' => 'id',
            'language' => 'language',
            'acl' => 'acl',
            'active' => 'active',
            'currency' => 'currency',
            'ccard_guid' => 'ccardGuid',
            'workday_num' => 'workdayNum',
            'workday_denom' => 'workdayDenom',
            'rate_num' => 'rateNum',
            'rate_denom' => 'rateDenom',
            'addr_name' => 'addrName',
            'addr_addr1' => 'addrAddr1',
            'addr_addr2' => 'addrAddr2',
            'addr_addr3' => 'addrAddr3',
            'addr_addr4' => 'addrAddr4',
            'addr_phone' => 'addrPhone',
            'addr_fax' => 'addrFax',
            'addr_email' => 'addrEmail',
        ];
    }
}
