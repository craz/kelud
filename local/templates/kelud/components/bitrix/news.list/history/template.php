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
<div class="content__block content__block_indentless wrapper">
    <div class="history">
        <ul class="history__navigation history-nav">
            <? foreach ($arResult["SECTIONS"] as $key => $section) { ?>
                <li class="history-nav__item"><a class="history-nav__link link link_dotted" href="#"
                                                 data-scroll=".history__block"
                                                 data-scroll-index="<?= $key ?>"><?= $section["NAME"] ?></a>
                </li>
            <? } ?>
        </ul>
        <div class="history__content">
            <div class="history__block">

                <? foreach ($arResult["SECTIONS"] as $section) { ?>
                    <h2 class="history__title"><?=$section["NAME"]?></h2>
                    <? foreach ($section["ITEMS"] as $item) { ?>
                        <div class="history__item" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
                            <?
                            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                            if ($item["PREVIEW_PICTURE"] != NULL) {
                                ?>
                                <img src="<?= $item["PREVIEW_PICTURE"]["SRC"] ?>" alt="">
                                <?
                            }
                            ?>
                            <?= $item["~PREVIEW_TEXT"] ?>
                        </div>
                    <? } ?>
                <? } ?>
            </div>
        </div>
    </div>
</div>