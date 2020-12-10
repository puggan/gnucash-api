<?php
declare(strict_types=1);

namespace Puggan\Gnucash\Models;

use JetBrains\PhpStorm\Pure;

/**
 * Class Version
 * @package Puggan\Gnucash\Models
 */
class Version extends Base
{
    public string $tableName = '';
    public int $tableVersion = 0;

    #[Pure]
    public function tableName(): string
    {
        return 'versions';
    }

    /**
     * @return string[]
     */
    #[Pure]
    public function fieldNames(): array
    {
        return [
            'table_name' => 'tableName',
            'table_version' => 'tableVersion',
        ];
    }
}
