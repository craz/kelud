<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<li class="f-menu__group">
    <? foreach ($arResult

    as $key => $arItem){ ?>
    <? if ($key == 0){ ?>
    <h4 class="f-menu__title"><a class="link" href="<?= $arItem["LINK"] ?>"><?= $arItem["TEXT"] ?></a></h4>
    <ul class="f-menu__submenu">
        <? continue;
        } else { ?>
            <li class="f-menu__item"><a class="link" href="<?= $arItem["LINK"] ?>"><?= $arItem["TEXT"] ?></a></li>
        <? } ?>
        <? } ?>
    </ul>
</li>
