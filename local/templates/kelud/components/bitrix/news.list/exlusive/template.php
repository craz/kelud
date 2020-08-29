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
<? if ($arResult["SECTIONS"]) { ?>
    <nav class="catalog__nav c-nav">
        <ul class="c-nav__list">

            <?
            foreach ($arResult["SECTIONS"] as $sect) {

                ?>
                <li class="c-nav__item">
                    <a class="c-nav__link link link_dotted" href="<?= $sect["SECTION_PAGE_URL"] ?>">
						<!--<img class="c-nav__image" src="<? /*= $sect["PICTURE"] */?>" alt="">-->
                        <?= $sect["NAME"] ?> <sup><?= $sect["ELEMENT_CNT"] ?></sup>
                    </a>
                </li>
            <? } ?>
        </ul>
        <div class="c-nav__line" hidden></div>
    </nav>
    <div class="catalog__categories wrapper swiper-container">
        <div class="swiper-wrapper">
            <? foreach ($arResult["SECTIONS"] as $sect) {
                $count = 0;
                ?>
                <div class="catalog__list swiper-slide"><?
                    foreach ($sect["ITEMS"] as $item) {

                        $count++;
                        ?>
                        <a class="catalog__item" href="<?= $item["DETAIL_PAGE_URL"] ?>">
                            <img class="catalog__preview lozad"
                                 data-src="<?= $item["DETAIL_PICTURE"]["SRC"] ?>" alt="">
                            <div class="catalog__title"><span><?= $item["NAME"] ?></span></div>
                            <div class="catalog__price"><?= $item["PROPERTIES"]["PRICE"]["VALUE"] ?></div>
                        </a>
                    <? } ?>
                </div>
            <? } ?>
        </div>
    </div>
<? } ?>