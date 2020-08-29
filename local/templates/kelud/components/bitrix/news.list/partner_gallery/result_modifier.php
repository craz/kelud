<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$ids = [];

foreach ($arResult["ITEMS"] as &$item) {
    $item["PROPERTIES"]["FILE"]["VALUE"] = CFile::GetFileArray((int)$item["PROPERTIES"]["FILE"]["VALUE"]);
    $ids[] = $item["PROPERTIES"]["ITEM"]["VALUE"];
}

unset($item);
$elems = [];

$arSelect = Array("ID", "IBLOCK_ID","DETAIL_PAGE_URL", "NAME", "PROPERTY_*");//IBLOCK_ID и ID обязательно должны быть указаны, см. описание arSelectFields выше
$arFilter = Array("IBLOCK_ID" => 3, "ACTIVE" => "Y", "ID" => $ids);
$res = CIBlockElement::GetList(Array(), $arFilter, false, Array(), $arSelect);
while ($ob = $res->GetNext()) {

    $elems[] = $ob;
}

foreach ($arResult["ITEMS"] as &$item) {
    foreach ($elems as $elem) {

        if ($item["PROPERTIES"]["ITEM"]["VALUE"] == $elem["ID"]) {
            $item["ELEMENTS"][] = $elem;
        }
    }
}
unset($item);

