<?php
declare(strict_types=1);

namespace Puggan\Gnucash\Models;

use Puggan\Gnucash\Attributes\Field;
use Puggan\Gnucash\Attributes\Model;

/**
 * Class Gnclock
 * @package Puggan\Gnucash\Models
 */
#[Model('gnclock')]
class Gnclock extends Base
{
    #[Field('Hostname', ture)]
    public string $hostname = '';
    #[Field('PID', ture)]
    public int $pid = 0;
}