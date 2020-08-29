<?
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
    die();
if (isAgentDeprecated()):?>
    <? include("deprecated/footer.php"); ?>
<? else:
    ?>
    </div>
    </div>

    <footer class="footer">
        <div class="footer__item wrapper wrapper_small">
            <div class="footer__contacts f-contacts">
                <h4 class="f-contacts__title"><a class="link" href="/contacts/">Контакты</a></h4>
				<? /*
                $phone1 = tplvar('phone_smr', false);
                $phone1 = str_replace(" ", "", $phone1);
                $phone1 = str_replace("-", "", $phone1);
                $phone1 = str_replace("+", "", $phone1);
*/ ?>
				<!--<a class="link link_no-underline" href="tel:+<? /*= $phone1 */?>"><?/*= tplvar('phone_smr', true); */?></a><br>-->
                <a class="link link_no-underline" href="tel:+88005004081">8 800 500-40-81</a><br><br>
                <a class="link link_no-underline" href="mailto:sale@kelud.ru">sale@kelud.ru</a><br>
                <div class="f-contacts__item">
                    Центральный офис:
					<address class="f-contacts__address"><?/*= tplvar('address_smr', true); */?>
                    г. Самара ул 22 Партсъезда 7А к1  
                    </address>
                </div>
                <div class="f-contacts__item">
                    Мы&nbsp;в&nbsp;социальных сетях:
                    <ul class="f-contacts__social f-social">
                        <li class="f-social__item">
                            <a class="f-social__link" href="//instagram.com/kelud_wood " rel="nofollow">
                                <svg class="f-social__icon">
                                    <use href="<?= SITE_TEMPLATE_PATH ?>/styles/icons.svg#instagram"/>
                                </svg>
                            </a>
                        </li>
                        <li class="f-social__item">
                            <a class="f-social__link" href="//wa.me/79276533764" rel="nofollow">
                                <svg class="f-social__icon">
                                    <use href="<?= SITE_TEMPLATE_PATH ?>/styles/icons.svg#whatsapp"/>
                                </svg>
                            </a>
                        </li>
                        <li class="f-social__item">
                            <a class="f-social__link" href="viber://pa/info?uri=79276533764" rel="nofollow">
                                <svg class="f-social__icon">
                                    <use href="<?= SITE_TEMPLATE_PATH ?>/styles/icons.svg#viber"/>
                                </svg>
                            </a>
                        </li>
                        <li class="f-social__item">
                            <a class="f-social__link" href="//t.me/79276533764" rel="nofollow">
                                <svg class="f-social__icon">
                                    <use href="<?= SITE_TEMPLATE_PATH ?>/styles/icons.svg#telegram"/>
                                </svg>
                            </a>
                        </li>
                        <!--<li class="f-social__item">
                        <a class="f-social__link" href="#" rel="nofollow">
                            <svg class="f-social__icon">
                                <use href="<?= SITE_TEMPLATE_PATH ?>/styles/icons.svg#facebook"/>
                            </svg>
                        </a>
                    </li> -->
                        <!-- <li class="f-social__item">
                        <a class="f-social__link" href="#" rel="nofollow">
                            <svg class="f-social__icon"><use href="<?= SITE_TEMPLATE_PATH ?>/styles/icons.svg#vk" /></svg>
                        </a>
                    </li> -->
                        <li class="f-social__item">
                            <a class="f-social__link" href="//www.youtube.com/channel/UC6YgI0Q8YDbgNg_xsFrCFaQ"
                               rel="nofollow">
                                <svg class="f-social__icon">
                                    <use href="<?= SITE_TEMPLATE_PATH ?>/styles/icons.svg#youtube"/>
                                </svg>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <ul class="footer__menu f-menu">
                <? $APPLICATION->IncludeComponent(
                    "bitrix:menu",
                    "bottom_menu",
                    array(
                        "COMPONENT_TEMPLATE" => "bottom_menu",
                        "ROOT_MENU_TYPE" => "bottom_1",
                        "MENU_CACHE_TYPE" => "N",
                        "MENU_CACHE_TIME" => "3600",
                        "MENU_CACHE_USE_GROUPS" => "Y",
                        "MENU_CACHE_GET_VARS" => array(),
                        "MAX_LEVEL" => "1",
                        "CHILD_MENU_TYPE" => "left",
                        "USE_EXT" => "Y",
                        "DELAY" => "N",
                        "ALLOW_MULTI_SELECT" => "N"
                    ),
                    false
                ); ?>
                <? $APPLICATION->IncludeComponent(
                    "bitrix:menu",
                    "bottom_menu",
                    array(
                        "COMPONENT_TEMPLATE" => "bottom_menu",
                        "ROOT_MENU_TYPE" => "bottom_2",
                        "MENU_CACHE_TYPE" => "N",
                        "MENU_CACHE_TIME" => "3600",
                        "MENU_CACHE_USE_GROUPS" => "Y",
                        "MENU_CACHE_GET_VARS" => array(),
                        "MAX_LEVEL" => "1",
                        "CHILD_MENU_TYPE" => "left",
                        "USE_EXT" => "N",
                        "DELAY" => "N",
                        "ALLOW_MULTI_SELECT" => "N"
                    ),
                    false
                ); ?>
                <? /*$APPLICATION->IncludeComponent(
                "bitrix:menu",
                "bottom_menu",
                array(
                    "COMPONENT_TEMPLATE" => "bottom_menu",
                    "ROOT_MENU_TYPE" => "bottom_3",
                    "MENU_CACHE_TYPE" => "N",
                    "MENU_CACHE_TIME" => "3600",
                    "MENU_CACHE_USE_GROUPS" => "Y",
                    "MENU_CACHE_GET_VARS" => array(),
                    "MAX_LEVEL" => "1",
                    "CHILD_MENU_TYPE" => "left",
                    "USE_EXT" => "N",
                    "DELAY" => "N",
                    "ALLOW_MULTI_SELECT" => "N"
                ),
                false
            ); */ ?>
                <? $APPLICATION->IncludeComponent(
                    "bitrix:menu",
                    "bottom_menu",
                    array(
                        "COMPONENT_TEMPLATE" => "bottom_menu",
                        "ROOT_MENU_TYPE" => "bottom_4",
                        "MENU_CACHE_TYPE" => "N",
                        "MENU_CACHE_TIME" => "3600",
                        "MENU_CACHE_USE_GROUPS" => "Y",
                        "MENU_CACHE_GET_VARS" => array(),
                        "MAX_LEVEL" => "1",
                        "CHILD_MENU_TYPE" => "left",
                        "USE_EXT" => "N",
                        "DELAY" => "N",
                        "ALLOW_MULTI_SELECT" => "N"
                    ),
                    false
                ); ?>
                <? $APPLICATION->IncludeComponent(
                    "bitrix:menu",
                    "bottom_menu",
                    array(
                        "COMPONENT_TEMPLATE" => "bottom_menu",
                        "ROOT_MENU_TYPE" => "bottom_5",
                        "MENU_CACHE_TYPE" => "N",
                        "MENU_CACHE_TIME" => "3600",
                        "MENU_CACHE_USE_GROUPS" => "Y",
                        "MENU_CACHE_GET_VARS" => array(),
                        "MAX_LEVEL" => "1",
                        "CHILD_MENU_TYPE" => "left",
                        "USE_EXT" => "Y",
                        "DELAY" => "N",
                        "ALLOW_MULTI_SELECT" => "N"
                    ),
                    false
                ); ?>
                <? $APPLICATION->IncludeComponent(
                    "bitrix:menu",
                    "bottom_menu",
                    array(
                        "COMPONENT_TEMPLATE" => "bottom_menu",
                        "ROOT_MENU_TYPE" => "bottom_6",
                        "MENU_CACHE_TYPE" => "N",
                        "MENU_CACHE_TIME" => "3600",
                        "MENU_CACHE_USE_GROUPS" => "Y",
                        "MENU_CACHE_GET_VARS" => array(),
                        "MAX_LEVEL" => "1",
                        "CHILD_MENU_TYPE" => "left",
                        "USE_EXT" => "N",
                        "DELAY" => "N",
                        "ALLOW_MULTI_SELECT" => "N"
                    ),
                    false
                ); ?>

            </ul>
        </div>
        <div class="footer__item wrapper wrapper_small">
            <div class="footer__legal">
                <? $APPLICATION->IncludeComponent(
                    "bitrix:main.include",
                    "",
                    Array(
                        "AREA_FILE_SHOW" => "file",
                        "AREA_FILE_SUFFIX" => "inc",
                        "EDIT_TEMPLATE" => "",
                        "PATH" => "/include/footer_0.php"
                    )
                ); ?>
            </div>

            <div class="footer__parus">Сделано с&nbsp;любовью в&nbsp;<a class="link" href="//ra-parus.ru/"
                                                                        rel="nofollow"
                                                                        target="_blank">PARUS AGENCY</a></div>
    </footer>

    <? $APPLICATION->IncludeComponent(
	"parus:simple_form", 
	"callback", 
	array(
		"COMPONENT_TEMPLATE" => "callback",
		"FORM_HIDDEN" => "N",
		"FORM" => "1",
		"FORM_CLASS" => "form_highlighted form form_vertical",
		"THX_TITLE" => "",
		"THX_DESCRIPTION" => "",
		"FORM_ID" => "callback",
		"ADD_PARAMS" => "",
		"CAPTCHA_SITE_KEY" => "",
		"CAPTCHA_SECRET_KEY" => "",
		"POLICY_TEXT" => "",
		"POLICY_LINK_TEXT" => "",
		"POLICY_LINK" => "/upload/Политика конфиденциальности.pdf",
		"THX_URL" => "/thankyoupage/",
		"YA_COUNT" => "53576923",
		"YA_COUNT_GOAL" => "call",
		"GL_COUNT_GOAL" => ""
	),
	false
); ?>

    <? $APPLICATION->IncludeComponent(
    "parus:simple_form",
    "mainpage",
    array(
        "COMPONENT_TEMPLATE" => "mainpage",
        "YA_COUNT" => "53576923",
        "YA_COUNT_GOAL" => "order",
        "GL_COUNT_GOAL" => "order_table",
        "FORM_HIDDEN" => "N",
        "FORM" => "5",
        "FORM_CLASS" => "form form_highlighted",
        "THX_TITLE" => "",
        "THX_DESCRIPTION" => "",
        "FORM_ID" => "mainpage",
        "ADD_PARAMS" => "",
        "CAPTCHA_SITE_KEY" => "",
        "CAPTCHA_SECRET_KEY" => "",
        "POLICY_TEXT" => "",
        "POLICY_LINK_TEXT" => "",
        "POLICY_LINK" => "/upload/Политика конфиденциальности.pdf",
        "THX_URL" => "/thankyoupage/"
    ),
    false
); ?>


    <template id="fullscreen">
        <div class="overlay" hidden>
            <div class="overlay__wrapper">
                <button class="overlay__close">
                    <svg>
                        <use href="<?= SITE_TEMPLATE_PATH ?>/styles/icons.svg#outline-close"/>
                    </svg>
                </button>
                <div class="overlay__content overlay__content_full wrapper">
                    <img class="overlay__image" src="<?= SITE_TEMPLATE_PATH ?>/images/catalog-detailed__1.jpg" alt="">
                </div>
            </div>
        </div>
    </template>

    <!--<template id="city">-->
    <!--    <ul class="city-selector">-->
    <!--        <li class="city-selector__item"><a class="link" href="#">Москва</a></li>-->
    <!--        <li class="city-selector__item"><a class="link" href="#">Нижний Новгород</a></li>-->
    <!--        <li class="city-selector__item"><a class="link" href="#">Санкт-Петербург</a></li>-->
    <!--    </ul>-->
    <!--</template>-->

    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="//api-maps.yandex.ru/2.1/?lang=ru_RU"></script>
	<script src="<?=SITE_TEMPLATE_PATH?>/scripts/url.min.js"></script>
    <script src="<?=SITE_TEMPLATE_PATH?>/scripts/main.js"></script>
    <script src="<?=SITE_TEMPLATE_PATH?>/scripts/custom.js"></script>
    <script src="/local/templates/kelud/scripts/scripts.js"></script>

