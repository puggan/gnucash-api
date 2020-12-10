<?php
declare(strict_types=1);

namespace Puggan\Gnucash\Models;

use JetBrains\PhpStorm\Pure;

/**
 * Class TaxtableEntrie
 * @package Puggan\Gnucash\Models
 */
class TaxtableEntrie extends Base
{
    public int $id = 0;
    public string $taxtable = '';
    public string $account = '';
    public int $amountNum = 0;
    public int $amountDenom = 0;
    public int $type = 0;

    #[Pure]
    public function tableName(): string
    {
        return 'taxtable_entries';
    }

    /**
     * @return string[]
     */
    #[Pure]
    public function fieldNames(): array
    {
        return [
            'id' => 'id',
            'taxtable' => 'taxtable',
            'account' => 'account',
            'amount_num' => 'amountNum',
            'amount_denom' => 'amountDenom',
            'type' => 'type',
        ];
    }
}
