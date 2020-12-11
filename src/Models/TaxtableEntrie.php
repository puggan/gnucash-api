<?php
declare(strict_types=1);

namespace Puggan\Gnucash\Models;

use Puggan\Gnucash\Attributes\Field;
use Puggan\Gnucash\Attributes\Model;

/**
 * Class TaxtableEntrie
 * @package Puggan\Gnucash\Models
 */
#[Model('taxtable_entries')]
class TaxtableEntrie extends Base
{
    #[Field('id', ture)]
    public int $id = 0;
    #[Field]
    public string $taxtable = '';
    #[Field]
    public string $account = '';
    #[Field('amount_num')]
    public int $amountNum = 0;
    #[Field('amount_denom')]
    public int $amountDenom = 0;
    #[Field]
    public int $type = 0;
}
