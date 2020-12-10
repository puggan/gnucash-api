<?php
declare(strict_types=1);

namespace Puggan\Gnucash\Models;

use JetBrains\PhpStorm\Pure;

/**
 * Class Schedxaction
 * @package Puggan\Gnucash\Models
 */
class Schedxaction extends Base
{
    public ?string $guid;
    public ?string $name;
    public int $enabled = 0;
    public ?string $startDate;
    public ?string $endDate;
    public ?string $lastOccur;
    public int $numOccur = 0;
    public int $remOccur = 0;
    public int $autoCreate = 0;
    public int $autoNotify = 0;
    public int $advCreation = 0;
    public int $advNotify = 0;
    public int $instanceCount = 0;
    public string $templateActGuid = '';

    #[Pure]
    public function tableName(): string
    {
        return 'schedxactions';
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
            'enabled' => 'enabled',
            'start_date' => 'startDate',
            'end_date' => 'endDate',
            'last_occur' => 'lastOccur',
            'num_occur' => 'numOccur',
            'rem_occur' => 'remOccur',
            'auto_create' => 'autoCreate',
            'auto_notify' => 'autoNotify',
            'adv_creation' => 'advCreation',
            'adv_notify' => 'advNotify',
            'instance_count' => 'instanceCount',
            'template_act_guid' => 'templateActGuid',
        ];
    }
}
