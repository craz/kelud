<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use \Bitrix\Main\Localization\Loc;

/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 * @var CatalogSectionComponent $component
 * @var CBitrixComponentTemplate $this
 * @var string $templateName
 * @var string $componentPath
 * @var string $templateFolder
 */

$this->setFrameMode(true);

// For SKU
$templateLibrary = array('popup', 'fx');
$currencyList = '';

if (!empty($arResult['CURRENCIES']))
{
	$templateLibrary[] = 'currency';
	$currencyList = CUtil::PhpToJSObject($arResult['CURRENCIES'], false, true, true);
}

$templateData = array(
	'TEMPLATE_THEME' => $arParams['TEMPLATE_THEME'],
	'TEMPLATE_LIBRARY' => $templateLibrary,
	'CURRENCIES' => $currencyList,
	'ITEM' => array(
		'ID' => $arResult['ID'],
		'IBLOCK_ID' => $arResult['IBLOCK_ID'],
		'OFFERS_SELECTED' => $arResult['OFFERS_SELECTED'],
		'JS_OFFERS' => $arResult['JS_OFFERS']
	)
);
unset($currencyList, $templateLibrary);

$mainId = $this->GetEditAreaId($arResult['ID']);
$itemIds = array(
	'ID' => $mainId,
	'DISCOUNT_PERCENT_ID' => $mainId.'_dsc_pict',
	'STICKER_ID' => $mainId.'_sticker',
	'BIG_SLIDER_ID' => $mainId.'_big_slider',
	'BIG_IMG_CONT_ID' => $mainId.'_bigimg_cont',
	'SLIDER_CONT_ID' => $mainId.'_slider_cont',
	'OLD_PRICE_ID' => $mainId.'_old_price',
	'PRICE_ID' => $mainId.'_price',
	'DISCOUNT_PRICE_ID' => $mainId.'_price_discount',
	'PRICE_TOTAL' => $mainId.'_price_total',
	'SLIDER_CONT_OF_ID' => $mainId.'_slider_cont_',
	'QUANTITY_ID' => $mainId.'_quantity',
	'QUANTITY_DOWN_ID' => $mainId.'_quant_down',
	'QUANTITY_UP_ID' => $mainId.'_quant_up',
	'QUANTITY_MEASURE' => $mainId.'_quant_measure',
	'QUANTITY_LIMIT' => $mainId.'_quant_limit',
	'BUY_LINK' => $mainId.'_buy_link',
	'ADD_BASKET_LINK' => $mainId.'_add_basket_link',
	'BASKET_ACTIONS_ID' => $mainId.'_basket_actions',
	'NOT_AVAILABLE_MESS' => $mainId.'_not_avail',
	'COMPARE_LINK' => $mainId.'_compare_link',
	'TREE_ID' => $mainId.'_skudiv',
	'DISPLAY_PROP_DIV' => $mainId.'_sku_prop',
	'DISPLAY_MAIN_PROP_DIV' => $mainId.'_main_sku_prop',
	'OFFER_GROUP' => $mainId.'_set_group_',
	'BASKET_PROP_DIV' => $mainId.'_basket_prop',
	'SUBSCRIBE_LINK' => $mainId.'_subscribe',
	'TABS_ID' => $mainId.'_tabs',
	'TAB_CONTAINERS_ID' => $mainId.'_tab_containers',
	'SMALL_CARD_PANEL_ID' => $mainId.'_small_card_panel',
	'TABS_PANEL_ID' => $mainId.'_tabs_panel'
);
$obName = $templateData['JS_OBJ'] = 'ob'.preg_replace('/[^a-zA-Z0-9_]/', 'x', $mainId);
$name = !empty($arResult['IPROPERTY_VALUES']['ELEMENT_PAGE_TITLE'])
	? $arResult['IPROPERTY_VALUES']['ELEMENT_PAGE_TITLE']
	: $arResult['NAME'];
$title = !empty($arResult['IPROPERTY_VALUES']['ELEMENT_DETAIL_PICTURE_FILE_TITLE'])
	? $arResult['IPROPERTY_VALUES']['ELEMENT_DETAIL_PICTURE_FILE_TITLE']
	: $arResult['NAME'];