<!-- modals -->


<?
    global $APPLICATION;
?>


   <? /*
if($_COOKIE['LONG'] !== 'Y'){ */?>
 <!-- <script>
        $(document).ready(function() {
            setTimeout(function () {
                long_modal();
            }, 15000);
        });
    </script>-->
		<?/*}*/?>

    <?/*if($_COOKIE['PROD'] !== 'Y'){*/?>
    <script>
        function show_long_modal(){
            $('.lng_modal').css('display','block');
            $('.bg_long').css('display','block');
            $('.button_long').css('display','none');
            var lg_h = $('.long_cnt').height() - 5;
            $('.lng_modal').css('height',lg_h+'px');
        }
    </script>
    <?/*}*/?>
    <div class="button_long"  <?/*if($_COOKIE['LONG'] == 'Y'){ */?> style="display: inline-block;"<?/*}else{*/?> style="display: none;"<?/*}*/?>>
        <div class="long_btn_txt">
            Подобрать стол <!-- long_modal_cook = <?/*if($_COOKIE['LONG'] == 'Y'){/*?> Y<?/*}else{*/?>N <?/*}*/?>-->
        </div>
    </div>
    <div class="popup_modal lng_modal" style="display: none;">
        <div class="pb_body_2">
            <div class="pb_closer_lng">
                <span class="closer_popup"></span>
            </div>
            <div class="long_cnt">
		<?$APPLICATION->IncludeComponent(
                    "bitrix:main.include",
                    "",
                    Array(
                        "AREA_FILE_SHOW" => "file",
                        "AREA_FILE_SUFFIX" => "inc",
                        "EDIT_TEMPLATE" => "",
                        "PATH" => "/include/modal_long.php"
                    )
                );?>
           </div>
        </div>
    </div>
    <div class="popup_bg bg_long"></div>
