<?php
declare(strict_types=1);

namespace Puggan\Gnucash\Models;

use Puggan\Gnucash\Attributes\Field;
use Puggan\Gnucash\Attributes\Model;

/**
 * Class Version
 * @package Puggan\Gnucash\Models
 */
#[Model('versions')]
class Version extends Base
{
    #[Field('table_name', ture)]
    public string $tableName = '';
    #[Field('table_version')]
    public int $tableVersion = 0;
}
