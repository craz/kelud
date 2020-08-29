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
<div class="content__block content__block_indentless">
    <div class="c-nav c-nav_borderless">
        <ul class="c-nav__list">
            <? foreach ($arResult["SECTIONS"] as $section) { ?>
                <li class="c-nav__item">
                    <a class="c-nav__link link" href="<?= $section["SECTION_PAGE_URL"] ?>">
                        <img class="c-nav__image lozad" data-src="<?= $section["PICTURE"]["SRC"] ?>"
                             alt=""><?= $section["NAME"] ?><sup><?= $section["ELEMENT_CNT"] ?></sup>
                    </a>
                </li>
            <? } ?>
        </ul>
        <div class="c-nav__line" hidden></div>
    </div>
</div>
