<?php
declare(strict_types=1);

namespace Puggan\Gnucash\Models;

use JetBrains\PhpStorm\Pure;

/**
 * Class PredictionDate
 * @package Puggan\Gnucash\Models
 */
class PredictionDate extends Base
{
    public int $predictionId = 0;
    public string $predictionDate = '';
    public ?string $txGuid;

    #[Pure]
    public function tableName(): string
    {
        return 'prediction_dates';
    }

    /**
     * @return string[]
     */
    #[Pure]
    public function fieldNames(): array
    {
        return [
            'prediction_id' => 'predictionId',
            'prediction_date' => 'predictionDate',
            'tx_guid' => 'txGuid',
        ];
    }
}
