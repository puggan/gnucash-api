<?php
declare(strict_types=1);

namespace Puggan\Gnucash\Models;

use JetBrains\PhpStorm\Pure;

/**
 * Class BankTransactionsCache
 * @package Puggan\Gnucash\Models
 */
class BankTransactionsCache extends Base
{
    public int $bankTRow = 0;
    public string $updatedAt = '';
    public string $verifiedAt = '';
    public int $revalidate = 0;
    public string $md5 = '';
    public string $data = '';

    #[Pure]
    public function tableName(): string
    {
        return 'bank_transactions_cache';
    }

    /**
     * @return string[]
     */
    #[Pure]
    public function fieldNames(): array
    {
        return [
            'bank_t_row' => 'bankTRow',
            'updated_at' => 'updatedAt',
            'verified_at' => 'verifiedAt',
            'revalidate' => 'revalidate',
            'md5' => 'md5',
            'data' => 'data',
        ];
    }
}
