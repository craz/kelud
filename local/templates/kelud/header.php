<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
IncludeTemplateLangFile(__FILE__);

// jb: fucntion detects MS IE < 11
function isAgentDeprecated()
{
    $ua = $_SERVER['HTTP_USER_AGENT'] . '';
    preg_match('/MSIE ([0-9]{1,2})/', $ua, $msie);
    if (count($msie) > 0 && $msie[1] < 11) {
        return TRUE;
    } else {
        preg_match('/Trident\/([0-9]{1,1})/', $ua, $trident);
        if (count($trident) > 0 && $trident[1] < 7) {
            return TRUE;
        }
    }
    return FALSE;
}

if (isAgentDeprecated()): ?>
    <? include("deprecated/header.php"); ?>
<? else: ?>
    <!DOCTYPE html>
    <html>
    <head>
<meta name="yandex-verification" content="ed930b7cb460ea0c"/>
<meta name="google-site-verification" content="rlXIqd43GEksgCjgAr_BDIuABPafVL68h8LojfIO1M4" />
<meta name="yandex-verification" content="bce9f3d835ae1256" />
        <?
        $APPLICATION->ShowMeta("robots", false, true);
        $APPLICATION->ShowMeta("description", false, true);
        $APPLICATION->ShowMeta("keywords", false, true);
$APPLICATION->ShowCSS(true, true);
        if ($USER->IsAdmin()) {

        }
        $APPLICATION->ShowHeadStrings();
        ?>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="yandex-verification" content="f5c54af02f8cdc51" />
        <meta name="yandex-verification" content="ed930b7cb460ea0c">
        <title><? $APPLICATION->ShowTitle(); ?></title>
        <link rel="stylesheet" href="<?= SITE_TEMPLATE_PATH ?>/styles/main.css">
        <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
        <link rel="manifest" href="/manifest.webmanifest">
        <script>if (sessionStorage.fout) {
                document.documentElement.classList.add('fout');
            }</script>
       <!-- <script data-skip-moving="true">
            (function (w, d, u) {
                var s = d.createElement('script');
                s.async = 1;
                s.src = u + '?' + (Date.now() / 60000 | 0);
                var h = d.getElementsByTagName('script')[0];
                h.parentNode.insertBefore(s, h);
            })(window, document, 'https://cdn.bitrix24.ru/b6725741/crm/site_button/loader_1_vr6yxe.js');
        </script> -->

