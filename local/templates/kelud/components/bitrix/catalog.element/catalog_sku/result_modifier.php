<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @var CBitrixComponentTemplate $this
 * @var CatalogElementComponent $component
 */

$component = $this->getComponent();
$arParams = $component->applyTemplateModifications();
//echo "<pre>";
//print_r($arResult["OFFERS"]["0"]["ITEM_PRICES"]["0"]["PRINT_RATIO_PRICE"]);
//$arResult["OFFERS"]["0"]["ITEM_PRICES"]["0"]["PRINT_RATIO_PRICE"] = 'вашу ж мать';
//$arResult["OFFERS"]["0"]["PRICES"]["BASE_PRICE"]["VALUE"] = $arResult["OFFERS"]["0"]["PRICES"]["BASE_PRICE"]["VALUE"] + $arResult["PRICES"]["BASE_PRICE"]["VALUE"];
//echo "</pre>";
foreach ($arResult["PROPERTIES"]["MORE_PHOTO"]["VALUE"] as &$value) {
    $value = CFile::GetPath($value);
}
CModule::IncludeModule('highloadblock');
$entity_data_class = GetEntityDataClass(1);
$rsData = $entity_data_class::getList(array('select' => array('UF_COLOR_CODE', "UF_XML_ID"), "filter" => array("UF_XML_ID" => $arResult["PROPERTIES"]["COLOR"]["VALUE"])));
while ($el = $rsData->fetch()) {
    $allColors[$el["UF_XML_ID"]] = $el;
}
$arResult["ALL_COLORS"] = $allColors;
unset($value);

$allForms = [];

$entity_data_class = GetEntityDataClass(2);
$rsData = $entity_data_class::getList(array('select' => array('UF_NAME', "UF_XML_ID"), "filter" => array("UF_XML_ID" => $arResult["PROPERTIES"]["FORM"]["VALUE"])));
while ($el = $rsData->fetch()) {
    $allForms[$el["UF_XML_ID"]] = $el;
}
$arResult["ALL_FORMS"] = $allForms;
$allEdges = [];
$entity_data_class = GetEntityDataClass(3);
$rsData = $entity_data_class::getList(array('select' => array('UF_NAME', "UF_XML_ID"), "filter" => array("UF_XML_ID" => $arResult["PROPERTIES"]["EDGE"]["VALUE"])));
while ($el = $rsData->fetch()) {
    $allEdges[$el["UF_XML_ID"]] = $el;
}
$arResult["ALL_EDGE"] = $allEdges;

$arSelect = Array(
    "ID",
    "LANG_DIR",
    "IBLOCK_CODE",
    "IBLOCK_ID",
    "IBLOCK_SECTION_ID",
    "CODE",
    "NAME",
    "PREVIEW_PICTURE",
    "DETAIL_PICTURE",
    "DETAIL_PAGE_URL",
    "PROPERTY_*"
);
$arFilter = Array(
    "IBLOCK_ID" => $arResult["IBLOCK_ID"],
    "SECTION_ID" => $arResult["SECTION"]["ID"], "ACTIVE" => "Y",
    "!ID" => $arResult["ID"],
);
$arr_analogs = CIBlockElement::GetList(Array("RAND" => "ASC"), $arFilter, false, Array("nPageSize" => 10), $arSelect);
$analogs = [];

while ($arr_analog = $arr_analogs->GetNext()) {
    if ($arr_analog["DETAIL_PICTURE"]) {

        $arr_analog["PREVIEW_PICTURE"] = CFile::GetFileArray($arr_analog["DETAIL_PICTURE"]);
        $arr_analog["PREVIEW_PICTURE"] = CFile::ResizeImageGet($arr_analog["DETAIL_PICTURE"], array('width' => 500, 'height' => 500), BX_RESIZE_IMAGE_PROPORTIONAL, true);
        $arr_analog["PREVIEW_PICTURE"] = $arr_analog["PREVIEW_PICTURE"]["src"];

    } else {
        $arr_analog["PREVIEW_PICTURE"] = NO_PHOTO;
    }
    $arr_analog["PRICE"] = number_format($arr_analog["PROPERTY_6"], 0, "", " ");

    $analogs[] = $arr_analog;
}
$arResult["ANALOGS"] = $analogs;


$arSelect = Array(
    "ID",
    "LANG_DIR",
    "IBLOCK_CODE",
    "IBLOCK_ID",
    "IBLOCK_SECTION_ID",
    "CODE",
    "NAME",
    "PREVIEW_PICTURE",
    "DETAIL_PICTURE",
    "DETAIL_PAGE_URL",
    "PROPERTY_*"
);

$arFilter = Array(
    "IBLOCK_ID" => $arResult["IBLOCK_ID"],
    "ACTIVE" => "Y",
    "ID" => $arResult["PROPERTIES"]["ASSOCIATED_ITEMS"]["VALUE"],
);


