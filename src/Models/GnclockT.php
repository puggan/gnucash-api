<?php
declare(strict_types=1);

namespace Puggan\Gnucash\Models;

use Puggan\Gnucash\Attributes\Field;
use Puggan\Gnucash\Attributes\Model;

/**
 * Class GnclockT
 * @package Puggan\Gnucash\Models
 */
#[Model('gnclock_ts')]
class GnclockT extends Base
{
    #[Field('Hostname', ture)]
    public string $hostname = '';
    #[Field('PID', ture)]
    public int $pid = 0;
    #[Field]
    public string $ts = '';
}