$alt = !empty($arResult['IPROPERTY_VALUES']['ELEMENT_DETAIL_PICTURE_FILE_ALT'])
	? $arResult['IPROPERTY_VALUES']['ELEMENT_DETAIL_PICTURE_FILE_ALT']
	: $arResult['NAME'];

$haveOffers = !empty($arResult['OFFERS']);
if ($haveOffers)
{
	$actualItem = isset($arResult['OFFERS'][$arResult['OFFERS_SELECTED']])
		? $arResult['OFFERS'][$arResult['OFFERS_SELECTED']]
		: reset($arResult['OFFERS']);
	$showSliderControls = false;

	foreach ($arResult['OFFERS'] as $offer)
	{
		if ($offer['MORE_PHOTO_COUNT'] > 1)
		{
			$showSliderControls = true;
			break;
		}
	}
}
else
{
	$actualItem = $arResult;
	$showSliderControls = $arResult['MORE_PHOTO_COUNT'] > 1;
}

$skuProps = array();
$price = $actualItem['ITEM_PRICES'][$actualItem['ITEM_PRICE_SELECTED']];
$measureRatio = $actualItem['ITEM_MEASURE_RATIOS'][$actualItem['ITEM_MEASURE_RATIO_SELECTED']]['RATIO'];
$showDiscount = $price['PERCENT'] > 0;



// ****