$more_photo = $arResult["PROPERTIES"]["MORE_PHOTO"]["VALUE"];

if (!empty($more_photo)) {
	foreach ($more_photo as $photo) {

		$file = CFile::MakeFileArray($photo, false, false, '');
		$fid = CFile::SaveFile($file, "vote");
		
		$arResult['PHOTO']['PREVIEW'][] = CFile::ResizeImageGet($fid, array('width' => 81, 'height' => 54), BX_RESIZE_IMAGE_PROPORTIONAL, true);
        $arResult['PHOTO']['MEDIUM'][] = CFile::ResizeImageGet($fid, array('width' => 546, 'height' => 546), BX_RESIZE_IMAGE_PROPORTIONAL, true);
		$arResult['PHOTO']['ORIGINAL'][] = CFile::ResizeImageGet($fid, array('width' => 1200, 'height' => 900), BX_RESIZE_IMAGE_PROPORTIONAL, true);		
	}
}

	$arFile = CFile::GetFileArray($arResult["DETAIL_PICTURE"]['ID']);

    $preview_image_resize = CFile::ResizeImageGet($arFile['ID'], array('width' => 81, 'height' => 54), BX_RESIZE_IMAGE_PROPORTIONAL, true);
    $medium_image_resize = CFile::ResizeImageGet($arFile['ID'], array('width' => 546, 'height' => 546), BX_RESIZE_IMAGE_PROPORTIONAL, true);
	$detail_image_resize = CFile::ResizeImageGet($arFile['ID'], array('width' => 1200, 'height' => 900), BX_RESIZE_IMAGE_PROPORTIONAL, true);

    foreach ($preview_image_resize as $kp => $vp) {
        $kp = mb_strtoupper($kp);
        $arResult["PREVIEW_PICTURE"][$kp] = $vp;
    }

    foreach ($medium_image_resize as $km => $vm) {
        $km = mb_strtoupper($km);
        $arResult["MEDIUM_PICTURE"][$km] = $vm;
    }
		
	foreach ($detail_image_resize as $kd => $vd) {
		$kd = mb_strtoupper($kd);
		$arResult["DETAIL_PICTURE"][$kd] = $vd;
	}

$arr_assocs = CIBlockElement::GetList(Array("RAND" => "ASC"), $arFilter, false, Array("nPageSize" => 10), $arSelect);
$allAssoc = [];

while ($arr_assoc = $arr_assocs->GetNext()) {
    $arr_assoc["PRICE"] = number_format($arr_assoc["PROPERTY_6"], 0, "", " ");

    if ($arr_assoc["DETAIL_PICTURE"]) {
		
        $arr_assoc["PREVIEW_PICTURE"] = CFile::GetFileArray($arr_assoc["DETAIL_PICTURE"]);
        $arr_assoc["PREVIEW_PICTURE"] = CFile::ResizeImageGet($arr_assoc["DETAIL_PICTURE"], array('width' => 255, 'height' => 152), BX_RESIZE_IMAGE_PROPORTIONAL, true);
        $arr_assoc["PREVIEW_PICTURE"] = $arr_assoc["PREVIEW_PICTURE"]["src"];
		
    } else {
        $arr_assoc["PREVIEW_PICTURE"] = NO_PHOTO;
    }

    $allAssoc[] = $arr_assoc;
}

$arResult["ASSOCIATED_ITEMS"] = $allAssoc;

$subSize = "";

$removeKeys = [];

foreach ($arResult["PROPERTIES"]["SIZES"]["VALUE"] as $key => $value) {
    $descr = $arResult["PROPERTIES"]["SIZES"]["DESCRIPTION"][$key];
    if ($descr == "Длина" || $descr == "Ширина" || $descr == "Высота") {
        if ($subSize == "") {
            $subSize .= $value;
        } else {
            $subSize .= "x" . $value;
        }

        $removeKeys[] = $key;
    }else if($descr == "Толщина")
    {
        $arResult["PROPERTIES"]["SIZES"]["VALUE"][$key] .=" см";
    }else if($descr == "Вес")
    {
        $arResult["PROPERTIES"]["SIZES"]["VALUE"][$key] .=" кг";
    }

}



foreach ($removeKeys as $key) {
    unset($arResult["PROPERTIES"]["SIZES"]["VALUE"][$key]);
    unset($arResult["PROPERTIES"]["SIZES"]["DESCRIPTION"][$key]);
}
array_unshift($arResult["PROPERTIES"]["SIZES"]["VALUE"], $subSize);
array_unshift($arResult["PROPERTIES"]["SIZES"]["DESCRIPTION"], "");
unset($item);


$cp = $this->__component;
$cp->SetResultCacheKeys(array('PROPERTIES'));