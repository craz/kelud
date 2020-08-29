<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$left = [];
$right = [];

foreach ($arResult["ITEMS"] as $item) {
    if ($item["IBLOCK_SECTION_ID"] == 7) {
        $left[] = $item;
        continue;
    }
    if ($item["IBLOCK_SECTION_ID"] == 11) {
        $right = $item;
        continue;
    }
}

$arResult["LEFT"] = $left;
$arResult["RIGHT"] = $right;

$ids = [];

foreach ($arResult["ITEMS"] as $item) {
    if ($item["PROPERTIES"]["SUB_ELEMENTS"]["VALUE"]) {


        $ids = array_merge($ids, $item["PROPERTIES"]["SUB_ELEMENTS"]["VALUE"]);
    }
}

$arSelect = Array("ID","IBLOCK_ID", "NAME", "DETAIL_PAGE_URL");
$arFilter = Array("IBLOCK_ID" => 3, "ID" => $ids, "ACTIVE" => "Y");

$res = CIBlockElement::GetList(array(), $arFilter, false, Array(), $arSelect);
$elements = [];
while ($ob = $res->GetNext()) {
    $elements[] = $ob;
}

foreach ($arResult["ITEMS"] as &$item) {
    foreach ($elements as $element) {

        if (in_array($element["ID"], $item["PROPERTIES"]["SUB_ELEMENTS"]["VALUE"])) {
            $item["SUB_ELEMENTS"][$element["ID"]] = $element;
        }
    }
}

unset($item);

