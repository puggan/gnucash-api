<?php
declare(strict_types=1);

namespace Puggan\Gnucash\Models;

use JetBrains\PhpStorm\Pure;

/**
 * Class PredictionSplit
 * @package Puggan\Gnucash\Models
 */
class PredictionSplit extends Base
{
    public int $id = 0;
    public int $predictionId = 0;
    public string $predictionDate = '';
    public string $code = '';
    public int $value = 0;

    #[Pure]
    public function tableName(): string
    {
        return 'prediction_splits';
    }

    /**
     * @return string[]
     */
    #[Pure]
    public function fieldNames(): array
    {
        return [
            'id' => 'id',
            'prediction_id' => 'predictionId',
            'prediction_date' => 'predictionDate',
            'code' => 'code',
            'value' => 'value',
        ];
    }
}
