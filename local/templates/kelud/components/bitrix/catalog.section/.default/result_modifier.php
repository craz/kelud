<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @var CBitrixComponentTemplate $this
 * @var CatalogSectionComponent $component
 */


$count = count($arResult["ITEMS"]);
$max = $count / 10;

if ($max > 1) {
    $max = (int)$max;

    $facts = [];

    $arSelect = Array("ID", "IBLOCK_ID", "NAME", "PREVIEW_TEXT");//IBLOCK_ID и ID обязательно должны быть указаны, см. описание arSelectFields выше
    $arFilter = Array("IBLOCK_ID" => 13, "ACTIVE" => "Y");
    $res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize" => $max), $arSelect);
    while ($ob = $res->GetNextElement()) {
        $elem = $ob->GetFields();

        $facts[] = $elem;
    }
}

$c = 1;
$countFacts = 0;
foreach ($arResult["ITEMS"] as &$item) {
    $m = rand(7,10);
    if ($c % $m == 0) {
        $item["FACT"] = $facts[$countFacts];
        $countFacts++;
    }
    $c++;

    if (!$item["DETAIL_PICTURE"]["SRC"]) {
        $item["DETAIL_PICTURE"]["SRC"] = NO_PHOTO;
    }else{
        $item["DETAIL_PICTURE"] = CFile::GetFileArray($item["DETAIL_PICTURE"]["ID"]);
        $item["DETAIL_PICTURE"] = CFile::ResizeImageGet($item["DETAIL_PICTURE"], array('width' => 255, 'height' => 255), BX_RESIZE_IMAGE_PROPORTIONAL, true);
        $item["DETAIL_PICTURE"]["SRC"] = $item["DETAIL_PICTURE"]["src"];
    }

}

unset($item);
$component = $this->getComponent();
$arParams = $component->applyTemplateModifications();

$component->SetResultCacheKeys("ITEMS");

