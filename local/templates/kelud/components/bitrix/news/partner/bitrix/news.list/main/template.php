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

<? $this->SetViewTarget('section_list'); ?>
<ul class="banner__menu banner-menu">
    <? foreach ($arResult["ITEMS"] as $arItem) {
        $class = "";
        if ($arItem["DETAIL_PAGE_URL"] == $APPLICATION->GetCurPage()) {
            $class = "banner-menu__item_current";
            ?>
            <li class="banner-menu__item <?= $class ?>"><span><?= $arItem["NAME"] ?></span></li>
        <? } else {
            ?>
            <li class="banner-menu__item <?= $class ?>"><a class="banner-menu__link"
                                                           href="<?= $arItem["DETAIL_PAGE_URL"] ?>"><span><?= $arItem["NAME"] ?></span></a>
            </li>
        <? }
    } ?>
</ul>
<? $this->EndViewTarget(); ?>
