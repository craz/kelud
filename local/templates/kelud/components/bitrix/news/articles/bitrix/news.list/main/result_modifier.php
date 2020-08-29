<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$arImgs = [];

foreach ($arResult["ITEMS"] as $arItem) {
    $arImgs[] = $arItem["PREVIEW_PICTURE"]["SRC"];
}

$cp = $this->__component;
$arResult["IMGS"] = $arImgs;
$cp->$arResult["IMGS"] = $arImgs;
$cp->SetResultCacheKeys(array('IMGS'));

