<?php
declare(strict_types=1);

namespace Puggan\Gnucash\Models;

use JetBrains\PhpStorm\Pure;

/**
 * Class Price
 * @package Puggan\Gnucash\Models
 */
class Price extends Base
{
    public ?string $guid;
    public string $commodityGuid = '';
    public string $currencyGuid = '';
    public string $date = '';
    public ?string $source;
    public ?string $type;
    public int $valueNum = 0;
    public int $valueDenom = 0;

    #[Pure]
    public function tableName(): string
    {
        return 'prices';
    }

    /**
     * @return string[]
     */
    #[Pure]
    public function fieldNames(): array
    {
        return [
            'guid' => 'guid',
            'commodity_guid' => 'commodityGuid',
            'currency_guid' => 'currencyGuid',
            'date' => 'date',
            'source' => 'source',
            'type' => 'type',
            'value_num' => 'valueNum',
            'value_denom' => 'valueDenom',
        ];
    }
}
