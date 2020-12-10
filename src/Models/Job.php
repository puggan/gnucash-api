<?php
declare(strict_types=1);

namespace Puggan\Gnucash\Models;

use JetBrains\PhpStorm\Pure;

/**
 * Class Job
 * @package Puggan\Gnucash\Models
 */
class Job extends Base
{
    public ?string $guid;
    public string $id = '';
    public string $name = '';
    public string $reference = '';
    public int $active = 0;
    public ?int $ownerType;
    public ?string $ownerGuid;

    #[Pure]
    public function tableName(): string
    {
        return 'jobs';
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
            'name' => 'name',
            'reference' => 'reference',
            'active' => 'active',
            'owner_type' => 'ownerType',
            'owner_guid' => 'ownerGuid',
        ];
    }
}
