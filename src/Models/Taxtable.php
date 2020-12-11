<?php
declare(strict_types=1);

namespace Puggan\Gnucash\Models;

use Puggan\Gnucash\Attributes\Field;
use Puggan\Gnucash\Attributes\Model;
use Puggan\Gnucash\Interfaces\GuidModel;

/**
 * Class Taxtable
 * @package Puggan\Gnucash\Models
 */
#[Model('taxtables')]
class Taxtable extends Base
{
    use GuidModel;
    #[Field]
    public string $name = '';
    #[Field]
    public int $refcount = 0;
    #[Field]
    public int $invisible = 0;
    #[Field]
    public ?string $parent;
}