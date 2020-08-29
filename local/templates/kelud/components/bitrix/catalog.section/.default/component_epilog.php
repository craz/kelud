<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @var array $arParams
 * @var array $templateData
 * @var string $templateFolder
 * @var CatalogSectionComponent $component
 */

global $APPLICATION;

if (isset($templateData['TEMPLATE_THEME'])) {
    $APPLICATION->SetAdditionalCSS($templateFolder . '/themes/' . $templateData['TEMPLATE_THEME'] . '/style.css');
    $APPLICATION->SetAdditionalCSS('/bitrix/css/main/themes/' . $templateData['TEMPLATE_THEME'] . '/style.css', true);
}

if (!empty($templateData['TEMPLATE_LIBRARY'])) {
    $loadCurrency = false;
    if (!empty($templateData['CURRENCIES'])) {
        $loadCurrency = \Bitrix\Main\Loader::includeModule('currency');
    }

    CJSCore::Init($templateData['TEMPLATE_LIBRARY']);

    if ($loadCurrency) {
        ?>
        <script>
            BX.Currency.setCurrencies(<?=$templateData['CURRENCIES']?>);
        </script>
        <?
    }
}

$request = \Bitrix\Main\Context::getCurrent()->getRequest();
if ($_REQUEST["AJAX"] == "Y" && $_REQUEST["ACTION"] == "APPLY") {
    global $APPLICATION;
    $APPLICATION->RestartBuffer();

    $result = new StdClass();
    if (count($arResult["ITEMS"]) == 0) {
        $result->items = false;
        $result->next = false;

        echo json_encode($result);
        die();
    }


    if ($arResult["NAV_RESULT"]->NavPageCount == $arResult["NAV_RESULT"]->NavPageNomer) {
        $result->next = false;
    } else {
        $url = $APPLICATION->GetCurPageParam();
        $isPagen = $_REQUEST["PAGEN_1"];
        if ($isPagen) {
            $url = str_replace("PAGEN_1=" . $isPagen, "PAGEN_1=" . ($arResult["NAV_RESULT"]->NavPageNomer + 1), $url);
        } else {
            $url .= "&PAGEN_1=" . ($arResult["NAV_RESULT"]->NavPageNomer + 1);
        }
        $result->next = $url;
    }


    $facts = [];

    $arSelect = Array("ID", "IBLOCK_ID", "NAME", "PREVIEW_TEXT");//IBLOCK_ID и ID обязательно должны быть указаны, см. описание arSelectFields выше
    $arFilter = Array("IBLOCK_ID" => 13, "ACTIVE" => "Y");
    $res = CIBlockElement::GetList(Array(), $arFilter, false, Array("iNumPage" => $_REQUEST["PAGEN_1"], "nPageSize" => 3), $arSelect);
    while ($ob = $res->GetNextElement()) {
        $elem = $ob->GetFields();

        $facts[] = $elem;
    }

    $c = 1;
    $countFacts = 0;
    foreach ($arResult["ITEMS"] as $item) {

        $result->items .= "<a class='catalog__item' data-type='{$item["PROPERTIES"]["IN_STOCK"]["VALUE"]}' href='{$item["DETAIL_PAGE_URL"]}'>";
        if ($item["PROPERTIES"]["IN_STOCK"]["VALUE"] == 'Под заказ') {
            $result->items .= "<div class='catalog__out-stock'><span>под заказ</span></div>";
        }
        $result->items .= "<img class='catalog__preview lozad' data-src='{$item["DETAIL_PICTURE"]["SRC"]}'
                 alt=''>";
        $result->items .= "<div class='catalog__title'><span>{$item["NAME"]}</span></div>";
        $result->items .= "<div class='catalog__price'>{$item["PROPERTIES"]["PRICE"]["VALUE"]}</div>";
        $result->items .= "</a>";

        if (!$facts[$countFacts]["PREVIEW_TEXT"]) {
            continue;
        }

        $m = rand(7, 10);
        if ($c % $m == 0) {
            $result->items .= "
            <div class='catalog__item catalog__item_tip'>
                <img class='catalog__image' src='" . SITE_TEMPLATE_PATH . "/styles/images/logo_mobile.svg' alt=''>
                <div class='catalog__tip'>{$facts[$countFacts]["PREVIEW_TEXT"]}</div>
            </div>";
            $countFacts++;
        }
        $c++;
        ?>
        <?
    }

    echo json_encode($result);
    die();
}

//	lazy load and big data json answers

if ($request->isAjaxRequest() && ($request->get('action') === 'showMore' || $request->get('action') === 'deferredLoad')) {
    $content = ob_get_contents();
    ob_end_clean();

    list(, $itemsContainer) = explode('<!-- items-container -->', $content);
    list(, $paginationContainer) = explode('<!-- pagination-container -->', $content);

    if ($arParams['AJAX_MODE'] === 'Y') {
        $component->prepareLinks($paginationContainer);
    }

    $component::sendJsonAnswer(array(
        'items' => $itemsContainer,
        'pagination' => $paginationContainer
    ));
}