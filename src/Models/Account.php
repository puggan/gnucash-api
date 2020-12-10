<?php
declare(strict_types=1);

namespace Puggan\Gnucash\Models;

class Account extends Base
{
    public ?string $guid;
    public string $name = '';
    public string $accountType = '';
    public ?string $commodityGuid;
    public string $commodityScu = '';
    public string $nonStdScu = '';
    public ?string $parentGuid;
    public ?string $code;
    public ?string $description;
    public ?bool $hidden;
    public ?bool $placeholder;

    public function tableName(): string
    {
        return 'accounts';
    }

    /**
     * @return string[]
     */
    public function fieldNames(): array
    {
        $singleWordFields = ['guid', 'name', 'code', 'description', 'hidden', 'placeholder'];
        $fieldTranslation = array_combine($singleWordFields, $singleWordFields);
        $fieldTranslation['account_type'] = 'accountType';
        $fieldTranslation['commodity_guid'] = 'commodityGuid';
        $fieldTranslation['commodity_scu'] = 'commodityScu';
        $fieldTranslation['non_std_scu'] = 'nonStdScu';
        $fieldTranslation['parent_guid'] = 'parentGuid';
        ksort($fieldTranslation);
        return $fieldTranslation;
    }
}
