<?php
declare(strict_types=1);

namespace Puggan\Gnucash\Models;

use Puggan\Gnucash\Attributes\Field;
use Puggan\Gnucash\Attributes\Model;
use Puggan\Gnucash\Interfaces\GuidModel;

/**
 * Class Transaction
 * @package Puggan\Gnucash\Models
 */
#[Model('transactions')]
class Transaction extends Base
{
    use GuidModel;
    #[Field('currency_guid')]
    public string $currencyGuid = '';
    #[Field]
    public string $num = '';
    #[Field('post_date')]
    public ?string $postDate;
    #[Field('enter_date')]
    public ?string $enterDate;
    #[Field]
    public ?string $description;
}