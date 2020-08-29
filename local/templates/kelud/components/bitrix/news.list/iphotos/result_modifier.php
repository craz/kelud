<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$idS = [];
foreach ($arResult["ITEMS"] as &$item) {
    $idS[] = $item["PROPERTIES"]["ITEM"]["VALUE"];

    $item["PROPERTIES"]["FILE"]["VALUE"] = CFile::GetFileArray((int)$item["PROPERTIES"]["FILE"]["VALUE"]);

}
unset($item);
/**
 * Вытаскиваем связанные элементы
 */

$arSelect = Array("ID", "NAME", "DETAIL_PAGE_URL");
$arFilter = Array("IBLOCK_ID" => 3, "ID" => $idS, "ACTIVE" => "Y");
$res = CIBlockElement::GetList(Array(), $arFilter, false, Array(), $arSelect);
$items = [];

while ($ob = $res->GetNext()) {
    $items[] = $ob;
}
foreach ($arResult["ITEMS"] as &$item) {

    foreach ($items as $subItem) {
        if ($item["PROPERTIES"]["ITEM"]["VALUE"] == $subItem["ID"]) {

            $item["PROPERTIES"]["ITEM"]["VALUE"] = $subItem;
        }
    }
}