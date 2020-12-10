<?php
declare(strict_types=1);

namespace Puggan\Gnucash\Models;

use JetBrains\PhpStorm\Pure;

/**
 * Class Customer
 * @package Puggan\Gnucash\Models
 */
class Customer extends Base
{
    public ?string $guid;
    public string $name = '';
    public string $id = '';
    public string $notes = '';
    public int $active = 0;
    public int $discountNum = 0;
    public int $discountDenom = 0;
    public int $creditNum = 0;
    public int $creditDenom = 0;
    public string $currency = '';
    public int $taxOverride = 0;
    public ?string $addrName;
    public ?string $addrAddr1;
    public ?string $addrAddr2;
    public ?string $addrAddr3;
    public ?string $addrAddr4;
    public ?string $addrPhone;
    public ?string $addrFax;
    public ?string $addrEmail;
    public ?string $shipaddrName;
    public ?string $shipaddrAddr1;
    public ?string $shipaddrAddr2;
    public ?string $shipaddrAddr3;
    public ?string $shipaddrAddr4;
    public ?string $shipaddrPhone;
    public ?string $shipaddrFax;
    public ?string $shipaddrEmail;
    public ?string $terms;
    public ?int $taxIncluded;
    public ?string $taxtable;

    #[Pure]
    public function tableName(): string
    {
        return 'customers';
    }

    /**
     * @return string[]
     */
    #[Pure]
    public function fieldNames(): array
    {
        return [
            'guid' => 'guid',
            'name' => 'name',
            'id' => 'id',
            'notes' => 'notes',
            'active' => 'active',
            'discount_num' => 'discountNum',
            'discount_denom' => 'discountDenom',
            'credit_num' => 'creditNum',
            'credit_denom' => 'creditDenom',
            'currency' => 'currency',
            'tax_override' => 'taxOverride',
            'addr_name' => 'addrName',
            'addr_addr1' => 'addrAddr1',
            'addr_addr2' => 'addrAddr2',
            'addr_addr3' => 'addrAddr3',
            'addr_addr4' => 'addrAddr4',
            'addr_phone' => 'addrPhone',
            'addr_fax' => 'addrFax',
            'addr_email' => 'addrEmail',
            'shipaddr_name' => 'shipaddrName',
            'shipaddr_addr1' => 'shipaddrAddr1',
            'shipaddr_addr2' => 'shipaddrAddr2',
            'shipaddr_addr3' => 'shipaddrAddr3',
            'shipaddr_addr4' => 'shipaddrAddr4',
            'shipaddr_phone' => 'shipaddrPhone',
            'shipaddr_fax' => 'shipaddrFax',
            'shipaddr_email' => 'shipaddrEmail',
            'terms' => 'terms',
            'tax_included' => 'taxIncluded',
            'taxtable' => 'taxtable',
        ];
    }
}
