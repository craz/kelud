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
    <div class="content__block">
        <div class="gallery swiper-container">
            <div class="swiper-wrapper">
                <? foreach ($arResult["ITEMS"] as $item) {

                    ?>
                    <div class="gallery__item swiper-slide" data-preview="<?= $item["PREVIEW_PICTURE"]["SRC"] ?>">
                        <img class="gallery__image swiper-lazy" data-src="<?= $item["PREVIEW_PICTURE"]["SRC"] ?>"
                             alt="">
                        <div class="gallery__wrapper">
                            <h3 class="gallery__title"><a class="link link_inverted"
                                                          href="<?= $item["ELEMENTS"][0]["DETAIL_PAGE_URL"] ?>"><?= $item["ELEMENTS"][0]["NAME"] ?></a>
                            </h3>
                            <div class="gallery__link-wrap">
                                <a class="link link_inverted" href="<?= $item["PROPERTIES"]["FILE"]["VALUE"]["SRC"];
                                $size = round($item["PROPERTIES"]["FILE"]["VALUE"]["FILE_SIZE"] / 1000);
                                ?>">Скачать 3D модель</a> <?= $size ?> КБ
                            </div>

                        </div>
                    </div>
                <? } ?>
            </div>
            <div class="gallery-pagination"></div>
            <div class="gallery-nav">
                <button class="gallery-nav__item gallery-nav__item_prev">
                    <svg class="gallery-nav__icon">
                        <use href="<?= SITE_TEMPLATE_PATH ?>/styles/icons.svg#outline-arrow_back"/>
                    </svg>
                </button>
                <button class="gallery-nav__item gallery-nav__item_next">
                    <svg class="gallery-nav__icon">
                        <use href="<?= SITE_TEMPLATE_PATH ?>/styles/icons.svg#outline-arrow_forward"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>
<? }
?>