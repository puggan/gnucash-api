<?php
declare(strict_types=1);

namespace Puggan\Gnucash\Models;

use Puggan\Gnucash\Attributes\Field;
use Puggan\Gnucash\Attributes\Model;
use Puggan\Gnucash\Interfaces\GuidModel;

/**
 * Class Price
 * @package Puggan\Gnucash\Models
 */
#[Model('prices')]
class Price extends Base
{
    use GuidModel;

    #[Field('commodity_guid')]
    public string $commodityGuid = '';
    #[Field('currency_guid')]
    public string $currencyGuid = '';
    #[Field]
    public string $date = '';
    #[Field]
    public ?string $source;
    #[Field]
    public ?string $type;
    #[Field('value_num')]
    public int $valueNum = 0;
    #[Field('value_denom')]
    public int $valueDenom = 0;
}
