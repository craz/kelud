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
<div class="content__block content__block_indentless wrapper wrapper_small">

        <div class="content__text article">
            <div class="article__explanatory">
                <div class="factoid">
                    <img class="factoid__image lozad"
                         data-src="<?= $arResult["PROPERTIES"]["ANNOTATION_IMG"]["VALUE"] ?>"
                         alt="">
                    <div class="factoid__descr">
                        <?= $arResult["DISPLAY_PROPERTIES"]["ANNOTATION_TEXT"]["~VALUE"]["TEXT"] ?>
                    </div>
                </div>
            </div>
            <!-- TEXT -->
                <?= $arResult["~DETAIL_TEXT"] ?>
            <!-- /TEXT -->
            <img src="<?= $arResult["DETAIL_PICTURE"]["SRC"] ?>" alt="">
            <? /**
             *  Блоки доп текста.
             **/ ?>
            <!-- TEXT -->
            <? foreach ($arResult["PROPERTIES"]["BLOCK_TEXT"]["~VALUE"] as $key => $text) {
                $item = $arResult["PROPERTIES"]["BLOCK_ITEMS"]["ITEMS"][$arResult["PROPERTIES"]["BLOCK_ITEMS"]["VALUE"][$key]];
                if ($item != NULL) { ?>
                    <div class="article__explanatory">
                        <div class="catalog">
                            <a class="catalog__item" href="<?=$item["DETAIL_PAGE_URL"]?>">
                                <img class="catalog__preview lozad" data-src="<?=$item["DETAIL_PICTURE"]?>" alt="">
                                <div class="catalog__title"><span><?= $item["NAME"] ?></span></div>
                                <div class="catalog__price"><?=$item["PROPERTY_PRICE_VALUE"]?> ₽</div>
                            </a>
                        </div>
                    </div>
                <? } ?>
                <?= $text["TEXT"] ?>
            <? } ?>
            <!-- /TEXT -->
        </div>
</div>
