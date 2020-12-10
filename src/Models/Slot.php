<?php
declare(strict_types=1);

namespace Puggan\Gnucash\Models;

use JetBrains\PhpStorm\Pure;

/**
 * Class Slot
 * @package Puggan\Gnucash\Models
 */
class Slot extends Base
{
    public int $id = 0;
    public string $objGuid = '';
    public string $name = '';
    public int $slotType = 0;
    public ?int $int64Val;
    public ?string $stringVal;
    public ?float $doubleVal;
    public ?string $timespecVal;
    public ?string $guidVal;
    public ?int $numericValNum;
    public ?int $numericValDenom;
    public ?string $gdateVal;

    #[Pure]
    public function tableName(): string
    {
        return 'slots';
    }

    /**
     * @return string[]
     */
    #[Pure]
    public function fieldNames(): array
    {
        return [
            'id' => 'id',
            'obj_guid' => 'objGuid',
            'name' => 'name',
            'slot_type' => 'slotType',
            'int64_val' => 'int64Val',
            'string_val' => 'stringVal',
            'double_val' => 'doubleVal',
            'timespec_val' => 'timespecVal',
            'guid_val' => 'guidVal',
            'numeric_val_num' => 'numericValNum',
            'numeric_val_denom' => 'numericValDenom',
            'gdate_val' => 'gdateVal',
        ];
    }
}
