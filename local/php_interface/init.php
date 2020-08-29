<?
include_once($_SERVER['DOCUMENT_ROOT']."/bitrix/modules/wsrubi.smtp/classes/general/wsrubismtp.php");
include_once($_SERVER['DOCUMENT_ROOT'] . '/local/php_interface/constants.php');
use Bitrix\Highloadblock\HighloadBlockTable as HLBT;

AddEventHandler("main", "OnBeforeProlog", "MyOnBeforePrologHandler", 50);

function MyOnBeforePrologHandler()
{
    define("NO_PHOTO", SITE_TEMPLATE_PATH . "/common/no_photo.jpg");
}

function dump($string, $die = false)
{
    global $USER;
    if ($USER->IsAdmin()) {
        echo "<pre>";
        var_dump($string);
        echo "</pre>";

        if ($die) {
            die();
        }
    }
}

function GetEntityDataClass($HlBlockId)
{
    if (empty($HlBlockId) || $HlBlockId < 1) {
        return false;
    }
    $hlblock = HLBT::getById($HlBlockId)->fetch();
    $entity = HLBT::compileEntity($hlblock);
    $entity_data_class = $entity->getDataClass();
    return $entity_data_class;
}

AddEventHandler("iblock", "OnBeforeIBlockElementUpdate", "onSetAvailableProp");
AddEventHandler("iblock", "OnBeforeIBlockAdd", "onSetAvailableProp");

function onSetAvailableProp(&$arFields)
{
    if ($arFields['IBLOCK_ID'] == CATALOG_IBLOCK_ID) {
        $arProps = [];
        $properties = CIBlockProperty::GetList([], [
            'IBLOCK_ID' => CATALOG_IBLOCK_ID
        ]);

        while ($arProp = $properties->fetch()) {
            $arProps[$arProp['CODE']] = $arProp['ID'];
        }

        $inStock = CIBlockProperty::GetPropertyEnum("IN_STOCK", [], [
            'IBLOCK_ID' => CATALOG_IBLOCK_ID,
            'VALUE' => 'В наличии'
        ])->fetch()['ID'];

        if ($arFields['PROPERTY_VALUES'][$arProps['IN_STOCK']][0]['VALUE'] == $inStock) {
            $available = CIBlockProperty::GetPropertyEnum("AVAILABLE", [], [
                'IBLOCK_ID' => CATALOG_IBLOCK_ID,
                'VALUE' => 'Да'
            ])->fetch()['ID'];

            $arFields['PROPERTY_VALUES'][$arProps['AVAILABLE']] = [
                'n0' => [
                    'VALUE' => $available
                ]
            ];
        } else {
            $available = CIBlockProperty::GetPropertyEnum("AVAILABLE", [], [
                'IBLOCK_ID' => CATALOG_IBLOCK_ID,
                'VALUE' => 'Нет'
            ])->fetch()['ID'];

            $arFields['PROPERTY_VALUES'][$arProps['AVAILABLE']] = [
                'n0' => [
                    'VALUE' => $available
                ]
            ];
        }
    }
}
