<?php
$sectionIds = [];
foreach ($arResult["ITEMS"] as $item) {
    $sectionIds[] = $item["IBLOCK_SECTION_ID"];
}

$arFilter = array('IBLOCK_ID' => $arResult['IBLOCK_ID'], "ID" => $sectionIds);
$rsSect = CIBlockSection::GetList(array(), $arFilter);

$allSect = [];
while ($arSect = $rsSect->GetNext()) {
    $sect["ID"] = $arSect["ID"];
    $sect["NAME"] = $arSect["NAME"];
    $allSect[] = $sect;
}

unset($sect);

foreach ($allSect as &$sect) {
    foreach ($arResult["ITEMS"] as $item) {
        if ($item["IBLOCK_SECTION_ID"] == $sect["ID"]) {
            $sect["ITEMS"][] = $item;
        }
    }
}
$arResult["SECTIONS"] = $allSect;