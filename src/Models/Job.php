<?php
declare(strict_types=1);

namespace Puggan\Gnucash\Models;

use Puggan\Gnucash\Attributes\Field;
use Puggan\Gnucash\Attributes\Model;
use Puggan\Gnucash\Interfaces\GuidModel;

/**
 * Class Job
 * @package Puggan\Gnucash\Models
 */
#[Model('jobs')]
class Job extends Base
{
    use GuidModel;
    #[Field]
    public string $id = '';
    #[Field]
    public string $name = '';
    #[Field]
    public string $reference = '';
    #[Field]
    public int $active = 0;
    #[Field('owner_type')]
    public ?int $ownerType;
    #[Field('owner_guid')]
    public ?string $ownerGuid;
}