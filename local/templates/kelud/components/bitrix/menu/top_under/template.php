<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<? $this->SetViewTarget('section_list'); ?>
<ul class="banner__menu banner-menu">
    <? foreach ($arResult as $arItem) {
        $class = "";
        if ($arItem["LINK"] == $APPLICATION->GetCurPage()) {
            $class = "banner-menu__item_current";
            ?>
            <li class="banner-menu__item <?= $class ?>"><span><?= $arItem["TEXT"] ?></span></li>
        <? } else {
            ?>
            <li class="banner-menu__item <?= $class ?>"><a class="banner-menu__link"
                                                           href="<?= $arItem["LINK"] ?>"><span><?= $arItem["TEXT"] ?></span></a>
            </li>
        <? }
    } ?>
</ul>
<? $this->EndViewTarget(); ?>
