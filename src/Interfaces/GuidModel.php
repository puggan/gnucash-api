<?php
declare(strict_types=1);

namespace Puggan\Gnucash\Interfaces;

use Puggan\Gnucash\Attributes\Field;
use Puggan\Gnucash\Models\Account;
use Puggan\Gnucash\Models\Base;

/**
 * Trait GuidModel
 * @package Puggan\Gnucash\Interfaces
 */
trait GuidModel
{
    use PrimaryKeyGenerator;

    #[Field(primaryKey: true)]
    public ?string $guid;

    public function fixMissingPK(): void {
        if(empty($this->guid)) {
            $this->guid = self::newGuid();
        }
    }

    /**
     * @return string[]
     */
    public static function guidClasses(): array
    {
        return [
            Account::class,
        ];
    }

    public static function getClassForGuid(\PDO $database, string $guid): ?string
    {
        $filter = ' WHERE guid = ' . $database->quote($guid);
        $subQueries = [];
        foreach (self::guidClasses() as $className) {
            if($className instanceof Base) {
                $tableName = $className::tableName();
                $subQueries[$tableName] = 'SELECT ' . $database->quote($className) . ' AS c FROM ' . $tableName . $filter;
            }
        }
        $query = implode(' UNION ', $subQueries) . ' LIMIT 1';
        $statement = $database->query($query);
        $dbRow = $statement->fetch(\PDO::FETCH_ASSOC);
        return $dbRow ? $dbRow['c'] : null;
    }

    /**
     * @param \PDO $database
     * @return string
     * @throws \UnexpectedValueException
     */
    public static function newGuid(\PDO $database): string
    {
        $maxCount = 10000;
        do {
            try {
                $guid = bin2hex(random_bytes(16));
            } catch (\Exception) {
                throw new \UnexpectedValueException('New GUID not created');
            }
            if ($maxCount-- <= 0) {
                throw new \UnexpectedValueException('New GUID not found');
            }
        } while (self::getClassForGuid($database, $guid));

        return $guid;
    }
}
