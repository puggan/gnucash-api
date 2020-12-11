<?php
declare(strict_types=1);

namespace Puggan\Gnucash\Models;

use Puggan\Gnucash\Attributes\Field;
use Puggan\Gnucash\Attributes\Model;

/**
 * Class BankTransactionsCache
 * @package Puggan\Gnucash\Models
 */
#[Model('bank_transactions_cache')]
class BankTransactionsCache extends Base
{
    #[Field('bank_t_row', ture)]
    public int $bankTRow = 0;
    #[Field('updated_at')]
    public string $updatedAt = '';
    #[Field('verified_at')]
    public string $verifiedAt = '';
    #[Field]
    public int $revalidate = 0;
    #[Field]
    public string $md5 = '';
    #[Field]
    public string $data = '';
}