<?
require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');
$APPLICATION->SetPageProperty("keywords", "элитный столы из окаменелого дерева, купить элитную мебель из массива дерева, интернет магазин элитной мебели, столы журнальные официальный сайт");
$APPLICATION->SetPageProperty("description", "В нашем интернет-магазине элитной мебели KELUD Вы сможете купить уникальные столы и предметы интерьера из окаменелого дерева с эксклюзивном дизайном и доставкой по России, Казахстану и Белоруссии.");
$APPLICATION->SetPageProperty("title", "Элитные столы и предметы интерьера из массива окаменелого дерева в салоне KELUD");
$APPLICATION->SetTitle("Элитная мебель из окаменелого дерева");

global $arFilter;
$arFilter = array("SECTION_ID" => array(11, 7));
$APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"constructor", 
	array(
		"COMPONENT_TEMPLATE" => "constructor",
		"IBLOCK_TYPE" => "catalog",
		"IBLOCK_ID" => "12",
		"NEWS_COUNT" => "20",
		"SORT_BY1" => "SORT",
		"SORT_ORDER1" => "ASC",
		"SORT_BY2" => "SORT",
		"SORT_ORDER2" => "ASC",
		"FILTER_NAME" => "",
		"FIELD_CODE" => array(
			0 => "PREVIEW_PICTURE",
			1 => "",
		),
		"PROPERTY_CODE" => array(
			0 => "SUB_ELEMENTS_COORD",
			1 => "SUB_ELEMENTS",
			2 => "",
		),
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"PREVIEW_TRUNCATE_LEN" => "",
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"SET_TITLE" => "Y",
		"SET_BROWSER_TITLE" => "Y",
		"SET_META_KEYWORDS" => "Y",
		"SET_META_DESCRIPTION" => "Y",
		"SET_LAST_MODIFIED" => "N",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
		"ADD_SECTIONS_CHAIN" => "Y",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"INCLUDE_SUBSECTIONS" => "Y",
		"STRICT_SECTION_CHECK" => "N",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
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
); ?><div class="content__block">
	 <!-- TEXT -->
	<div class="c-header wrapper">
		<h1 class="c-header__title">Эксклюзивные столы из окаменелого дерева</h1>
		<div class="c-header__descr">
			 <?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	Array(
		"AREA_FILE_SHOW" => "file",
		"AREA_FILE_SUFFIX" => "inc",
		"EDIT_TEMPLATE" => "",
		"PATH" => "include/index_text_0.php"
	)
);?>
		</div>
	</div>
	 <!-- /TEXT -->
	<div class="catalog catalog_overview">
		 <?
            global $arFilter;
            $arFilter = array("PROPERTY_ON_MAIN_VALUE" => "Да");
            $APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"exlusive", 
	array(
		"COMPONENT_TEMPLATE" => "exlusive",
		"IBLOCK_TYPE" => "catalog",
		"IBLOCK_ID" => "3",
		"NEWS_COUNT" => "200",
		"SORT_BY1" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_BY2" => "SORT",
		"SORT_ORDER2" => "ASC",
		"FILTER_NAME" => "arFilter",
		"FIELD_CODE" => array(
			0 => "",
			1 => "DETAIL_PICTURE",
			2 => "",
		),
		"PROPERTY_CODE" => array(
			0 => "PRICE",
			1 => "",
		),
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "N",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"PREVIEW_TRUNCATE_LEN" => "",
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"SET_TITLE" => "Y",
		"SET_BROWSER_TITLE" => "Y",
		"SET_META_KEYWORDS" => "Y",
		"SET_META_DESCRIPTION" => "Y",
		"SET_LAST_MODIFIED" => "N",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
		"ADD_SECTIONS_CHAIN" => "Y",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"INCLUDE_SUBSECTIONS" => "Y",
		"STRICT_SECTION_CHECK" => "Y",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
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
); ?>
		<div class="catalog__all">
 <a class="button" href="/catalog/">Весь каталог</a>
		</div>
	</div>
</div>
 <!-- TEXT -->
