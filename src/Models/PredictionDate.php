<?php
declare(strict_types=1);

namespace Puggan\Gnucash\Models;

use Puggan\Gnucash\Attributes\Field;
use Puggan\Gnucash\Attributes\Model;

/**
 * Class PredictionDate
 * @package Puggan\Gnucash\Models
 */
#[Model('prediction_dates')]
class PredictionDate extends Base
{
    #[Field('prediction_id', ture)]
    public int $predictionId = 0;
    #[Field('prediction_date', ture)]
    public string $predictionDate = '';
    #[Field('tx_guid')]
    public ?string $txGuid;
}
