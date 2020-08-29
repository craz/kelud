<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/**
 * Вытаскиваем модели.
 */
$idsItems = [];
$iDs = $arResult["PROPERTIES"]["MODELS"]["VALUE"];
$arSelect = Array("ID", "NAME", "PREVIEW_PICTURE", "PROPERTY_FILE","PROPERTY_RENDER_FILE","PROPERTY_ELEMENT");
$arFilter = Array("IBLOCK_ID" => 9, "ID" => $iDs, "ACTIVE" => "Y");
$res = CIBlockElement::GetList(Array(), $arFilter, false, Array(), $arSelect);
$models = [];
while ($ob = $res->GetNext()) {
    $file = CFile::GetFileArray($ob["PREVIEW_PICTURE"]);
    $file = CFile::ResizeImageGet($file, array('width' => 500, 'height' => 500), BX_RESIZE_IMAGE_PROPORTIONAL, true);
    $ob["PREVIEW_PICTURE"] = $file["src"];

    $ob["PROPERTY_FILE"] = CFile::GetPath($ob["PROPERTY_FILE_VALUE"]);
    $idsItems[] = $ob["PROPERTY_ELEMENT"];
    $models[] = $ob;
}
/**
 * Вытаскиваем элементы для слайдера
 */

//$iDs = $arResult["PROPERTIES"]["ITEMS_SLIDER"]["VALUE"];
$arSelect = Array("ID", "NAME", "PREVIEW_PICTURE", "DETAIL_PAGE_URL", "DETAIL_PICTURE");
$arFilter = Array("IBLOCK_ID" => 3, "ID" => $idsItems, "ACTIVE" => "Y");
$res = CIBlockElement::GetList(Array(), $arFilter, false, Array(), $arSelect);
$items = [];
while ($ob = $res->GetNext()) {
    $ob["PREVIEW_PICTURE"] = CFile::GetPath($ob["PREVIEW_PICTURE"]);
    $ob["DETAIL_PICTURE"] = CFile::GetPath($ob["DETAIL_PICTURE"]);
    $items[] = $ob;
}



$arResult["PROPERTIES"]["ITEMS_SLIDER"]["ITEMS"] = $items;

$arResult["PROPERTIES"]["MODELS"]["ITEMS"] = $models;
$arResult["PROPERTIES"]["TOP_IMAGE"]["SRC"] = CFile::GetPath($arResult["PROPERTIES"]["TOP_IMAGE"]["VALUE"]);
$arResult["PROPERTIES"]["BANNER_IMAGE"]["SRC"] = CFile::GetPath($arResult["PROPERTIES"]["BANNER_IMAGE"]["VALUE"]);


$cp = $this->__component;
$arResult["IMG"] = $arResult["PREVIEW_PICTURE"]["SRC"];
$cp->$arResult["IMG"] = $arResult["IMG"];

if ($arResult["PROPERTIES"]["HREF_PRICE"]["VALUE"]) {
    $arResult["HREF_PRICE"] = $arResult["PROPERTIES"]["HREF_PRICE"]["VALUE"];
}

$cp->SetResultCacheKeys(array('IMG', "HREF_PRICE"));


$this->SetViewTarget('button');?>
    <button class="banner__action button button_gold" data-scroll="#partner" >Индивидуальное предложение</button>
<? $this->EndViewTarget();