<div class="content__block">
	<div class="c-header">
		<h2 class="c-header__title">Все столы в&nbsp;<u>наличии</u> в&nbsp;России</h2>
		<div class="c-header__descr">
			 <?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	Array(
		"AREA_FILE_SHOW" => "file",
		"AREA_FILE_SUFFIX" => "inc",
		"EDIT_TEMPLATE" => "",
		"PATH" => "include/index_text_1.php"
	)
);?>
		</div>
	</div>
	<div class="russia wrapper">
 <img src="/local/templates/kelud/styles/images/russia_map.svg" class="russia__map" alt=""> <img src="/local/templates/kelud/styles/images/russia_points.svg" class="russia__points" alt="">
		<div class="russia__content">
			<h3 class="russia__title">Доставим куда угодно</h3>
			<div class="russia__descr">
 <a class="link" href="/working-conditions/deliver/">Доставка</a> работает по&nbsp;всей России,<br>
				 а&nbsp;также за&nbsp;её&nbsp;пределами
			</div>
		</div>
	</div>
</div>
 <!-- /TEXT -->
<div class="content__text">
	<div class="wrapper">
		<h3>Элитная мебель из окаменелого дерева</h3>
		<p>
			 Обстановка в доме влияет на комфорт и настроение владельцев. Если вы хотите наполнить дом теплом и природной энергетикой, мы предлагаем купить стол из окаменелого дерева. Порадуйте себя красивой, функциональной мебелью из уникальной породы.
		</p>
		<h3>Преимущества мебели на заказ от Kelud</h3>
		<p>
			 Главное достоинство элитных обеденных столов из массива дерева — неповторимость. Создатели материала — природа и вулканический пепел. Процесс добычи и последующей обработки древесины ­– трудоемкий, поэтому готовая продукция не может стоить дешево. Изделия из окаменелого дерева не теряют актуальности, что объясняется свойствами материала.
		</p>
		<p>
			 К ним относится:
		</p>
		<ul>
			<li>хорошая устойчивость;</li>
			<li>возможность воплощения самых смелых фантазий;</li>
			<li>срок эксплуатации не менее десяти лет;</li>
			<li>внешняя привлекательность.</li>
		</ul>
		<p>
			 Купить журнальный стол в интернет-магазине Kelud можно любой формы. Вы может выбрать тип подстолья, степень обработки деревянного массива и вид столешницы (мозаика, однотонный). Мастера, подобрав подходящую разновидность камня, предварительно отправят заказ на согласование с клиентом.
		</p>
		<h3>Свойства материала</h3>
		<p>
			 Предметы мебели из окаменелого дерева, благодаря эксклюзивному дизайну, станут украшением загородного дома или квартиры.
		</p>
		<p>
			 В чем особенности:
		</p>
		<ul>
			<li>Неповторимый природный рисунок каждого элитного стола из окаменелого дерева.</li>
			<li>Прочность, устойчивость к механическим повреждениям, ударам.</li>
			<li>Зеркальный блеск долгое время при соблюдении правил ухода.</li>
		</ul>
		<p>
			 В нашем интернет-магазине элитная мебель представлена разными изделиями, но наибольшей популярностью пользуются столики для организации зоны приема пищи или отдыха.
		</p>
		<p>
			 Материал обладает высокими эксплуатационными качествами. Купить элитный обеденный стол из массива дерева и установить в собственном доме считается признаком хорошего вкуса. Такое приобретение подчеркнет статус владельца.
		</p>
		<p>
 <b>Фабричные журнальные столы</b> не принесут особой энергетики. В то время как элитные деревянные изделия благотворно повлияют на настроение хозяев дома, зарядят жизненными силами и подарят вдохновение.
		</p>
		<h3>Выгодные покупки в Kelud</h3>
		<p>
			 Официальный сайт Kelud предлагает большой выбор журнальных столиков, обеденных, кофейных из окаменелой породы собственного производства. Продукция сертифицирована, соответствует ГОСТ, экологически безопасна.
		</p>
<meta name="cmsmagazine" content="bc3883fb5813de3946782cb1bd4bac94" /> 
	</div>
</div>
 <br><?
require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php');
?>