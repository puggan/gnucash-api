<?php
declare(strict_types=1);

namespace Puggan\Gnucash\Models;

use JetBrains\PhpStorm\Pure;

/**
 * Class Cookie
 * @package Puggan\Gnucash\Models
 */
class Cookie extends Base
{
    public int $id = 0;
    public string $token = '';
    public string $user = '';
    public string $device = '';
    public int $authLevel = 0;

    #[Pure]
    public function tableName(): string
    {
        return 'cookies';
    }

    /**
     * @return string[]
     */
    #[Pure]
    public function fieldNames(): array
    {
        return [
            'id' => 'id',
            'token' => 'token',
            'user' => 'user',
            'device' => 'device',
            'auth_level' => 'authLevel',
        ];
    }
}
