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
$this->SetViewTarget('section_list'); ?>
    <ul class="banner__menu banner-menu banner-menu_light">
        <? foreach ($arResult["SECTIONS"] as $section) {

            if ($section["SECTION_PAGE_URL"] == $APPLICATION->GetCurPage()) { ?>
                <li class="banner-menu__item banner-menu__item_current"><?= $section["NAME"] ?>
                    <sup><?= $section["ELEMENT_CNT"] ?></sup></li>
            <? } else {
                ?>
                <li class="banner-menu__item"><a class="banner-menu__link"
                                                 href="<?= $section["SECTION_PAGE_URL"] ?>"><span><?= $section["NAME"] ?></span><sup><?= $section["ELEMENT_CNT"] ?></sup></a>
                </li>
            <? }
        } ?>
    </ul>
<? $this->EndViewTarget() ?>