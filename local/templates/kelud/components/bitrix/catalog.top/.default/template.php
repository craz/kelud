<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 * @var CatalogTopComponent $component
 * @var CBitrixComponentTemplate $this
 * @var string $templateName
 * @var string $componentPath
 * @var string $templateFolder
 */

$this->setFrameMode(true);

if (!empty($arResult['ITEMS'])) {
    ?>
    <div class="content__block wrapper">
        <header class="c-header">
            <h2 class="c-header__title">Популярные товары</h2>
        </header>
        <div class="catalog">
            <div class="catalog__list">
                <? foreach ($arResult["ITEMS"] as $item) { ?>
                    <a class="catalog__item" href="<?= $item["DETAIL_PAGE_URL"] ?>">
                        <img class="catalog__preview lozad" data-src="<?= $item["SMALL"]["SRC"] ?>" alt="">
                        <div class="catalog__title"><span><?=$item["NAME"] ?></span></div>
                        <div class="catalog__price"><?=$item["PROPERTIES"]["PRICE"]["VALUE"] ?></div>
                    </a>
                <? } ?>
            </div>
        </div>
    </div>
<? } ?>