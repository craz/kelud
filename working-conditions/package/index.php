<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetPageProperty("TITLE", "Упаковка товара");
$APPLICATION->SetPageProperty("description", "Бесплатная и надежная упаковка Вашего заказа в магазине элитной мебели KELUD.");
$APPLICATION->SetTitle("Товар в упаковке");
$APPLICATION->SetPageProperty("link_class", "link_inverted");
$APPLICATION->SetPageProperty("banner_class", "lozad");
?>
<? $APPLICATION->IncludeComponent("bitrix:menu", "top_under", Array(
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
<? $APPLICATION->IncludeComponent("bitrix:main.include", "main", Array(
    "AREA_FILE_SHOW" => "file",    // Показывать включаемую область
    "EDIT_TEMPLATE" => "",    // Шаблон области по умолчанию
    "COMPONENT_TEMPLATE" => ".default",
    "PATH" => "include/file_1.php",    // Путь к файлу области
),
    false
); ?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>