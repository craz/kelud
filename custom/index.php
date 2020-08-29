<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetPageProperty("TITLE", "Индивидуальные и нестандартные заказы");
$APPLICATION->SetPageProperty("description", "Выполнение нестандартных заказов по индивидуальным требованиям и размерам. ");
$APPLICATION->SetPageProperty("banner_class", "banner_light");
$APPLICATION->SetTitle("Индивидуальное решение");
?>

<?$APPLICATION->IncludeComponent(
	"parus:simple_form", 
	"custom", 
	array(
		"COMPONENT_TEMPLATE" => "custom",
		"YA_COUNT" => "",
		"YA_COUNT_GOAL" => "",
		"GL_COUNT_GOAL" => "",
		"FORM_HIDDEN" => "N",
		"FORM" => "2",
		"FORM_CLASS" => "content__form form form_highlighted",
		"THX_TITLE" => "",
		"THX_DESCRIPTION" => "",
		"FORM_ID" => "custom",
		"ADD_PARAMS" => "",
		"CAPTCHA_SITE_KEY" => "",
		"CAPTCHA_SECRET_KEY" => "",
		"POLICY_TEXT" => "",
		"POLICY_LINK_TEXT" => "",
		"POLICY_LINK" => "",
		"THX_URL" => "/thankyoupage/"
	),
	false
);?>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>