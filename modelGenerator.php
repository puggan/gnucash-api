<?php
declare(strict_types=1);

use Puggan\Gnucash\Services\Database;

if (PHP_SAPI !== 'cli') {
    die(1);
}

require_once __DIR__ . '/cli.php';

(static function (\PDO $db) {
    $statement = $db->query('SHOW TABLES');
    $tables = [];
    while (false !== ($row = $statement->fetch(\PDO::FETCH_NUM))) {
        $tables[] = $row[0];
    }

    $tempDir = __DIR__ . '/src/Models/tmp';
    if (!is_dir($tempDir) && !mkdir($tempDir) && !is_dir($tempDir)) {
        throw new \RuntimeException(sprintf('Directory "%s" was not created', $tempDir));
    }
    foreach ($tables as $table) {
        $className = camelCase($table, true);
        if (substr($className, -1) === 's') {
            $className = substr($className, 0, -1);
        }
        $tempFileName = $tempDir . '/' . $className . '.php';
        echo "# {$table} -> {$tempFileName}", PHP_EOL;
        $phpfile = generatePhpFile($table, $className, $db);
        file_put_contents($tempFileName, $phpfile);
    }
})(
    Database::instance()
);

function camelCase(string $dbName, $uc = false): string
{
    $parts = explode('_', $dbName);
    $parts = array_map('\\ucfirst', $parts);
    if (!$uc) {
        $parts[0] = strtolower($parts[0]);
    }
    return implode('', $parts);
}

function generatePhpFile(string $table, string $className, \PDO $database)
{
    $properties = [];
    $statement = $database->query('DESCRIBE ' . $table);
    while (false !== ($row = $statement->fetch(\PDO::FETCH_ASSOC))) {
        $dbName = $row['Field'];
        $type = $row['Type'];
        $primaryKey = $row['Key'] === 'PRI';
        $nullable = $row['Null'] !== 'NO' || $primaryKey && $dbName === 'guid';
        $propertyName = camelCase($dbName);
        $pureType = preg_replace('#\(.*#', '', $type);
        switch ($pureType) {
            case 'bigint':
            case 'int':
            case 'tinyint':
                $phpType = 'int';
                $defaultPart = ' = 0';
                break;
            case 'decimal':
            case 'double':
                $phpType = 'float';
                $defaultPart = ' = 0';
                break;
            case 'char':
            case 'date':
            case 'longtext':
            case 'timestamp':
            case 'varchar':
                $phpType = 'string';
                $defaultPart = " = ''";
                break;
            default:
                die($type . PHP_EOL);
        }
        $phpType = ($nullable ? '?' : '') . $phpType;
        $defaultPart = $nullable ? '' : $defaultPart;

        if ($primaryKey) {
            $properties[$propertyName] = "    #[Field('{$dbName}', ture)]";
        } elseif ($dbName === $propertyName) {
            $properties[$propertyName] = "    #[Field]";
        } else {
            $properties[$propertyName] = "    #[Field('{$dbName}')]";
        }

        // public ?string \$guid;
        $properties[$propertyName] .= PHP_EOL . "    public {$phpType} \${$propertyName}{$defaultPart};";
    }

    if (empty($properties['guid'])) {
        $extraRefUse = '';
    } else {
        $properties['guid'] = '    use GuidModel;' . PHP_EOL;
        $extraRefUse = 'use Puggan\Gnucash\Interfaces\GuidModel;' . PHP_EOL;
    }
    $propertiesCode = implode(PHP_EOL, $properties);
    return <<<PHP_FILE
<?php
declare(strict_types=1);

namespace Puggan\Gnucash\Models;

use Puggan\Gnucash\Attributes\Field;
use Puggan\Gnucash\Attributes\Model;
{$extraRefUse}
/**
 * Class {$className}
 * @package Puggan\Gnucash\Models
 */
#[Model('{$table}')]
class {$className} extends Base
{
{$propertiesCode}
}

PHP_FILE;
}
