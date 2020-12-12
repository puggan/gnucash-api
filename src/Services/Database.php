<?php
declare(strict_types=1);

namespace Puggan\Gnucash\Services;

/**
 * Class Database
 * @package Puggan\Gnucash\Services
 */
class Database
{
    public static ?\PDO $link = null;

    public static function instance(): \PDO
    {
        if (!self::$link) {
            $hostname = \getenv('MYSQL_HOST');
            $dbname = \getenv('MYSQL_DATABASE');
            $username = \getenv('MYSQL_USER');
            $password = \getenv('MYSQL_PASSWORD');

            $options = [
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
                \PDO::ATTR_EMULATE_PREPARES => false,
            ];

            self::$link = new \PDO(
                "mysql:host={$hostname};dbname={$dbname};charset=utf8",
                $username,
                $password,
                $options
            );
        }

        return self::$link;
    }
}
