<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$arResult["PROPERTIES"]["ANNOTATION_IMG"]["VALUE"] = CFile::GetPath($arResult["PROPERTIES"]["ANNOTATION_IMG"]["VALUE"]);

$iDs = $arResult["PROPERTIES"]["BLOCK_ITEMS"]["VALUE"];


$arSelect = Array("ID", "NAME", "DATE_ACTIVE_FROM", "DETAIL_PAGE_URL", "DETAIL_PICTURE", "PROPERTY_PRICE");
$arFilter = Array("IBLOCK_ID" => 3, "ID" => $iDs, "ACTIVE" => "Y");
$res = CIBlockElement::GetList(Array(), $arFilter, false, Array(), $arSelect);
$items = [];

while ($ob = $res->GetNext()) {
    if ($ob["DETAIL_PICTURE"]) {

        $file = CFile::GetFileArray($ob["DETAIL_PICTURE"]);
        $file = CFile::ResizeImageGet($file, array('width' => 500, 'height' => 500), BX_RESIZE_IMAGE_PROPORTIONAL, true);
        $ob["DETAIL_PICTURE"] = $file["src"];
    } else {
        $ob["DETAIL_PICTURE"] = NO_PHOTO;
    }

    $ob["PROPERTY_PRICE_VALUE"] = number_format((int)$ob["PROPERTY_PRICE_VALUE"], 0, " ", " ");
    $items[(int)$ob["ID"]] = $ob;
}
$arResult["PROPERTIES"]["BLOCK_ITEMS"]["ITEMS"] = $items;

$cp = $this->__component;
$arResult["IMG"] = $arResult["PREVIEW_PICTURE"]["SRC"];
if ($arResult["IMG"]) {
    $cp->$arResult["IMG"] = $arResult["IMG"];
}
$cp->SetResultCacheKeys(array('IMG'));


