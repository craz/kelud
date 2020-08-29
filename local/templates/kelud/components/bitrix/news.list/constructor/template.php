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
<div class="constructor">
    <div class="constructor__wrapper">
        <div class="constructor__interior-list swiper-container">
            <div class="swiper-wrapper">
                <? foreach ($arResult["ITEMS"] as $item) {

                    ?>

                    <div id="<?=$this->GetEditAreaId($item['ID']);?>" class="swiper-slide"
                         data-preview="<?= $item["PREVIEW_PICTURE"]["SRC"] ?>">
                        <?
                        $this->AddEditAction($item['ID'], $item['EDIT_LINK'], CIBlock::GetArrayByID($item["IBLOCK_ID"], "ELEMENT_EDIT"));
                        $this->AddDeleteAction($item['ID'], $item['DELETE_LINK'], CIBlock::GetArrayByID($item["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                        ?>
                        <img class="constructor__image" src="<?= $item["PREVIEW_PICTURE"]["SRC"] ?>"
                             alt="">
                    </div>
                <? } ?>
            </div>
        </div>
        <div class="constructor__render-list constructor__render-list_legs swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img class="constructor__image" src="//<?=$_SERVER["HTTP_HOST"]?><?=SITE_TEMPLATE_PATH?>/images/constructor/legs__4.png"
                         alt="">
                </div>
                <div class="swiper-slide">
                    <img class="constructor__image" src="//<?=$_SERVER["HTTP_HOST"]?><?=SITE_TEMPLATE_PATH?>/images/constructor/legs__1.png"
                         alt="">
                </div>
                <div class="swiper-slide">
                    <img class="constructor__image" src="//<?=$_SERVER["HTTP_HOST"]?><?=SITE_TEMPLATE_PATH?>/images/constructor/legs__2.png"
                         alt="">
                </div>
                <div class="swiper-slide">
                    <img class="constructor__image" src="//<?=$_SERVER["HTTP_HOST"]?><?=SITE_TEMPLATE_PATH?>/images/constructor/legs__3.png"
                         alt="">
                </div>
            </div>
        </div>
        <div class="constructor-selector constructor-selector_active constructor-selector_legs swiper-container">
            <div class="swiper-wrapper">
                <a class="constructor-selector__item swiper-slide" href="#" data-type="legs" >
                    <img class="constructor-selector__image"
                         src="//<?=$_SERVER["HTTP_HOST"]?><?=SITE_TEMPLATE_PATH?>/images/constructor/legs__4_preview.png" alt="">
                </a>
                <a class="constructor-selector__item swiper-slide" href="#" data-type="legs" >
                    <img class="constructor-selector__image"
                         src="//<?=$_SERVER["HTTP_HOST"]?><?=SITE_TEMPLATE_PATH?>/images/constructor/legs__1_preview.png" alt="">
                </a>
                <a class="constructor-selector__item swiper-slide" href="#" data-type="legs" >
                    <img class="constructor-selector__image"
                         src="//<?=$_SERVER["HTTP_HOST"]?><?=SITE_TEMPLATE_PATH?>/images/constructor/legs__2_preview.png" alt="">
                </a>
                <a class="constructor-selector__item swiper-slide" href="#" data-type="legs" >
                    <img class="constructor-selector__image"
                         src="//<?=$_SERVER["HTTP_HOST"]?><?=SITE_TEMPLATE_PATH?>/images/constructor/legs__3_preview.png" alt="">
                </a>

            </div>
        </div>
        <div class="constructor__render-list constructor__render-list_top swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img class="constructor__image" src="//<?=$_SERVER["HTTP_HOST"]?><?=SITE_TEMPLATE_PATH?>/images/constructor/top__4.png"
                         alt="">
                </div>
                <div class="swiper-slide">
                    <img class="constructor__image" src="//<?=$_SERVER["HTTP_HOST"]?><?=SITE_TEMPLATE_PATH?>/images/constructor/top__1.png"
                         alt="">
                </div>
                <div class="swiper-slide">
                    <img class="constructor__image" src="//<?=$_SERVER["HTTP_HOST"]?><?=SITE_TEMPLATE_PATH?>/images/constructor/top__2.png"
                         alt="">
                </div>
                <div class="swiper-slide">
                    <img class="constructor__image" src="//<?=$_SERVER["HTTP_HOST"]?><?=SITE_TEMPLATE_PATH?>/images/constructor/top__3.png"
                         alt="">
                </div>
            </div>
        </div>
        <div class="constructor-selector constructor-selector_active constructor-selector_top swiper-container">
            <div class="swiper-wrapper">
                <a class="constructor-selector__item swiper-slide" href="#" data-type="top" >
                    <img class="constructor-selector__image"
                         src="//<?=$_SERVER["HTTP_HOST"]?><?=SITE_TEMPLATE_PATH?>/images/constructor/top__4_preview.png" alt="">
                </a>
                <a class="constructor-selector__item swiper-slide" href="#" data-type="top" >
                    <img class="constructor-selector__image"
                         src="//<?=$_SERVER["HTTP_HOST"]?><?=SITE_TEMPLATE_PATH?>/images/constructor/top__1_preview.png" alt="">
                </a>
                <a class="constructor-selector__item swiper-slide" href="#" data-type="top" >
                    <img class="constructor-selector__image"
                         src="//<?=$_SERVER["HTTP_HOST"]?><?=SITE_TEMPLATE_PATH?>/images/constructor/top__2_preview.png" alt="">
                </a>
                <a class="constructor-selector__item swiper-slide" href="#" data-type="top" >
                    <img class="constructor-selector__image"
                         src="//<?=$_SERVER["HTTP_HOST"]?><?=SITE_TEMPLATE_PATH?>/images/constructor/top__3_preview.png" alt="">
                </a>
            </div>
        </div>
        <div class="constructor-tips constructor-tips_active swiper-container">
            <div class="swiper-wrapper">
                <? foreach ($arResult["ITEMS"] as $item) { ?>
                    <div class="swiper-slide">
                        <? foreach ($item["PROPERTIES"]["SUB_ELEMENTS"]["VALUE"] as $key=>$x) {
                            ?>
                            <div class="constructor-tips__tip" style="top: <?=$item["PROPERTIES"]["SUB_ELEMENTS_COORD"]["VALUE"][$key]?>%; left: <?=$item["PROPERTIES"]["SUB_ELEMENTS_COORD"]["DESCRIPTION"][$key]?>%;"
                                 title="<a class='link' target='_blank' href='<?= $item["SUB_ELEMENTS"][$x]["DETAIL_PAGE_URL"]?>'><?= $item["SUB_ELEMENTS"][$x]["NAME"] ?></a>"></div>
                        <? } ?>
                    </div>
                <? } ?>
            </div>
        </div>
    </div>
    <div class="constructor__bar wrapper">
        <div class="interior-pagination"></div>
        <div class="constructor__actions">
            <button class="constructor__action constructor__settings button">Скрыть</button>
            <button class="constructor__action constructor__magic button">Подобрать стол</button>
            <button class="constructor__action constructor__order button button_gold" data-overlay="#custom">
                Заказать этот стол
            </button>
        </div>
    </div>
</div>