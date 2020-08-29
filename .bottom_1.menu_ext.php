<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

global $APPLICATION;

$aMenuLinksExt = $APPLICATION->IncludeComponent(
	"bitrix:menu.sections", 
	"", 
	array(
		"IS_SEF" => "Y",
		"SEF_BASE_URL" => "/catalog/#SECTION_CODE_PATH#/",


		"IBLOCK_ID" => "3",
		"IBLOCK_TYPE" => "catalog",
		"DEPTH_LEVEL" => "1",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "3600",
		"INCLUDE_SUBSECTIONS" => "Y",
		"DETAIL_PAGE_URL" => "#SECTION_ID#/#ELEMENT_ID#"
	),
	false
);

$aMenuLinks = array_merge($aMenuLinks, $aMenuLinksExt);