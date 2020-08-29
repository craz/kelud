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
        <header class="c-header wrapper">
            <h2 class="c-header__title">Фотогалерея</h2>
        </header>
<div class="wrapper wrapper_small">
        <div class="gallery swiper-container">
            <div class="swiper-wrapper">
                <? foreach ($arResult["ITEMS"] as $item) {
                    ?>
                    <div class="gallery__item swiper-slide" data-preview="<?= $item["PREVIEW_PICTURE"]["SRC"] ?>">
                        <img class="gallery__image swiper-lazy" data-src="<?= $item["PREVIEW_PICTURE"]["SRC"] ?>"
                             alt="">
                        <div class="gallery__wrapper">
                            <?
                            $size = round($item["PROPERTIES"]["FILE"]["VALUE"]["FILE_SIZE"] / 1000);

                            ?>
                            <!--                            <h3 class="gallery__title"><a class="link link_inverted"-->
                            <!--                                                          href="-->
                            <? //= $item["PROPERTIES"]["ITEM"]["VALUE"]["DETAIL_PAGE_URL"] ?><!--">-->
                            <? //= $item["PROPERTIES"]["ITEM"]["VALUE"]["NAME"] ?><!--</a>-->
                            <!--                            </h3>-->
                            <h3 class="gallery__title"><?= $item["PROPERTIES"]["ITEM"]["VALUE"]["NAME"] ?></h3>
                            
                        </div>
                    </div>
                <? } ?>

            </div>
            <div class="gallery-pagination"></div>
            <div class="gallery-nav">
                <button class="gallery-nav__item gallery-nav__item_prev">
                    <svg class="gallery-nav__icon">
                        <use href="./styles/icons.svg#outline-arrow_back"/>
                    </svg>
                </button>
                <button class="gallery-nav__item gallery-nav__item_next">
                    <svg class="gallery-nav__icon">
                        <use href="./styles/icons.svg#outline-arrow_forward"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>
     </div>
<? }
?>