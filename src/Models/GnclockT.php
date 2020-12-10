<?php
declare(strict_types=1);

namespace Puggan\Gnucash\Models;

use JetBrains\PhpStorm\Pure;

/**
 * Class GnclockT
 * @package Puggan\Gnucash\Models
 */
class GnclockT extends Base
{
    public string $hostname = '';
    public int $pid = 0;
    public string $ts = '';

    #[Pure]
    public function tableName(): string
    {
        return 'gnclock_ts';
    }

    /**
     * @return string[]
     */
    #[Pure]
    public function fieldNames(): array
    {
        return [
            'Hostname' => 'hostname',
            'PID' => 'pid',
            'ts' => 'ts',
        ];
    }
}
