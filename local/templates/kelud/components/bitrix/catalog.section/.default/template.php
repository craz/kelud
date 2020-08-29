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
 */

$this->setFrameMode(true);
?>
<div class="market__wrapper">
    <div class="market__sorting">
        <a class="market__sort m-sort" href="#" data-sort-by="property_IN_STOCK">
            <span class="m-sort__label">по наличию</span>
            <div class="m-sort__order">
                <div></div>
                <div></div>
                <div></div>
            </div>
        </a>
        <a class="market__sort m-sort" href="#" data-sort-by="SHOW_COUNTER">
            <span class="m-sort__label">по популярности</span>
            <div class="m-sort__order">
                <div></div>
                <div></div>
                <div></div>
            </div>
        </a>
        <a class="market__sort m-sort" href="#" data-sort-by="PROPERTY_PRICE">
            <span class="m-sort__label">по цене</span>
            <div class="m-sort__order">
                <div></div>
                <div></div>
                <div></div>
            </div>
        </a>
        <a class="market__sort m-sort" href="#" data-sort-by="CREATED">
            <span class="m-sort__label">по новизне</span>
            <div class="m-sort__order">
                <div></div>
                <div></div>
                <div></div>
            </div>
        </a>
    </div>
    <div class="market__catalog catalog">
        <div class="catalog__list">
			<? if (empty($arResult["ITEMS"])): ?>
				<strong class="catalog__empty">Таких товаров у нас нет</strong>
			<? endif; ?>
            <? foreach ($arResult["ITEMS"] as $item) {
				$price = (int)$item["PROPERTIES"]["PRICE"]["VALUE"];
				$pr_base = $item['PRICES']['BASE_PRICE']['VALUE_NOVAT'];
				$pr_offer = $item['OFFERS'][0]['PRICES']['BASE_PRICE']['VALUE_NOVAT'];
				if($pr_base != '' && $pr_base != 0) $price = $pr_base;
				if($pr_offer != '') $price = $pr_offer;
                ?>
                <a class="catalog__item" data-type="<?=$item["PROPERTIES"]["IN_STOCK"]["VALUE"]?>" href="<?= $item["DETAIL_PAGE_URL"] ?>">
                    <? if ($item["PROPERTIES"]["IN_STOCK"]["VALUE"] == 'Под заказ') { ?>
                        <div class="catalog__out-stock"><span>под заказ.</span></div>
                    <? } ?>
                    <img class="catalog__preview lozad" data-src="<?= $item["DETAIL_PICTURE"]["SRC"] ?>"
                         alt="">
                    <div class="catalog__title">
						<?if($item["PROPERTIES"]["URL_PRIMERIT"]["VALUE"]!='' || $item["PROPERTIES"]["URL_VIEW3D"]["VALUE"]!=''):?>
							<div class="catalog_ar"><img src="/include/ar.jpg"></div>
						<?endif;?>
						<span><?= $item["NAME"] ?></span>
					</div> 
                    <div class="catalog__price"><?=$price?></div>
                </a>
			<? //print_r($item);//["MATRIX"][1][0]['PRICE']);//$item["BASE_PRICE"]);?>
                <? if ($item["FACT"]) { ?>
                    <div class="catalog__item catalog__item_tip">
                        <img class="catalog__image" src="<?= SITE_TEMPLATE_PATH ?>/styles/images/logo_mobile.svg"
                             alt="">
                        <div class="catalog__tip"><!-- TEXT --><?=$item["FACT"]["PREVIEW_TEXT"] ?><!-- /TEXT --></div>
                    </div>
                <? } ?>
            <? } ?>
        </div>
    </div>

    <? if ($arResult['NAV_RESULT']->NavPageCount > 1) { ?>
        <div class="market__load-more">
            <a class="link" href="<?= $APPLICATION->GetCurPage() ?>?AJAX=Y&ACTION=APPLY&PAGEN_1=2">Загрузить ещё</a>
        </div>
    <? } ?>

    <? if (!empty($arResult['DESCRIPTION'])): ?>
            <div class="bx-section-desc bx-blue">
                    <p class="bx-section-desc-post"><!-- TEXT --><?=$arResult['DESCRIPTION'];?><!-- /TEXT --></p>
            </div>
    <? endif; ?>

</div>