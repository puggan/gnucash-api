<?php
declare(strict_types=1);

namespace Puggan\Gnucash\Models;

use Puggan\Gnucash\Attributes\Field;
use Puggan\Gnucash\Attributes\Model;
use Puggan\Gnucash\Interfaces\GuidModel;

/**
 * Class Lot
 * @package Puggan\Gnucash\Models
 */
#[Model('lots')]
class Lot extends Base
{
    use GuidModel;
    #[Field('account_guid')]
    public ?string $accountGuid;
    #[Field('is_closed')]
    public int $isClosed = 0;
}