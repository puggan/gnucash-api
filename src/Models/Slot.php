<?php
declare(strict_types=1);

namespace Puggan\Gnucash\Models;

use Puggan\Gnucash\Attributes\Field;
use Puggan\Gnucash\Attributes\Model;

/**
 * Class Slot
 * @package Puggan\Gnucash\Models
 */
#[Model('slots')]
class Slot extends Base
{
    #[Field('id', ture)]
    public int $id = 0;
    #[Field('obj_guid')]
    public string $objGuid = '';
    #[Field]
    public string $name = '';
    #[Field('slot_type')]
    public int $slotType = 0;
    #[Field('int64_val')]
    public ?int $int64Val;
    #[Field('string_val')]
    public ?string $stringVal;
    #[Field('double_val')]
    public ?float $doubleVal;
    #[Field('timespec_val')]
    public ?string $timespecVal;
    #[Field('guid_val')]
    public ?string $guidVal;
    #[Field('numeric_val_num')]
    public ?int $numericValNum;
    #[Field('numeric_val_denom')]
    public ?int $numericValDenom;
    #[Field('gdate_val')]
    public ?string $gdateVal;
}