?>
<?php if(empty($arResult['DETAIL_PICTURE']['ALT'])){
    $arResult['DETAIL_PICTURE']['ALT'] = $arResult["NAME"];
} ?>
<div class="content__block  wrapper wrapper_small">
    <div class="detailed">
        <div class="detailed__col">
            <div class="views swiper-container">
                <div class="swiper-wrapper">
					
                    <button class="views__item swiper-slide">
                        <a data-fancybox="gallery" href="<?= $arResult["DETAIL_PICTURE"]["SRC"] ?>">
                            <img class="views__image swiper-lazy" src="<?= $arResult["MEDIUM_PICTURE"]["SRC"] ?>" alt="<?= $arResult['DETAIL_PICTURE']['ALT'] ?> - фотография №1" data-preview="<?= $arResult["PREVIEW_PICTURE"]["SRC"] ?>">
                        </a>
                        <div class="views__fullscreen"></div>
                    </button>

                    <? $i = 2; foreach ($arResult["PHOTO"]["PREVIEW"] as $key => $photo) {
						
                        ?>
                        <div class="views__item swiper-slide">
                            <a data-fancybox="gallery" href="<?= $arResult["PHOTO"]['ORIGINAL'][$key]['src']; ?>">
                                <img class="views__image swiper-lazy" src="<?= $arResult["PHOTO"]['MEDIUM'][$key]['src']; ?>" alt="<?= $arResult['DETAIL_PICTURE']['ALT'] ?> - фотография №<?=$i?>" data-preview="<?= $photo['src'] ?>" data-full="">
                            </a>
                            <button class="views__fullscreen"></button>
                        </div>
                    <? $i++; } ?>

                </div>
                <div class="views__pagination views-pagination"></div>
            </div>
        </div>
        <div class="detailed__col">
          <? if (!$arResult["PROPERTIES"]["WIDTH"]["VALUE"] && !$arResult["PROPERTIES"]["HEIGHT"]["VALUE"] && !$arResult["PROPERTIES"]["THICKNESS"]["VALUE"]) {
            } else { ?>
                <div class="detailed__item">
                    <h3 class="detailed__title"><?= $arResult["PROPERTIES"]["SIZES"]["NAME"] ?> (ДхШхВ)</h3>
                    <div class="detailed__descr">
                        <?= $arResult["PROPERTIES"]["WIDTH"]["VALUE"] ?>
                        х<?= $arResult["PROPERTIES"]["HEIGHT"]["VALUE"] ?>
                        х<?= $arResult["PROPERTIES"]["THICKNESS"]["VALUE"] ?> см
                        <? foreach ($arResult["PROPERTIES"]["SIZES"]["VALUE"] as $key => $value) {
                            $descr = $arResult["PROPERTIES"]["SIZES"]["DESCRIPTION"][$key];
                            if ($descr != "") {
                                ?>
                                <?= $descr; ?>
                            <? } ?>
                            <?= $value ?><br>
                        <? } ?>
                    </div>
                </div>
            <? } ?>
            <? if (count($arResult["ALL_COLORS"]) > 0) { ?>
                <div class="detailed__item">
                    <h3 class="detailed__title"><?= $arResult["PROPERTIES"]["COLOR"]["NAME"] ?></h3>
                    <? foreach ($arResult["ALL_COLORS"] as $color) { ?>
                        <div class="detailed__color" style="background-color: <?= $color["UF_COLOR_CODE"] ?>;"></div>
                    <? } ?>
                </div>
            <? } ?>
            <? if (count($arResult["ALL_EDGE"]) > 0) { ?>
                <div class="detailed__item">
                    <h3 class="detailed__title"><?= $arResult["PROPERTIES"]["EDGE"]["NAME"] ?></h3>
                    <? foreach ($arResult["ALL_EDGE"] as $edge) {
                        ?>
                        <div class="detailed__descr"><?= $edge["UF_NAME"] ?></div>
                    <? } ?>
                </div>
            <? } ?>


            <? if (count($arResult["ALL_FORMS"]) > 0) { ?>
                <div class="detailed__item">
                    <h3 class="detailed__title"><?= $arResult["PROPERTIES"]["FORM"]["NAME"] ?></h3>
                    <? foreach ($arResult["ALL_FORMS"] as $form) {
                        ?>
                        <div class="detailed__descr"><?= $form["UF_NAME"] ?></div>
                    <? } ?>
                </div>
            <? } ?>

				<?if ($arResult["PODSTOLS"] != null) { ?>
                <div class="detailed__item block_legs">
                    <h3 class="detailed__title">Варианты подстолья</h3>
                    <div class="legs" data-tooltip-before="Добавить в корзину этот вариант подстолья"
                         data-tooltip-after="Товар добавлен в корзину">
                        <div class="legs__list swiper-container">
                            <div class="swiper-wrapper">

                                <? foreach ($arResult["PODSTOLS"] as $podstol) { ?>
                                    <div class="legs__item swiper-slide">
                                        <a class="legs__link" href="#" data-cart="<?= $podstol["ID"] ?>" data-priceleg="<?= floor($podstol["PROPERTY_6"])?>">
                                            <img class="legs__preview swiper-lazy"
                                                 data-src="<?= $podstol["PREVIEW_PICTURE"] ?>"
                                                 alt="">
                                            <svg class="legs__icon">
                                                <use href="<?= SITE_TEMPLATE_PATH ?>/styles/icons.svg#baseline-check_circle"/>
                                            </svg>
											<div class="detailed__price visprleg">
												<strong><?=floor($podstol["PROPERTY_6"])?></strong>
											</div>
                                        </a>
                                    </div>
                                <? } ?>

                            </div>
                        </div>
                        <div class="legs-nav">
                            <button class="legs-nav__item legs-nav__item_prev"></button>
                            <button class="legs-nav__item legs-nav__item_next"></button>
                        </div>
                    </div>
                </div>
            <? } ?>
            <? if ($arResult["PROPERTIES"]["PRICE"]["VALUE"]) { ?>
                <div class="detailed__item">
                    <h3 class="detailed__title">Цена</h3>
                    <div class="detailed__price">
						<? $piceitem = $arResult["PROPERTIES"]["PRICE"]["VALUE"];?>
                        <strong id="priceitem" data-priceitem="<?=$piceitem?>"><?=$piceitem?></strong>
                    </div>
                </div>
            <? } ?>
            <div class="detailed__item">
                <button class="detailed__buy button button_gold" title="Товар добавлен в корзину"
                        data-cart="<?= $arResult["ID"] ?>">Купить
                </button>
				<div class="warn_needlegs">Выберите вариант подстолья</div>
				<? if ($arResult["PROPERTIES"]["IN_STOCK"]["VALUE"] == NULL) { ?>
                    <div class="detailed__deadline">под заказ</div>
                <? } else { ?>
                    <div class="detailed__deadline"><?=$arResult["PROPERTIES"]["IN_STOCK"]["VALUE_ENUM"]?></div>
                <? }  ?>
            </div>

           <div class="detailed__custom custom-bage">

                

                <img class="lozad" data-src="/upload/20y.png" style="width: 100%;height: auto;display: block;"
                     alt="">

            </div>

            <!--<div class="detailed__custom custom-bage">
