<?php
declare(strict_types=1);

namespace Puggan\Gnucash\Models;

use Puggan\Gnucash\Attributes\Field;
use Puggan\Gnucash\Attributes\Model;
use Puggan\Gnucash\Interfaces\GuidModel;

/**
 * Class Schedxaction
 * @package Puggan\Gnucash\Models
 */
#[Model('schedxactions')]
class Schedxaction extends Base
{
    use GuidModel;

    #[Field]
    public ?string $name;
    #[Field]
    public int $enabled = 0;
    #[Field('start_date')]
    public ?string $startDate;
    #[Field('end_date')]
    public ?string $endDate;
    #[Field('last_occur')]
    public ?string $lastOccur;
    #[Field('num_occur')]
    public int $numOccur = 0;
    #[Field('rem_occur')]
    public int $remOccur = 0;
    #[Field('auto_create')]
    public int $autoCreate = 0;
    #[Field('auto_notify')]
    public int $autoNotify = 0;
    #[Field('adv_creation')]
    public int $advCreation = 0;
    #[Field('adv_notify')]
    public int $advNotify = 0;
    #[Field('instance_count')]
    public int $instanceCount = 0;
    #[Field('template_act_guid')]
    public string $templateActGuid = '';
}
