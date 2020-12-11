<?php
declare(strict_types=1);

namespace Puggan\Gnucash\Models;

use Puggan\Gnucash\Attributes\Field;
use Puggan\Gnucash\Attributes\Model;
use Puggan\Gnucash\Interfaces\GuidModel;

/**
 * Class Commoditie
 * @package Puggan\Gnucash\Models
 */
#[Model('commodities')]
class Commoditie extends Base
{
    use GuidModel;
    #[Field]
    public string $namespace = '';
    #[Field]
    public string $mnemonic = '';
    #[Field]
    public ?string $fullname;
    #[Field]
    public ?string $cusip;
    #[Field]
    public int $fraction = 0;
    #[Field('quote_flag')]
    public int $quoteFlag = 0;
    #[Field('quote_source')]
    public ?string $quoteSource;
    #[Field('quote_tz')]
    public ?string $quoteTz;
}