<?php
foreach ($arResult["ITEMS"] as &$item) {
    $info = $arFile = CFile::MakeFileArray($item["PREVIEW_PICTURE"]["SRC"]);
    $info["type"] = mb_strtoupper(str_replace("application/", "", $info["type"]));
    $item["PREVIEW_PICTURE"]["INFO"] = $info;
}
unset($info);