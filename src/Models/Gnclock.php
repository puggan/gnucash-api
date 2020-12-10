<?php
declare(strict_types=1);

namespace Puggan\Gnucash\Models;

use JetBrains\PhpStorm\Pure;

/**
 * Class Gnclock
 * @package Puggan\Gnucash\Models
 */
class Gnclock extends Base
{
    public string $hostname = '';
    public int $pid = 0;

    #[Pure]
    public function tableName(): string
    {
        return 'gnclock';
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
        ];
    }
}