</head>
<body >
    <? if ($USER->IsAuthorized()) {
        ?>

        <div id="panel">
            <? $APPLICATION->ShowPanel(); ?>
        </div>
    <? } ?>
    <header class="header">
        <div class="header__content wrapper">
            <div class="header__item header__item_logo">
                <div class="h-logo">
                    <a class="h-logo__link" href="/">
                        <img class="h-logo__desktop" src="<?= SITE_TEMPLATE_PATH ?>/styles/images/logo.svg" alt="">
                        <img class="h-logo__desktop h-logo__desktop_active"
                             src="<?= SITE_TEMPLATE_PATH ?>/styles/images/logo_active.svg" alt="">
                        <img class="h-logo__mobile" src="<?= SITE_TEMPLATE_PATH ?>/styles/images/logo_mobile.svg"
                             alt="">
                    </a>
                    <div class="h-logo__border"></div>
                </div>

                <div class="header__contacts header__contacts_active h-contacts">
                    <div class="h-contacts__wrapper">
                     						<? /*
                        $phone1 = tplvar('phone_smr', false);
                        $phone1 = str_replace(" ", "", $phone1);
                        $phone1 = str_replace("-", "", $phone1);
                        $phone1 = str_replace("+", "", $phone1);
*/ ?>
						<!-- <a class="h-contacts__phone" href="tel:+<?//= $phone1 ?>"><?//= tplvar('phone_smr', true); ?></a> -->
						<? // $APPLICATION->IncludeComponent("reaspekt:reaspekt.geoip", "main", Array(), false); ?>
            <a class="h-contacts__phone" href="tel:+88005004081">8 800 500-40-81</a>

                    </div>
                    <a class="h-contacts__callback link link_dotted" href="#" data-overlay="#callback">Перезвоните
                        мне</a>
                    <div class="header__mobile-cart">
                        <?$APPLICATION->IncludeComponent(
								"bitrix:sale.basket.basket.line",
								"",
								Array(
									"HIDE_ON_BASKET_PAGES" => "N",
									"PATH_TO_AUTHORIZE" => "",
									"PATH_TO_BASKET" => SITE_DIR."cart/",
									"PATH_TO_ORDER" => SITE_DIR."personal/order/make/",
									"PATH_TO_PERSONAL" => SITE_DIR."personal/",
									"PATH_TO_PROFILE" => SITE_DIR."personal/",
									"PATH_TO_REGISTER" => SITE_DIR."login/",
									"POSITION_FIXED" => "N",
									"SHOW_AUTHOR" => "N",
									"SHOW_EMPTY_VALUES" => "N",
									"SHOW_NUM_PRODUCTS" => "Y",
									"SHOW_PERSONAL_LINK" => "N",
									"SHOW_PRODUCTS" => "N",
									"SHOW_REGISTRATION" => "N",
									"SHOW_TOTAL_PRICE" => "N"
								)
							);?>
                    </div>

                </div>
            </div>

            <div class="header__item header__item_menu">
                <? $APPLICATION->IncludeComponent(
	"bitrix:menu", 
	"top_menu", 
	array(
		"COMPONENT_TEMPLATE" => "top_menu",
		"ROOT_MENU_TYPE" => "top",
		"MENU_CACHE_TYPE" => "A",
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_USE_GROUPS" => "N",
		"MENU_CACHE_GET_VARS" => array(
		),
		"MAX_LEVEL" => "1",
		"CHILD_MENU_TYPE" => "left",
		"USE_EXT" => "N",
		"DELAY" => "N",
		"ALLOW_MULTI_SELECT" => "N"
	),
	false
); ?>

            </div>
            <div class="header__item header__item_links">
                <ul class="h-links">
                    <li class="h-links__item"><a class="link link_no-underline" href="/working-conditions/">Условия
                            работы</a>
                    </li>
					<?/*<li class="h-links__item"><a id="cart" class="button" href="/checkout/">Корзина</a></li>*/?>
						<li class="h-links__item">
							<?$APPLICATION->IncludeComponent(
								"bitrix:sale.basket.basket.line",
								"",
								Array(
									"HIDE_ON_BASKET_PAGES" => "N",
									"PATH_TO_AUTHORIZE" => "",
									"PATH_TO_BASKET" => SITE_DIR."cart/",
									"PATH_TO_ORDER" => SITE_DIR."personal/order/make/",
									"PATH_TO_PERSONAL" => SITE_DIR."personal/",
									"PATH_TO_PROFILE" => SITE_DIR."personal/",
									"PATH_TO_REGISTER" => SITE_DIR."login/",
									"POSITION_FIXED" => "N",
									"SHOW_AUTHOR" => "N",
									"SHOW_EMPTY_VALUES" => "N",
									"SHOW_NUM_PRODUCTS" => "Y",
									"SHOW_PERSONAL_LINK" => "N",
									"SHOW_PRODUCTS" => "N",
									"SHOW_REGISTRATION" => "N",
									"SHOW_TOTAL_PRICE" => "N"
								)
							);?>
						</li>
                </ul>
            </div>
        </div>
    </header>


<div id="barba-wrapper">
    <!-- Main content Start -->

    <div class="content">
    <? if ($APPLICATION->GetCurPage() != "/") { ?>
        <header class="banner  <?= $APPLICATION->ShowProperty("banner_class") ?>"
                data-background-image=<?= $APPLICATION->ShowProperty("section_img") ?>>
            <div class="banner__wrapper wrapper">
                <? $APPLICATION->IncludeComponent("bitrix:breadcrumb", "main", Array(),
                    false
                ); ?>
                <h1 class="banner__title"><?= $APPLICATION->ShowTitle(false) ?></h1>
                <? $APPLICATION->ShowViewContent('section_list'); ?>

                <? $APPLICATION->ShowViewContent('section_descr'); ?>

                <? $APPLICATION->ShowViewContent('button'); ?>
            </div>
        </header>

    <? } ?>

<? endif; ?>