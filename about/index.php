<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "Информация о компания KELUD — одном из самых крупных производителей мебели из окаменелого дерева в России.");
$APPLICATION->SetPageProperty("title", "О компании KELUD");
$APPLICATION->SetPageProperty("link_class", "link_inverted");
$APPLICATION->SetPageProperty("banner_class", "lozad");
$APPLICATION->SetTitle("О компании");
?><? $APPLICATION->IncludeComponent("bitrix:menu", "top_under", Array(
    "ALLOW_MULTI_SELECT" => "N",    // Разрешить несколько активных пунктов одновременно
    "CHILD_MENU_TYPE" => "left",    // Тип меню для остальных уровней
    "DELAY" => "N",    // Откладывать выполнение шаблона меню
    "MAX_LEVEL" => "1",    // Уровень вложенности меню
    "MENU_CACHE_GET_VARS" => array(    // Значимые переменные запроса
        0 => "",
    ),
    "MENU_CACHE_TIME" => "3600",    // Время кеширования (сек.)
    "MENU_CACHE_TYPE" => "N",    // Тип кеширования
    "MENU_CACHE_USE_GROUPS" => "Y",    // Учитывать права доступа
    "ROOT_MENU_TYPE" => "top_under",    // Тип меню для первого уровня
    "USE_EXT" => "N",    // Подключать файлы с именами вида .тип_меню.menu_ext.php
),
    false
); ?>
<div class="content__block content__block_indentless wrapper">
    <div class="about">
        <div class="about__content">
            <div class="content__text">
                <!-- TEXT -->
                    <? $APPLICATION->IncludeComponent(
                        "bitrix:main.include",
                        "",
                        Array(
                            "AREA_FILE_SHOW" => "file",
                            "AREA_FILE_SUFFIX" => "inc",
                            "EDIT_TEMPLATE" => "",
                            "PATH" => "include/file_0.php"
                        )
                    ); ?>
                <!-- /TEXT -->
            </div>
            <a class="content__video video" href="https://youtu.be/Hiwz2mHDixs" data-fancybox=""> <img src="null"
                                                                                                 class="video__preview lozad"
                                                                                                 data-src="//img.youtube.com/vi/owevZsccPuU/maxresdefault.jpg"
                                                                                                 alt="">
                <div class="video__wrapper">
                    <svg class="video__play">
                        <use href="<?= SITE_TEMPLATE_PATH ?>/styles/icons.svg#outline-play_circle"></use>
                    </svg>
                </div>
            </a>
        </div>
    </div>
</div>
<div class="content__block">
    <div class="parallax">
        <div class="parallax__content wrapper">
            <h2 class="content__title">  <? $APPLICATION->IncludeComponent(
                    "bitrix:main.include",
                    "",
                    Array(
                        "AREA_FILE_SHOW" => "file",
                        "AREA_FILE_SUFFIX" => "inc",
                        "EDIT_TEMPLATE" => "",
                        "PATH" => "include/file_title_2.php"
                    )
                ); ?></h2>
            <div class="content__text">
                <p>
                    <? $APPLICATION->IncludeComponent(
                        "bitrix:main.include",
                        "",
                        Array(
                            "AREA_FILE_SHOW" => "file",
                            "AREA_FILE_SUFFIX" => "inc",
                            "EDIT_TEMPLATE" => "",
                            "PATH" => "include/file_2.php"
                        )
                    ); ?>
                </p>
            </div>
        </div>
        <div class="parallax__items">
            <img src="/local/templates/kelud/images/category_1.jpg" class="parallax__item lozad"
                 data-src="/local/templates/kelud/images/category_1.jpg" alt="" data-force="75"> <img
                    src="/local/templates/kelud/images/category_2.jpg" class="parallax__item lozad"
                    data-src="/local/templates/kelud/images/category_2.jpg" alt="" data-force="25"> <img
                    src="/local/templates/kelud/images/category_3.jpg" class="parallax__item lozad"
                    data-src="/local/templates/kelud/images/category_3.jpg" alt="" data-force="50"> <img
                    src="/local/templates/kelud/images/category_4.jpg" class="parallax__item lozad"
                    data-src="/local/templates/kelud/images/category_4.jpg" alt="" data-force="50"> <img
                    src="/local/templates/kelud/images/category_5.jpg" class="parallax__item lozad"
                    data-src="/local/templates/kelud/images/category_5.jpg" alt="" data-force="75"> <img
                    src="/local/templates/kelud/images/category_6.jpg" class="parallax__item lozad"
                    data-src="/local/templates/kelud/images/category_6.jpg" alt="" data-force="75"> <img
                    src="/local/templates/kelud/images/category_7.jpg" class="parallax__item lozad"
                    data-src="/local/templates/kelud/images/category_7.jpg" alt="" data-force="25"> <img
                    src="/local/templates/kelud/images/category_1.jpg" class="parallax__item lozad"
                    data-src="/local/templates/kelud/images/category_1.jpg" alt="" data-force="50"> <img
                    src="/local/templates/kelud/images/category_2.jpg" class="parallax__item lozad"
                    data-src="/local/templates/kelud/images/category_2.jpg" alt="" data-force="75"> <img
                    src="/local/templates/kelud/images/category_3.jpg" class="parallax__item lozad"
                    data-src="/local/templates/kelud/images/category_3.jpg" alt="" data-force="25"> <img
                    src="/local/templates/kelud/images/category_4.jpg" class="parallax__item lozad"
                    data-src="/local/templates/kelud/images/category_4.jpg" alt="" data-force="50">
        </div>
    </div>
