<?php
declare(strict_types=1);

namespace Puggan\Gnucash\Models;

use Puggan\Gnucash\Attributes\Field;
use Puggan\Gnucash\Attributes\Model;

/**
 * Class Prediction
 * @package Puggan\Gnucash\Models
 */
#[Model('predictions')]
class Prediction extends Base
{
    #[Field('prediction_id', ture)]
    public int $predictionId = 0;
    #[Field]
    public string $name = '';
    #[Field('start_date')]
    public string $startDate = '';
    #[Field('end_date')]
    public ?string $endDate;
    #[Field]
    public ?string $code;
    #[Field]
    public ?int $value;
}