<img class="cutsom-bage__icon lozad" data-src="<?//= SITE_TEMPLATE_PATH ?>/styles/images/custom-bage.png"
                     alt="">
                <h4 class="custom-bage__title">Модификация под заказ</h4>
                <div class="custom-bage__descr">Данный товар может быть выполнен в&nbsp;любом размере</div>
            </div>-->
        </div>

    </div>
	
	<? if (!empty($arResult['DETAIL_TEXT'])): ?>
	<div id="detail_block">
		<h3 class="detailed__title">Описание</h3>
		<div id="detail_text"><!-- TEXT --><?=$arResult['DETAIL_TEXT'];?><!-- /TEXT --></div>
	</div>
	<? endif; ?>
</div>
<div class="banner lozad" data-background-image="<?= SITE_TEMPLATE_PATH ?>/images/banner_1.jpg">
    <div class="banner__wrapper wrapper">
        <h2 class="banner__title">Индивидуальные решения от KELUD</h2>
        <div class="banner__descr">
            <p>
                <?$APPLICATION->IncludeComponent(
                    "bitrix:main.include",
                    ".default",
                    Array(
                        "AREA_FILE_SHOW" => "file",
                        "COMPONENT_TEMPLATE" => ".default",
                        "EDIT_TEMPLATE" => "",
                        "PATH" => "include/inner_file.php"
                    )
                );?>
			</p>
        </div>
        <a class="banner__action button button_gold" href="/custom/">Хочу индивидуальное решение</a>
    </div>
</div>
<? if ($arResult["ASSOCIATED_ITEMS"] != null) { ?>
    <div class="content__block wrapper">
        <header class="c-header">
            <h2 class="c-header__title">Сопутствующие товары</h2>
        </header>
        <div class="catalog">
            <div class="catalog__list">
                <? foreach ($arResult["ASSOCIATED_ITEMS"] as $assoc) { ?>
                    <a class="catalog__item" href="<?= $assoc["DETAIL_PAGE_URL"] ?>">
                        <img class="catalog__preview lozad" data-src="<?= $assoc["PREVIEW_PICTURE"] ?>"
                             alt="">
                        <div class="catalog__title"><span><?= $assoc["NAME"] ?></span></div>
                        <div class="catalog__price"><?= $assoc["PRICE"] ?></div>
                    </a>
                <? } ?>
            </div>
        </div>
    </div>
<? } ?>
<div class="content__block wrapper">
    <div class="order-info">
        <h2 class="order-info__title">Заказ и&nbsp;доставка</h2>
        <div class="order-info__wrapper">
            <div class="order-info__item">
                <svg class="order-info__icon">
                    <use href="<?= SITE_TEMPLATE_PATH ?>/styles/icons.svg#outline-check"/>
                </svg>
                <h3 class="order-info__subtitle">Контроль качества</h3>
                <div class="order-info__descr">Каждое производимое изделие проходит контроль качества на&nbsp;всех
                    этапах технологического процесса
                </div>
            </div>
            <div class="order-info__item">
                <svg class="order-info__icon">
                    <use href="<?= SITE_TEMPLATE_PATH ?>/styles/icons.svg#outline-local_shipping"/>
                </svg>
                <h3 class="order-info__subtitle">Доставка в&nbsp;любую точку России</h3>
                <div class="order-info__descr">Доставим заказ в&nbsp;любую точку России</div>
            </div>
            <div class="order-info__item">
                <svg class="order-info__icon">
                    <use href="<?= SITE_TEMPLATE_PATH ?>/styles/icons.svg#outline-security"/>
                </svg>
                <h3 class="order-info__subtitle">Бережная упаковка</h3>
                <div class="order-info__descr">Полная сохранность при перевозке обеспечивается за&nbsp;счет оптимальной
                    укладки и&nbsp;надёжного крепления товаров
                </div>
            </div>
        </div>
        <div class="order-info__action">
            <button class="button button_gold" data-overlay="#callback">Оставить заявку</button>
            <div>или звоните <a href="tel:+78463004542" class="link link_no-underline">+7 846 300-45-42</a></div>
        </div>
    </div>
