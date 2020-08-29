<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetPageProperty("TITLE", "Контакты интернет-магазина элитной мебели KELUD");
$APPLICATION->SetPageProperty("description", "Контактные данные интернет-магазина KELUD: адрес, телефон и электронная почта магазина.");
$APPLICATION->SetPageProperty("banner_class", "banner_light");
$APPLICATION->SetTitle("Контакты");
?>
<? $APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"contacts", 
	array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "N",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "N",
		"CHECK_DATES" => "N",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(
			0 => "SORT",
			1 => "",
		),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "8",
		"IBLOCK_TYPE" => "contacts_info",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "50",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array(
			0 => "SKYPE",
			1 => "ADDRESS",
			2 => "WORKTIME",
			3 => "PHONE",
			4 => "EMAIL",
			5 => "",
		),
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "SORT",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC",
		"STRICT_SECTION_CHECK" => "N",
		"COMPONENT_TEMPLATE" => "contacts"
	),
	false
); ?>
    <div class="content__block">
        <div class="map" data-center="[<?=$GLOBALS["COORDS"]?>]" data-zoom="12"></div>
    </div>
<?$APPLICATION->IncludeComponent(
	"parus:simple_form", 
	"contacts", 
	array(
		"COMPONENT_TEMPLATE" => "contacts",
		"YA_COUNT" => "53576923",
		"YA_COUNT_GOAL" => "fast_order",
		"GL_COUNT_GOAL" => "fast_order",
		"FORM_HIDDEN" => "N",
		"FORM" => "1",
		"FORM_CLASS" => "content__form form form_highlighted form_vertical",
		"THX_TITLE" => "",
		"THX_DESCRIPTION" => "",
		"FORM_ID" => "callback",
		"ADD_PARAMS" => "",
		"CAPTCHA_SITE_KEY" => "",
		"CAPTCHA_SECRET_KEY" => "",
		"POLICY_TEXT" => "",
		"POLICY_LINK_TEXT" => "",
		"POLICY_LINK" => "/upload/Политика конфиденциальности.pdf",
		"THX_URL" => "/thankyoupage/"
	),
	false
);?>



<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>