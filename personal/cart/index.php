<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Корзина");
?>
<div class="wrapper wrapper_small">

<?$APPLICATION->IncludeComponent(
	"bitrix:sale.basket.basket", 
	"basket_sku", 
	array(
		"COLUMNS_LIST" => array(
			0 => "NAME",
			1 => "PRICE",
			2 => "QUANTITY",
			3 => "DELETE",
			4 => "DISCOUNT",
		),
		"PATH_TO_ORDER" => "/personal/order/make/",
		"HIDE_COUPON" => "N",
		"SET_TITLE" => "Y",
		"COMPONENT_TEMPLATE" => "basket_sku",
		"DEFERRED_REFRESH" => "N",
		"USE_DYNAMIC_SCROLL" => "Y",
		"SHOW_FILTER" => "N",
		"SHOW_RESTORE" => "N",
		"COLUMNS_LIST_EXT" => array(
			0 => "PREVIEW_PICTURE",
			1 => "DELETE",
			2 => "SUM",
		),
		"COLUMNS_LIST_MOBILE" => array(
			0 => "PREVIEW_PICTURE",
			1 => "DELETE",
			2 => "SUM",
		),
		"TEMPLATE_THEME" => "yellow",
		"TOTAL_BLOCK_DISPLAY" => array(
			0 => "bottom",
		),
		"DISPLAY_MODE" => "extended",
		"PRICE_DISPLAY_MODE" => "Y",
		"SHOW_DISCOUNT_PERCENT" => "N",
		"PRODUCT_BLOCKS_ORDER" => "props,sku,columns",
		"USE_PRICE_ANIMATION" => "Y",
		"LABEL_PROP" => array(
		),
		"PRICE_VAT_SHOW_VALUE" => "N",
		"USE_PREPAYMENT" => "N",
		"QUANTITY_FLOAT" => "N",
		"CORRECT_RATIO" => "Y",
		"AUTO_CALCULATION" => "Y",
		"ACTION_VARIABLE" => "basketAction",
		"COMPATIBLE_MODE" => "Y",
		"EMPTY_BASKET_HINT_PATH" => "/",
		"OFFERS_PROPS" => array(
			0 => "LINK_PODSTOLIE",
		),
		"ADDITIONAL_PICT_PROP_3" => "-",
		"ADDITIONAL_PICT_PROP_15" => "-",
		"BASKET_IMAGES_SCALING" => "adaptive",
		"USE_GIFTS" => "N",
		"USE_ENHANCED_ECOMMERCE" => "N"
	),
	false
);?>
</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>