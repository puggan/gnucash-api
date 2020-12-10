<?php
declare(strict_types=1);

namespace Puggan\Gnucash\Models;

use JetBrains\PhpStorm\Pure;

/**
 * Class Prediction
 * @package Puggan\Gnucash\Models
 */
class Prediction extends Base
{
    public int $predictionId = 0;
    public string $name = '';
    public string $startDate = '';
    public ?string $endDate;
    public ?string $code;
    public ?int $value;

    #[Pure]
    public function tableName(): string
    {
        return 'predictions';
    }

    /**
     * @return string[]
     */
    #[Pure]
    public function fieldNames(): array
    {
        return [
            'prediction_id' => 'predictionId',
            'name' => 'name',
            'start_date' => 'startDate',
            'end_date' => 'endDate',
            'code' => 'code',
            'value' => 'value',
        ];
    }
}
