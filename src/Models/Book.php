<?php
declare(strict_types=1);

namespace Puggan\Gnucash\Models;

use JetBrains\PhpStorm\Pure;

/**
 * Class Book
 * @package Puggan\Gnucash\Models
 */
class Book extends Base
{
    public ?string $guid;
    public string $rootAccountGuid = '';
    public string $rootTemplateGuid = '';

    #[Pure]
    public function tableName(): string
    {
        return 'books';
    }

    /**
     * @return string[]
     */
    #[Pure]
    public function fieldNames(): array
    {
        return [
            'guid' => 'guid',
            'root_account_guid' => 'rootAccountGuid',
            'root_template_guid' => 'rootTemplateGuid',
        ];
    }
}
