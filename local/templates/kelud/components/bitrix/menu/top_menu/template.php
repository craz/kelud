<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<div class="h-menu">
    <button class="h-menu__hamburger">
        <div></div>
        <div></div>
        <div></div>
    </button>
    <? if (!empty($arResult)): ?>
    <ul class="h-menu__list" hidden>

        <?
        foreach ($arResult as $arItem):
            if ($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1)
                continue;
            ?>
            <li class="h-menu__item"><a class="h-menu__link"
                                        href="<?= $arItem["LINK"] ?>"><span><?= $arItem["TEXT"] ?></span></a></li>
        <? endforeach ?>

    </ul>
    <div class="h-menu__line" hidden></div>
</div>
<? endif ?>



