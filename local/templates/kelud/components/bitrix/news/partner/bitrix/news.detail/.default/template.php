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
?>
    <div class="for-partners content__block wrapper wrapper_small">
        <div class="for-partners__content content__text">
            <!-- TEXT --><?= $arResult["~PREVIEW_TEXT"] ?><!-- /TEXT -->
        </div>
        <img class="for-partners__man" src="<?= $arResult["PROPERTIES"]["TOP_IMAGE"]["SRC"] ?>" alt="">
    </div>
    <div class="banner lozad" data-background-image="<?= $arResult["PROPERTIES"]["BANNER_IMAGE"]["SRC"] ?>">
        <div class="banner__wrapper wrapper">
            <div class="banner__descr">
                <!-- TEXT --><?= $arResult["~DETAIL_TEXT"] ?><!-- /TEXT -->
            </div>
        </div>
    </div>
<?
if ($arResult["PROPERTIES"]["MODELS"]["VALUE"]) { ?>
    <div class="content__block catalog wrapper wrapper_small">
        <div class="catalog__categories">
            <header class="c-header c-header_text-left">
                <h2 class="c-header__title"><span>3D&nbsp;модели продукции</span></h2>
                <div class="c-header__descr">
                    В&nbsp;этом разделе вы&nbsp;можете скачать 3D&nbsp;модели продукции компании KELUD
                    <span class="c-header__subtext">Скачивая модели вы&nbsp;соглашаетесь с&nbsp;<a href="#"
                                                                                                   class="link">уведомлением о&nbsp;защите прав</a> и&nbsp;принимаете его условия</span>
                </div>
            </header>
            <div class="catalog__list catalog__list_mini-item">
                <? foreach ($arResult["PROPERTIES"]["MODELS"]["ITEMS"] as $item) { ?>
                    <a class="catalog__item" href="<?= $item["PROPERTY_FILE"] ?>" target="_blank">
                        <img class="catalog__preview lozad" data-src="<?= $item["PREVIEW_PICTURE"] ?>" alt="">
                        <div class="catalog__price catalog__price_small"><?= $item["NAME"] ?></div>
                        <div class="catalog__title"><span>Скачать 3D модель</span></div>
                    </a>
                <? } ?>
            </div>
        </div>
    </div>
<? } ?>
<?
if ($arResult["PROPERTIES"]["ITEMS_SLIDER"]["VALUE"]) { ?>

<? } ?>