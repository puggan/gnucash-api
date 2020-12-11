<?php
declare(strict_types=1);

namespace Puggan\Gnucash\Models;

use Puggan\Gnucash\Attributes\Field;
use Puggan\Gnucash\Attributes\Model;
use Puggan\Gnucash\Interfaces\GuidModel;

/**
 * Class Book
 * @package Puggan\Gnucash\Models
 */
#[Model('books')]
class Book extends Base
{
    use GuidModel;

    #[Field('root_account_guid')]
    public string $rootAccountGuid = '';
    #[Field('root_template_guid')]
    public string $rootTemplateGuid = '';
}
