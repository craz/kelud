<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @var CBitrixComponentTemplate $this
 * @var CatalogElementComponent $component
 */

foreach ($arResult["ITEMS"] as &$item) {

    if(!$item["DETAIL_PICTURE"]["SRC"])
    {
        $item["DETAIL_PICTURE"]["SRC"] = NO_PHOTO;
    }

    foreach ($arParams["CART"] as $cart) {
        if ($cart->id == $item["ID"]) {
            $item["CART"] = $cart;
            break;
        }
    }
    $item["PROPERTIES"]["PRICE"]["VALUE"] = number_format((int)$item["PROPERTIES"]["PRICE"]["VALUE"], 0, " ", " ");
}
unset($item);