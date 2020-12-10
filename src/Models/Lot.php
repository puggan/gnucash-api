<?php
declare(strict_types=1);

namespace Puggan\Gnucash\Models;

use JetBrains\PhpStorm\Pure;

/**
 * Class Lot
 * @package Puggan\Gnucash\Models
 */
class Lot extends Base
{
    public ?string $guid;
    public ?string $accountGuid;
    public int $isClosed = 0;

    #[Pure]
    public function tableName(): string
    {
        return 'lots';
    }

    /**
     * @return string[]
     */
    #[Pure]
    public function fieldNames(): array
    {
        return [
            'guid' => 'guid',
            'account_guid' => 'accountGuid',
            'is_closed' => 'isClosed',
        ];
    }
}
