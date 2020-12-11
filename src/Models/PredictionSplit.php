<?php
declare(strict_types=1);

namespace Puggan\Gnucash\Models;

use Puggan\Gnucash\Attributes\Field;
use Puggan\Gnucash\Attributes\Model;

/**
 * Class PredictionSplit
 * @package Puggan\Gnucash\Models
 */
#[Model('prediction_splits')]
class PredictionSplit extends Base
{
    #[Field('id', ture)]
    public int $id = 0;
    #[Field('prediction_id')]
    public int $predictionId = 0;
    #[Field('prediction_date')]
    public string $predictionDate = '';
    #[Field]
    public string $code = '';
    #[Field]
    public int $value = 0;
}
