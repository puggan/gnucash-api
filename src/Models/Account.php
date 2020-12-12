<?php
declare(strict_types=1);

namespace Puggan\Gnucash\Models;

use Puggan\Gnucash\Attributes\Field;
use Puggan\Gnucash\Attributes\HasMany;
use Puggan\Gnucash\Attributes\HasOne;
use Puggan\Gnucash\Attributes\Model;
use Puggan\Gnucash\Interfaces\GuidModel;

/**
 * Class Account
 * @package Puggan\Gnucash\Models
 * @property Commoditie $commodity
 * @property Account $parent
 * @property Account[] $children
 */
#[Model('accounts')]
#[HasOne(Commoditie::class, 'commodity', 'commodityGuid')]
#[HasOne(Account::class, 'parent', 'parentGuid')]
#[HasMany(Account::class, 'children', 'parent_guid', 'parent')]
class Account extends Base
{
    use GuidModel;

    #[Field]
    public string $name = '';
    #[Field('account_type')]
    public string $accountType = '';
    #[Field('commodity_guid')]
    public ?string $commodityGuid;
    #[Field('commodity_scu')]
    public int $commodityScu = 0;
    #[Field('non_std_scu')]
    public int $nonStdScu = 0;
    #[Field('parent_guid')]
    public ?string $parentGuid;
    #[Field]
    public ?string $code;
    #[Field]
    public ?string $description;
    #[Field]
    public ?bool $hidden;
    #[Field]
    public ?bool $placeholder;
}
