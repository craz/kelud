<?
include_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/urlrewrite.php');

CHTTP::SetStatus("404 Not Found");
@define("ERROR_404","Y");

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("banner_class", "banner_light");

$APPLICATION->SetTitle("Страница не найдена");

$APPLICATION->IncludeComponent(
	"bitrix:main.include", 
	"sub", 
	array(
		"COMPONENT_TEMPLATE" => "sub",
		"AREA_FILE_SHOW" => "file",
		"PATH" => "404_inc",
		"EDIT_TEMPLATE" => ""
	),
	false
);

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>