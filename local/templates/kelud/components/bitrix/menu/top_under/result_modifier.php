<?php

CModule::IncludeModule("fileman");

CMedialib::Init();
$title = $APPLICATION->GetTitle();
$arItems = CMedialibItem::GetList(array('arCollections' => array("0" => 1)));
foreach ($arItems as $item) {
    if ($item["NAME"] == $title) {
        $img = $item["PATH"];
        break;
    }
}

$APPLICATION->SetPageProperty("section_img", $img);


