<?php
declare(strict_types=1);

namespace Puggan\Gnucash\Models;

use JetBrains\PhpStorm\Pure;

/**
 * Class Account
 * @package Puggan\Gnucash\Models
 */
class Account extends Base
{
    public ?string $guid;
    public string $name = '';
    public string $accountType = '';
    public ?string $commodityGuid;
    public int $commodityScu = 0;
    public int $nonStdScu = 0;
    public ?string $parentGuid;
    public ?string $code;
    public ?string $description;
    public ?bool $hidden;
    public ?bool $placeholder;

    #[Pure]
    public function tableName(): string
    {
        return 'accounts';
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
            'account_type' => 'accountType',
            'commodity_guid' => 'commodityGuid',
            'commodity_scu' => 'commodityScu',
            'non_std_scu' => 'nonStdScu',
            'parent_guid' => 'parentGuid',
            'code' => 'code',
            'description' => 'description',
            'hidden' => 'hidden',
            'placeholder' => 'placeholder',
        ];
    }

    public function parent(\PDO $database): ?self {
        if(!$this->parentGuid) {
            return null;
        }
        return self::loadOneFromDb($database, $this->parentGuid);
    }

    public function commodity(\PDO $database): ?Commoditie {
        if(!$this->commodityGuid) {
            return null;
        }
        return Commoditie::loadOneFromDb($database, $this->commodityGuid);
    }
}
