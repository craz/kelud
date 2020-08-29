<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

CModule::IncludeModule("iblock");
$aMenuLinksExt = [];
$arSelect = Array("ID", "NAME", "DETAIL_PAGE_URL");
$arFilter = Array("IBLOCK_ID" => 2, "ACTIVE_DATE" => "Y", "ACTIVE" => "Y");
$res = CIBlockElement::GetList(Array(), $arFilter, false, Array(), $arSelect);
while ($ob = $res->GetNext()) {

    $item = [];
    $item[] = $ob["NAME"];
    $item[] = $ob["DETAIL_PAGE_URL"];
    $aMenuLinksExt[] = $item;

}
$aMenuLinks = array_merge($aMenuLinks, $aMenuLinksExt);