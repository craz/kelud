<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Ваш заказ");
$APPLICATION->SetPageProperty("banner_class", "banner_light");

global $arFilter;
global $cart;
$cartCookie = $_COOKIE["cart"];
$cart = json_decode($cartCookie);
$ids = [];

foreach ($cart as $item) {
    $ids[] = $item->id;
}

$arFilter = array("ID" => $ids);

if ($ids[0] == null && count($ids) < 2) {?><div class="content__block wrapper wrapper_small">
    <div class="checkout">
        <h2 class="checkout__title">Вы&nbsp;ещё ничего не&nbsp;заказали</h2>
    </div>
</div><?}else{
    $APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"cart", 
	array(
		"CART" => $cart,
		"COMPONENT_TEMPLATE" => "cart",
		"IBLOCK_TYPE" => "catalog",
		"IBLOCK_ID" => "3",
		"NEWS_COUNT" => "20",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_ORDER1" => "DESC",
		"SORT_BY2" => "SORT",
		"SORT_ORDER2" => "ASC",
		"FILTER_NAME" => "arFilter",
		"FIELD_CODE" => array(
			0 => "DETAIL_PICTURE",
			1 => "",
		),
		"PROPERTY_CODE" => array(
			0 => "PRICE",
			1 => "",
		),
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"CACHE_TYPE" => "N",
		"CACHE_TIME" => "0",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"PREVIEW_TRUNCATE_LEN" => "",
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"SET_TITLE" => "N",
		"SET_BROWSER_TITLE" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_LAST_MODIFIED" => "N",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"ADD_SECTIONS_CHAIN" => "N",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"INCLUDE_SUBSECTIONS" => "N",
		"STRICT_SECTION_CHECK" => "N",
		"DISPLAY_DATE" => "N",
		"DISPLAY_NAME" => "N",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"PAGER_TEMPLATE" => ".default",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"PAGER_TITLE" => "Новости",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"SET_STATUS_404" => "N",
		"SHOW_404" => "N",
		"MESSAGE_404" => ""
	),
	false
);

    ?>


    <div class="checkout-form">
        <form id="zakaz_form_go" method="post" class="form form_highlighted" onsubmit="zakaz_form('zakaz_form_go'); return false;">
            <label class="form__item">
                <span class="form__label">Ваше имя</span>
                <input type="text" class="form__input input" name="fields[NAME]" value="" required="">
            </label>

            <label class="form__item">
                <span class="form__label">Город</span>
                <input type="text" class="form__input input" name="fields[CITY]" value="" required="">
            </label>

            <label class="form__item">
                <span class="form__label">Телефон для связи</span>
                <input type="tel" class="form__input input" name="fields[PHONE]" value="" required="">
            </label>
            <label class="form__item">
                <span class="form__label">Эл. почта для счёта</span>
                <input type="email" class="form__input input" name="fields[EMAIL]" value="" required="">
            </label>

            <label class="form__item form__item_textarea">
                <span class="form__label">Комментарий</span>
                <textarea class="form__input input input_textarea" placeholder="Тип, цвет, форма, общие пожелания" name="fields[TEXT]" value=""></textarea>
            </label>

            <input type="hidden" class="check_for_send" value="">
            <div class="form__item">
                <div class="form__submit">
                    <button type="submit" class="button button_gold">Отправить</button>
                    <div class="form__legal">
                        Нажимая кнопку «Отправить», вы&nbsp;соглашаетесь с&nbsp;<a target="_blank" href="/upload/Политика конфиденциальности.pdf" class="link">политикой
                            обработки персональных данных</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script>
        function zakaz_form(){
            var check = $('.check_for_send').val();
           // alert('123');
            if(check != ''){
                alert('ФУ фУ фу  - БОТ =)');
            }else{
                $.ajax({
                    url: "/include/res/send_zakaz.php",
                    type: "POST",
                    dataType:"json",
                    data:$('#zakaz_form_go').serialize(),
                    success: function(data){
                        yaCounter53576923.reachGoal('order_basket');
                        ga('send','event','form','order_basket');
                        location.reload();
                        window.location.replace('/thankyoupage/');
                    },
                    complete: function(data){

                    }
                });
                return false;
            }
        }
    </script>

    <?/*
        $APPLICATION->IncludeComponent(
        "parus:simple_form",
        "cart",
        array(
            "COMPONENT_TEMPLATE" => "cart",
            "YA_COUNT" => "53576923",
            "YA_COUNT_GOAL" => "order_basket",
            "GL_COUNT_GOAL" => "order_basket",
            "FORM_HIDDEN" => "N",
            "FORM" => "3",
            "FORM_CLASS" => "form form_highlighted",
            "THX_TITLE" => "",
            "THX_DESCRIPTION" => "",
            "FORM_ID" => "cart",
            "ADD_PARAMS" => "",
            "CAPTCHA_SITE_KEY" => "",
            "CAPTCHA_SECRET_KEY" => "",
            "POLICY_TEXT" => "",
            "POLICY_LINK_TEXT" => "",
            "POLICY_LINK" => "/upload/Политика конфиденциальности.pdf",
            "THX_URL" => "/thankyoupage/"
        ),
        false
    );*/
}
?>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>