<!-- modals -->


<!-- exit ck -->
<!--<input type="hidden" id="ck_check" value="0">
    <script>

        $(document).ready(function () {
            function getCookie(name) {
                var matches = document.cookie.match(new RegExp(
                    "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
                ));
                return matches ? decodeURIComponent(matches[1]) : undefined;
            }
            // проверяем, есть ли у нас cookie, с которой мы не показываем окно и если нет, запускаем показ
            var alertwin = getCookie("alertwin");
                if (alertwin != "no") {
                    $(document).mouseleave(function(e){
                        if (e.clientY < 0) {

                            var chk = Number($('#ck_check').val());
                            if(chk === 0){
                            show_long_modal();
                            }
                            $('#ck_check').val(chk+1);
                            console.log(chk);
                            // записываем cookie на 1 день, с которой мы не показываем окно
                            var date = new Date;
                            date.setDate(date.getDate() + 1);
                            document.cookie = "alertwin=no; path=/; expires=" + date.toUTCString();
                        }
                    });
                }
        });
    </script>-->

<!-- exit ck -->
<!--<input type="hidden" id="ck_check" value="0">
    <script>

        $(document).ready(function () {
            function getCookie(name) {
                var matches = document.cookie.match(new RegExp(
                    "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
                ));
                return matches ? decodeURIComponent(matches[1]) : undefined;
            }
            // проверяем, есть ли у нас cookie, с которой мы не показываем окно и если нет, запускаем показ
            var alertwin = getCookie("alertwin");


                if (alertwin != "no") {
                    $(document).mouseleave(function(e){
                        if (e.clientY < 0) {

                            var chk = Number($('#ck_check').val());
                            if(chk === 0){
                            show_long_modal();
                            }
                            $('#ck_check').val(chk+1);
                            console.log(chk);
                            // записываем cookie на 1 день, с которой мы не показываем окно
                            var date = new Date;
                            date.setDate(date.getDate() + 1);
                            document.cookie = "alertwin=no; path=/; expires=" + date.toUTCString();
                        }
                    });
                }
        });
    </script>-->


<script type="text/javascript">!function(){var t=document.createElement("script");t.type="text/javascript",t.async=!0,t.src="https://vk.com/js/api/openapi.js?166",t.onl oad=function(){VK.Retargeting.Init("VK-RTRG-449591-3Fe7B"),VK.Retargeting.Hit()},document.head.appendChild(t)}();</script><noscript><img src="https://vk.com/rtrg?p=VK-RTRG-449591-3Fe7B" style="position:fixed; left:-999px;" alt=""/></noscript>

<!-- exit ck -->
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-125729779-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-125729779-1');
</script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-128071515-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-128071515-1');
</script>
<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(53576923, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true
   });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/53576923" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
<link rel="stylesheet" href="https://cdn.envybox.io/widget/cbk.css">
<script type="text/javascript" src="https://cdn.envybox.io/widget/cbk.js?wcb_code=3e91c0427ea84b3218f0f3543de75523" charset="UTF-8" async></script>
    </body>
    </html>
<? endif; ?>