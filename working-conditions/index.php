<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "Подробное описание процесса заказа товара в магазине элитной мебели KELUD.");
$APPLICATION->SetPageProperty("title", "Как заказать товар на сайте");
$APPLICATION->SetTitle(" Как заказать столы из окаменелого дерева? Условия работы");
$APPLICATION->SetPageProperty("link_class", "link_inverted");
$APPLICATION->SetPageProperty("banner_class", "lozad");
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

    <div class="content__block content__block_indentless wrapper wrapper_small">
 <article class="article">
	<div class="content__text">
		 <?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	".default",
	Array(
		"AREA_FILE_SHOW" => "file",
		"COMPONENT_TEMPLATE" => ".default",
		"EDIT_TEMPLATE" => "",
		"PATH" => "include/file_1.php"
	)
);?>
	</div>
	<!--<div class="payment-methods">
		<h3 class="payment-methods__title"><a href="#" class="link">Оплата заказа</a></h3>
		<div class="payment-methods__subtitle">
			<br>
		</div>
        <div class="payment-methods__items">
            <div class="payment-methods__item">
                <svg class="payment-methods__icon"><use href="<?=SITE_TEMPLATE_PATH?>/styles/icons.svg#file"></use></svg>
                Безналичным платежом по&nbsp;выставленному счету
            </div>
            <div class="payment-methods__item">
                <svg class="payment-methods__icon"><use href="<?=SITE_TEMPLATE_PATH?>/styles/icons.svg#credit-card"></use></svg>
                Банковской картой на&nbsp;сайте
            </div>
            <div class="payment-methods__item">
                <svg class="payment-methods__icon"><use href="<?=SITE_TEMPLATE_PATH?>/styles/icons.svg#money"></use></svg>
                Наличными в&nbsp;офисе компании или при получении
            </div>
        </div>
	</div>-->
	<div class="content__text">
		 <?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	".default",
	Array(
		"AREA_FILE_SHOW" => "file",
		"COMPONENT_TEMPLATE" => ".default",
		"EDIT_TEMPLATE" => "",
		"PATH" => "include/file_2.php"
	)
);?>
	</div>
 </article>
</div><? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>