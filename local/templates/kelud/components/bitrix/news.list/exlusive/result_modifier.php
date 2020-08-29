<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$sections = [];
$ids = [];
foreach ($arResult["ITEMS"] as &$item) {
    $ids[] = $item["ID"];
    $item["PROPERTIES"]["PRICE"]["VALUE"] = number_format($item["PROPERTIES"]["PRICE"]["VALUE"], 0, " ", " ");
    $sections[] = $item["IBLOCK_SECTION_ID"];
}

unset($item);
if (count($sections) > 0) {

    $groups = [];
    $res = CIBlockElement::GetElementGroups($ids);
    while ($ar_group = $res->Fetch()) {
        $groups[] = $ar_group;
    }

    $arFilter = array('IBLOCK_ID' => $arParams['IBLOCK_ID'], "ID" => $sections); // выберет потомков без учета активности
    $rsSect = CIBlockSection::GetList(array("SORT" => "ASC"), $arFilter, true);
    $fullSections = [];
    while ($arSect = $rsSect->GetNext()) {


        if ($arSect["PICTURE"]) {
            $arSect["PICTURE"] = CFile::GetFileArray($arSect["PICTURE"]);
            $arSect["PICTURE"] = CFile::ResizeImageGet($arSect["PICTURE"], array('width' => 300, 'height' => 300), BX_RESIZE_IMAGE_PROPORTIONAL, true);
            $arSect["PICTURE"] = $arSect["PICTURE"]["src"];
    } else {
            $arSect["PICTURE"] = NO_PHOTO;
        }


        $fullSections[] = $arSect;
    }
    foreach ($arResult["ITEMS"] as &$item) {
        foreach ($groups as $group) {
            if ($item["ID"] == $group["IBLOCK_ELEMENT_ID"]) {
                $item["IBLOCK_SECTIONS"][] = $group["ID"];
            }
        }
    }

    unset($item);

    foreach ($fullSections as &$sect) {
        foreach ($arResult["ITEMS"] as $item) {



            if (!$item["DETAIL_PICTURE"]["SRC"]) {
                $item["DETAIL_PICTURE"]["SRC"] = NO_PHOTO;
            }else{
                $file = CFile::GetFileArray($item["DETAIL_PICTURE"]["ID"]);
                $file = CFile::ResizeImageGet($file, array('width' => 255, 'height' => 162), BX_RESIZE_IMAGE_PROPORTIONAL, true);
                $item["DETAIL_PICTURE"]["SRC"] = $file["src"];
            }

            if ($item["CODE"] == 381089) {
                //dump($item);
            }

            if (in_array($sect["ID"], $item["IBLOCK_SECTIONS"])) {
                $sect["ITEMS"][] = $item;
            }
        }
    }

    unset($sect);

    $arResult["SECTIONS"] = $fullSections;
}