</div>
<div class="content__block wrapper">
    <header class="c-header">
        <h2 class="c-header__title">Похожие товары</h2>
    </header>
    <div class="catalog">
        <div class="catalog__list">
            <? foreach ($arResult["ANALOGS"] as $analog) { ?>
                <a class="catalog__item" href="<?= $analog["DETAIL_PAGE_URL"] ?>">
                    <img class="catalog__preview lozad" data-src="<?= $analog["PREVIEW_PICTURE"] ?>"
                         alt="">
                    <div class="catalog__title"><span><?= $analog["NAME"] ?></span></div>
                    <div class="catalog__price"><?= $analog["PRICE"] ?></div>
                </a>
            <? } ?>
        </div>
    </div>
</div>



    <?if($arResult['PROPERTIES']['POPUP']["VALUE"] == 'Y'){?>

        <div id="" class="popup_trigger prod_modal popup_modal no_prod_modal">
            <div class="pb_body">
                <div class="pb_closer">
                    <span class="closer_popup"></span>
                </div>
                <div class="pb_content">

                    <?if($arResult['PROPERTIES']['P_IMG_L']['VALUE'] != '' || $arResult['PROPERTIES']['P_IMG_R']['VALUE'] != ''){?>

                        <div class="pop_img_section">
                            <?if($arResult['PROPERTIES']['P_IMG_R']['VALUE'] == '' && $arResult['PROPERTIES']['P_IMG_L']['VALUE'] != ''){
                                $img_1 = CFile::GetPath($arResult['PROPERTIES']['P_IMG_L']['VALUE']);
                                ?>
                                <div class="center_img">
                                    <img src="<?=$img_1?>" alt="">
                                </div>
                            <?}else{
                                $img_1 = CFile::GetPath($arResult['PROPERTIES']['P_IMG_L']['VALUE']);
                                $img_2 = CFile::GetPath($arResult['PROPERTIES']['P_IMG_R']['VALUE']);
                                ?>
                                <div class="l_img">
                                    <img src="<?=$img_1?>" alt="">
                                </div>
                                <div class="r_img">
                                    <img src="<?=$img_2?>" alt="">
                                </div>
                            <?}?>
                        </div>
                    <?}?>

                    <?if($arResult['PROPERTIES']['P_TEXT']['~VALUE']['TEXT'] != ''){?>
                        <div class="pop_text">
                            <?=$arResult['PROPERTIES']['P_TEXT']['~VALUE']['TEXT']?>
                        </div>
                    <?}?>
                    <?if($arResult['PROPERTIES']['P_BL_U']['VALUE'] != '' || $arResult['PROPERTIES']['P_BR_U']['VALUE'] != '' ){?>
                        <div class="pop_button_section">
                            <a href="<?=$arResult['PROPERTIES']['P_BL_U']['VALUE']?>" class="p_b_l pop_button"><?=$arResult['PROPERTIES']['P_BL']['VALUE']?></a>
                            <a href="<?=$arResult['PROPERTIES']['P_BR_U']['VALUE']?>" class="p_b_r pop_button"><?=$arResult['PROPERTIES']['P_BR']['VALUE']?></a>
                            <div class="clr"></div>
                        </div>
                    <?}?>
                </div>
            </div>
        </div>
        <div class="popup_bg bg_first"></div>
    <?}?>

    <?//echo '<pre>'; print_r($arResult); echo '</pre>';?>
