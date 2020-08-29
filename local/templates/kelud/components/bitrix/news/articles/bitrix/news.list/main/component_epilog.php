<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$index = \Bitrix\Main\Security\Random::getInt(0,count($arResult["IMGS"])-1);

global $APPLICATION;

$img = $arResult["IMGS"][$index];
$APPLICATION->SetPageProperty("section_img",$img);

