<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

/**
 * @global CMain $APPLICATION
 */

global $APPLICATION;

//delayed function must return a string
if (empty($arResult))
    return "";

$strReturn = '';

/*
 *
 *
                    <div class="banner__breadcrumbs breadcrumbs">
                        <ul class="breadcrumbs__list">
                            <li class="breadcrumbs__item"><a class="breadcrumbs__link link" href="/">Главная</a></li>
                            <li class="breadcrumbs__item">Акции</li>
                        </ul>
                    </div>
 *
 *
 */

$strReturn .= '<div class="banner__breadcrumbs breadcrumbs"><ul class="breadcrumbs__list">';
$class = $APPLICATION->GetProperty("link_class");
$itemSize = count($arResult);
for ($index = 0; $index < $itemSize; $index++) {
    $title = htmlspecialcharsex($arResult[$index]["TITLE"]);

    if ($arResult[$index]["LINK"] <> "" && $index != $itemSize - 1) {
        $strReturn .= '<li class="breadcrumbs__item"><a class="breadcrumbs__link link '.$class.'" href="' . $arResult[$index]["LINK"] . '">' . $title . '</a></li>';
    } else {
        $strReturn .= '<li class="breadcrumbs__item">' . $title . '</li>';
    }
}

$strReturn .= '</ul></div>';

return $strReturn;