</div>
<div class="content__block wrapper">
    <div class="about about_individual">
        <div class="about__content">
            <h2 class="content__title"><? $APPLICATION->IncludeComponent(
                    "bitrix:main.include",
                    "",
                    Array(
                        "AREA_FILE_SHOW" => "file",
                        "AREA_FILE_SUFFIX" => "inc",
                        "EDIT_TEMPLATE" => "",
                        "PATH" => "include/file_title_3.php"
                    )
                ); ?></h2>
            <div class="content__text">
                <p><? $APPLICATION->IncludeComponent(
                        "bitrix:main.include",
                        "",
                        Array(
                            "AREA_FILE_SHOW" => "file",
                            "AREA_FILE_SUFFIX" => "inc",
                            "EDIT_TEMPLATE" => "",
                            "PATH" => "include/file_3.php"
                        )
                    ); ?>
                </p>
            </div>
        </div>
        <img src="/local/templates/kelud/styles/images/individual.jpg" class="lozad"
             data-src="/local/templates/kelud/styles/images/individual.jpg" alt="">
    </div>
</div>
<div class="content__block wrapper">
    <div class="about">
        <div class="about__content">
            <h2 class="content__title"><? $APPLICATION->IncludeComponent(
                    "bitrix:main.include",
                    "",
                    Array(
                        "AREA_FILE_SHOW" => "file",
                        "AREA_FILE_SUFFIX" => "inc",
                        "EDIT_TEMPLATE" => "",
                        "PATH" => "include/file_title_4.php"
                    )
                ); ?></h2>
            <div class="content__text">
                <? $APPLICATION->IncludeComponent(
                    "bitrix:main.include",
                    "",
                    Array(
                        "AREA_FILE_SHOW" => "file",
                        "AREA_FILE_SUFFIX" => "inc",
                        "EDIT_TEMPLATE" => "",
                        "PATH" => "include/file_4.php"
                    )
                ); ?>
            </div>
        </div>
    </div>
</div>
<div class="banner lozad" data-background-image="<?= SITE_TEMPLATE_PATH ?>/images/banner_3.jpg" data-loaded="true"
     style="background-image: url(&quot;<?= SITE_TEMPLATE_PATH ?>/images/banner_3.jpg&quot;);">
    <div class="banner__wrapper wrapper">
        <div class="banner__descr">
            <p>
                <? $APPLICATION->IncludeComponent(
                    "bitrix:main.include",
                    "",
                    Array(
                        "AREA_FILE_SHOW" => "file",
                        "AREA_FILE_SUFFIX" => "inc",
                        "EDIT_TEMPLATE" => "",
                        "PATH" => "include/file_5.php"
                    )
                ); ?>
            </p>
        </div>
    </div>
</div>
<div class="content__block wrapper">
    <div class="about">
        <div class="about__content">
            <h2 class="content__title"> <? $APPLICATION->IncludeComponent(
                    "bitrix:main.include",
                    "",
                    Array(
                        "AREA_FILE_SHOW" => "file",
                        "AREA_FILE_SUFFIX" => "inc",
                        "EDIT_TEMPLATE" => "",
                        "PATH" => "include/file_title_6.php"
                    )
                ); ?></h2>
            <div class="content__text">
                <? $APPLICATION->IncludeComponent(
                    "bitrix:main.include",
                    "",
                    Array(
                        "AREA_FILE_SHOW" => "file",
                        "AREA_FILE_SUFFIX" => "inc",
                        "EDIT_TEMPLATE" => "",
                        "PATH" => "include/file_6.php"
                    )
                ); ?>
            </div>
        </div>
    </div>
</div>
<? /*$APPLICATION->IncludeComponent("bitrix:main.include", "main", Array(
    "AREA_FILE_SHOW" => "file",    // Показывать включаемую область
    "EDIT_TEMPLATE" => "",    // Шаблон области по умолчанию
    "COMPONENT_TEMPLATE" => ".default",
    "PATH" => "include/file_1.php",    // Путь к файлу области
),
    false
); */ ?><? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>