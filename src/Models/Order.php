<?php
declare(strict_types=1);

namespace Puggan\Gnucash\Models;

use Puggan\Gnucash\Attributes\Field;
use Puggan\Gnucash\Attributes\Model;
use Puggan\Gnucash\Interfaces\GuidModel;

/**
 * Class Order
 * @package Puggan\Gnucash\Models
 */
#[Model('orders')]
class Order extends Base
{
    use GuidModel;
    #[Field]
    public string $id = '';
    #[Field]
    public string $notes = '';
    #[Field]
    public string $reference = '';
    #[Field]
    public int $active = 0;
    #[Field('date_opened')]
    public string $dateOpened = '';
    #[Field('date_closed')]
    public string $dateClosed = '';
    #[Field('owner_type')]
    public int $ownerType = 0;
    #[Field('owner_guid')]
    public string $ownerGuid = '';
}