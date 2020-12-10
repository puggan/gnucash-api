<?php
declare(strict_types=1);

namespace Puggan\Gnucash\Models;

use JetBrains\PhpStorm\Pure;

/**
 * Class Order
 * @package Puggan\Gnucash\Models
 */
class Order extends Base
{
    public ?string $guid;
    public string $id = '';
    public string $notes = '';
    public string $reference = '';
    public int $active = 0;
    public string $dateOpened = '';
    public string $dateClosed = '';
    public int $ownerType = 0;
    public string $ownerGuid = '';

    #[Pure]
    public function tableName(): string
    {
        return 'orders';
    }

    /**
     * @return string[]
     */
    #[Pure]
    public function fieldNames(): array
    {
        return [
            'guid' => 'guid',
            'id' => 'id',
            'notes' => 'notes',
            'reference' => 'reference',
            'active' => 'active',
            'date_opened' => 'dateOpened',
            'date_closed' => 'dateClosed',
            'owner_type' => 'ownerType',
            'owner_guid' => 'ownerGuid',
        ];
    }
}
