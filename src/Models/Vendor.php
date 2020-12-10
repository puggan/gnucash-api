<?php
declare(strict_types=1);

namespace Puggan\Gnucash\Models;

use JetBrains\PhpStorm\Pure;

/**
 * Class Vendor
 * @package Puggan\Gnucash\Models
 */
class Vendor extends Base
{
    public ?string $guid;
    public string $name = '';
    public string $id = '';
    public string $notes = '';
    public string $currency = '';
    public int $active = 0;
    public int $taxOverride = 0;
    public ?string $addrName;
    public ?string $addrAddr1;
    public ?string $addrAddr2;
    public ?string $addrAddr3;
    public ?string $addrAddr4;
    public ?string $addrPhone;
    public ?string $addrFax;
    public ?string $addrEmail;
    public ?string $terms;
    public ?string $taxInc;
    public ?string $taxTable;

    #[Pure]
    public function tableName(): string
    {
        return 'vendors';
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
            'currency' => 'currency',
            'active' => 'active',
            'tax_override' => 'taxOverride',
            'addr_name' => 'addrName',
            'addr_addr1' => 'addrAddr1',
            'addr_addr2' => 'addrAddr2',
            'addr_addr3' => 'addrAddr3',
            'addr_addr4' => 'addrAddr4',
            'addr_phone' => 'addrPhone',
            'addr_fax' => 'addrFax',
            'addr_email' => 'addrEmail',
            'terms' => 'terms',
            'tax_inc' => 'taxInc',
            'tax_table' => 'taxTable',
        ];
    }
}
