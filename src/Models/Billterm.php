<?php
declare(strict_types=1);

namespace Puggan\Gnucash\Models;

use Puggan\Gnucash\Attributes\Field;
use Puggan\Gnucash\Attributes\Model;
use Puggan\Gnucash\Interfaces\GuidModel;

/**
 * Class Billterm
 * @package Puggan\Gnucash\Models
 */
#[Model('billterms')]
class Billterm extends Base
{
    use GuidModel;
    #[Field]
    public string $name = '';
    #[Field]
    public string $description = '';
    #[Field]
    public int $refcount = 0;
    #[Field]
    public int $invisible = 0;
    #[Field]
    public ?string $parent;
    #[Field]
    public string $type = '';
    #[Field]
    public ?int $duedays;
    #[Field]
    public ?int $discountdays;
    #[Field('discount_num')]
    public ?int $discountNum;
    #[Field('discount_denom')]
    public ?int $discountDenom;
    #[Field]
    public ?int $cutoff;
}