<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
if (!empty($arResult["ITEMS"])) {
    ?>
    <div class="content__block wrapper">
        <header class="c-header">
            <h2 class="c-header__title">Новинки</h2>
        </header>
        <div class="catalog">
            <div class="catalog__list">
                <?
                foreach ($arResult["ITEMS"] as $item) { ?>
                    <a class="catalog__item" href="<?= $item["DETAIL_PAGE_URL"] ?>">
                        <img class="catalog__preview lozad" data-src="<?= $item["DETAIL_PICTURE"]["SRC"] ?>" alt="">
                        <div class="catalog__title"><span><?= $item["NAME"] ?></span></div>
                        <div class="catalog__price"><?=$item["PROPERTIES"]["PRICE"]["VALUE"]?></div>
                    </a>
                    <?
                } ?>
            </div>
        </div>
    </div>
<? }
?>