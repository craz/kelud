<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Ваш заказ");
?><div class="wrapper wrapper_small">
	 <?$APPLICATION->IncludeComponent(
	"bitrix:sale.basket.basket",
	"basket_sku",
	Array(
		"ACTION_VARIABLE" => "basketAction",
		"ADDITIONAL_PICT_PROP_15" => "-",
		"ADDITIONAL_PICT_PROP_3" => "-",
		"AUTO_CALCULATION" => "Y",
		"BASKET_IMAGES_SCALING" => "adaptive",
		"COLUMNS_LIST" => array(0=>"NAME",1=>"PRICE",2=>"QUANTITY",3=>"DELETE",4=>"DISCOUNT",),
		"COLUMNS_LIST_EXT" => array(0=>"PREVIEW_PICTURE",1=>"DELETE",2=>"SUM",),
		"COLUMNS_LIST_MOBILE" => array(0=>"PREVIEW_PICTURE",1=>"DELETE",2=>"SUM",),
		"COMPATIBLE_MODE" => "Y",
		"COMPONENT_TEMPLATE" => "basket_sku",
		"CORRECT_RATIO" => "Y",
		"DEFERRED_REFRESH" => "N",
		"DISPLAY_MODE" => "extended",
		"EMPTY_BASKET_HINT_PATH" => "/",
		"HIDE_COUPON" => "Y",
		"LABEL_PROP" => array(),
		"OFFERS_PROPS" => array(0=>"LINK_PODSTOLIE",),
		"PATH_TO_ORDER" => "/personal/order/make/",
		"PRICE_DISPLAY_MODE" => "Y",
		"PRICE_VAT_SHOW_VALUE" => "N",
		"PRODUCT_BLOCKS_ORDER" => "props,sku,columns",
		"QUANTITY_FLOAT" => "N",
		"SET_TITLE" => "Y",
		"SHOW_DISCOUNT_PERCENT" => "N",
		"SHOW_FILTER" => "N",
		"SHOW_RESTORE" => "N",
		"TEMPLATE_THEME" => "yellow",
		"TOTAL_BLOCK_DISPLAY" => array(0=>"bottom",),
		"USE_DYNAMIC_SCROLL" => "Y",
		"USE_ENHANCED_ECOMMERCE" => "N",
		"USE_GIFTS" => "N",
		"USE_PREPAYMENT" => "N",
		"USE_PRICE_ANIMATION" => "Y"
	)
);?>
</div><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>