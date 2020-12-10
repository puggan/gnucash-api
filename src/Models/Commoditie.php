<?php
declare(strict_types=1);

namespace Puggan\Gnucash\Models;

use JetBrains\PhpStorm\Pure;

/**
 * Class Commoditie
 * @package Puggan\Gnucash\Models
 */
class Commoditie extends Base
{
    public ?string $guid;
    public string $namespace = '';
    public string $mnemonic = '';
    public ?string $fullname;
    public ?string $cusip;
    public int $fraction = 0;
    public int $quoteFlag = 0;
    public ?string $quoteSource;
    public ?string $quoteTz;

    #[Pure]
    public function tableName(): string
    {
        return 'commodities';
    }

    /**
     * @return string[]
     */
    #[Pure]
    public function fieldNames(): array
    {
        return [
            'guid' => 'guid',
            'namespace' => 'namespace',
            'mnemonic' => 'mnemonic',
            'fullname' => 'fullname',
            'cusip' => 'cusip',
            'fraction' => 'fraction',
            'quote_flag' => 'quoteFlag',
            'quote_source' => 'quoteSource',
            'quote_tz' => 'quoteTz',
        ];
    }
}
