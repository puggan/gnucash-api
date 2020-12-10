<?php
declare(strict_types=1);

namespace Puggan\Gnucash\Models;

use JetBrains\PhpStorm\Pure;

/**
 * Class Transaction
 * @package Puggan\Gnucash\Models
 */
class Transaction extends Base
{
    public ?string $guid;
    public string $currencyGuid = '';
    public string $num = '';
    public ?string $postDate;
    public ?string $enterDate;
    public ?string $description;

    #[Pure]
    public function tableName(): string
    {
        return 'transactions';
    }

    /**
     * @return string[]
     */
    #[Pure]
    public function fieldNames(): array
    {
        return [
            'guid' => 'guid',
            'currency_guid' => 'currencyGuid',
            'num' => 'num',
            'post_date' => 'postDate',
            'enter_date' => 'enterDate',
            'description' => 'description',
        ];
    }
}
