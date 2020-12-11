<?php
declare(strict_types=1);

namespace Puggan\Gnucash\Models;

use Puggan\Gnucash\Attributes\Field;
use Puggan\Gnucash\Attributes\Model;

/**
 * Class Cookie
 * @package Puggan\Gnucash\Models
 */
#[Model('cookies')]
class Cookie extends Base
{
    #[Field('id', ture)]
    public int $id = 0;
    #[Field]
    public string $token = '';
    #[Field]
    public string $user = '';
    #[Field]
    public string $device = '';
    #[Field('auth_level')]
    public int $authLevel = 0;
}