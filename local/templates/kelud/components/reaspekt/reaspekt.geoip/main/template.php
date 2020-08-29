<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<? $frame = $this->createFrame()->begin(); ?>
<? if ($arResult["GEO_CITY"]):


    $arJSParams = array(
        "AJAX_URL" => array(
            "SELECT" => $templateFolder . "/ajax_select_city.php",
            "GET" => $templateFolder . "/ajax_geobase_get.php",
            "SAVE" => $templateFolder . "/ajax_geobase_save.php",
        ),
        "CLASS" => array(
            "WRAP_QUESTION_REASAPEKT" => "wrapQuestionReaspekt"
        )
    );

    if ($arResult["SET_LOCAL_DB"] == "local_db") :?>


        <span data-reaspektmodalbox-href="<?= $templateFolder ?>/ajax_popup_city.php"
              class="h-contacts__city cityLinkPopupReaspekt  linkReaspekt"><?= $arResult["GEO_CITY"]["CITY"] ?></span>
        <?
        if (
            $arParams["CHANGE_CITY_MANUAL"] == "Y"
            && $arResult["CHANGE_CITY"] == "N"
        ) :?>

        <? endif; ?>

        <script type="text/javascript">
            $('.cityLinkPopupReaspekt').ReaspektModalBox();
            var objJCReaspektGeobase = new JCReaspektGeobase(<? echo CUtil::PhpToJSObject($arJSParams, false, true); ?>);
        </script>
    <? else: ?>
        <div class="wrapGeoIpReaspekt">
            <strong><?= $arResult["GEO_CITY"]["CITY"] ?></strong>, <?= $arResult["GEO_CITY"]["REGION"] ?>
        </div>
    <?endif;
endif; ?>
<? $frame->beginStub(); ?>
<? $frame->end(); ?>
