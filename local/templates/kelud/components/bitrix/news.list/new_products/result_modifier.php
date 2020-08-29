<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

foreach ($arResult["ITEMS"] as &$item)
{
    $item["PROPERTIES"]["PRICE"]["VALUE"] = number_format((int)$item["PROPERTIES"]["PRICE"]["VALUE"],0," ", " ");
    $file = CFile::GetFileArray($item["DETAIL_PICTURE"]["ID"]);
    $file = CFile::ResizeImageGet($file, array('width' => 255, 'height' => 162), BX_RESIZE_IMAGE_PROPORTIONAL, true);
    $item["DETAIL_PICTURE"]["SRC"] = $file["src"];
}