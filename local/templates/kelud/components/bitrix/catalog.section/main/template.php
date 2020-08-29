<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use \Bitrix\Main\Localization\Loc;

/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 * @var CatalogSectionComponent $component
 * @var CBitrixComponentTemplate $this
 * @var string $templateName
 * @var string $componentPath
 */

$this->setFrameMode(true);
$this->addExternalCss('/bitrix/css/main/bootstrap.css');
?>
<? $this->SetViewTarget('section_list'); ?>
<ul class="banner__menu banner-menu banner-menu_light">
    <li class="banner-menu__item banner-menu__item_current">Журнальные столы<sup>100</sup></li>
    <li class="banner-menu__item"><a class="banner-menu__link" href="#"><span>Большие столы</span><sup>45</sup></a></li>
    <li class="banner-menu__item"><a class="banner-menu__link" href="#"><span>Консоли</span><sup>145</sup></a></li>
    <li class="banner-menu__item"><a class="banner-menu__link" href="#"><span>Кубы</span><sup>5</sup></a></li>
    <li class="banner-menu__item"><a class="banner-menu__link" href="#"><span>Домашний декор</span><sup>90</sup></a></li>
    <li class="banner-menu__item"><a class="banner-menu__link" href="#"><span>Шары</span><sup>50</sup></a></li>
    <li class="banner-menu__item"><a class="banner-menu__link" href="#"><span>Подстолья</span><sup>40</sup></a></li>
</ul>
<? $this->EndViewTarget()?>
<div class="content__block wrapper wrapper_small">
    <div class="market">
        <div class="market__wrapper">
            <div class="market__sorting">
                <a class="market__sort m-sort" href="#" data-sort-by="popular">
                    по популярности
                    <div class="m-sort__order">
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                </a>
                <a class="market__sort m-sort" href="#" data-sort-by="price">
                    по цене
                    <div class="m-sort__order">
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                </a>
                <a class="market__sort m-sort" href="#" data-sort-by="new">
                    по новизне
                    <div class="m-sort__order">
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                </a>
            </div>
            <div class="market__catalog catalog">
                <div class="catalog__list">
                    <a class="catalog__item" href="#">
                        <div class="catalog__out-stock"><span>под заказ</span></div>
                        <img class="catalog__preview lozad" data-src="<?=SITE_TEMPLATE_PATH?>/images/preview_1.jpg" alt="">
                        <div class="catalog__title"><span>Журнальный стол 3172</span></div>
                        <div class="catalog__price">140 000 ₽</div>
                    </a>
                    <a class="catalog__item" href="#">
                        <div class="catalog__out-stock"><span>под заказ</span></div>
                        <img class="catalog__preview lozad" data-src="<?=SITE_TEMPLATE_PATH?>/images/preview_2.jpg" alt="">
                        <div class="catalog__title"><span>Журнальный стол 3173</span></div>
                        <div class="catalog__price">1 000 000 ₽</div>
                    </a>
                    <a class="catalog__item" href="#">
                        <div class="catalog__out-stock"><span>под заказ</span></div>
                        <img class="catalog__preview lozad" data-src="<?=SITE_TEMPLATE_PATH?>/images/preview_3.jpg" alt="">
                        <div class="catalog__title"><span>Журнальный стол 3174</span></div>
                        <div class="catalog__price">99 000 ₽</div>
                    </a>
                    <a class="catalog__item" href="#">
                        <img class="catalog__preview lozad" data-src="<?=SITE_TEMPLATE_PATH?>/images/preview_4.jpg" alt="">
                        <div class="catalog__title"><span>Журнальный стол 3175</span></div>
                        <div class="catalog__price">167 000 ₽</div>
                    </a>
                    <a class="catalog__item" href="#">
                        <img class="catalog__preview lozad" data-src="<?=SITE_TEMPLATE_PATH?>/images/preview_5.jpg" alt="">
                        <div class="catalog__title"><span>Журнальный стол 3176</span></div>
                        <div class="catalog__price">300 000 ₽</div>
                    </a>
                    <div class="catalog__item catalog__item_tip">
                        <img class="catalog__image" src="<?=SITE_TEMPLATE_PATH?>/styles/images/logo_mobile.svg" alt="">
                        <div class="catalog__tip"><!-- TEXT -->Вся продукция создаётся исключительно вручную индонезийскими мастерами, где секреты работы своего ремесла передаются из&nbsp;поколения в&nbsp;поколение<!-- /TEXT --></div>
                    </div>
                    <a class="catalog__item" href="#">
                        <img class="catalog__preview lozad" data-src="<?=SITE_TEMPLATE_PATH?>/images/preview_1.jpg" alt="">
                        <div class="catalog__title"><span>Журнальный стол 3172</span></div>
                        <div class="catalog__price">140 000 ₽</div>
                    </a>
                    <a class="catalog__item" href="#">
                        <img class="catalog__preview lozad" data-src="<?=SITE_TEMPLATE_PATH?>/images/preview_2.jpg" alt="">
                        <div class="catalog__title"><span>Журнальный стол 3173</span></div>
                        <div class="catalog__price">1 000 000 ₽</div>
                    </a>
                    <a class="catalog__item" href="#">
                        <img class="catalog__preview lozad" data-src="<?=SITE_TEMPLATE_PATH?>/images/preview_3.jpg" alt="">
                        <div class="catalog__title"><span>Журнальный стол 3174</span></div>
                        <div class="catalog__price">99 000 ₽</div>
                    </a>
                    <div class="catalog__item catalog__item_tip">
                        <img class="catalog__image" src="<?=SITE_TEMPLATE_PATH?>/styles/images/logo_mobile.svg" alt="">
                        <div class="catalog__tip"><!-- TEXT -->Вся продукция создаётся исключительно вручную индонезийскими мастерами, где секреты работы своего ремесла передаются из&nbsp;поколения в&nbsp;поколение<!-- /TEXT --></div>
                    </div>
                    <a class="catalog__item" href="#">
                        <img class="catalog__preview lozad" data-src="<?=SITE_TEMPLATE_PATH?>/images/preview_4.jpg" alt="">
                        <div class="catalog__title"><span>Журнальный стол 3175</span></div>
                        <div class="catalog__price">167 000 ₽</div>
                    </a>
                    <a class="catalog__item" href="#">
                        <img class="catalog__preview lozad" data-src="<?=SITE_TEMPLATE_PATH?>/images/preview_5.jpg" alt="">
                        <div class="catalog__title"><span>Журнальный стол 3176</span></div>
                        <div class="catalog__price">300 000 ₽</div>
                    </a>
                </div>
            </div>
        </div>
        <form class="market__filters" action="" method="POST">
            <input type="hidden" name="sort_by" value="popular">
            <input type="hidden" name="sort_order" value="asc">
            <div class="market__filter m-filter">
                <h3 class="m-filter__title">Цена</h3>
                <div class="m-filter__price m-price">
                    <div class="m-price__wrapper">
                        <div class="m-price__from">от <span></span> ₽</div>
                        <div class="m-price__to">до <span></span> ₽</div>
                    </div>
                    <div class="m-price__slider" data-min="50000" data-max="1500000" data-step="10000"></div>
                    <input type="hidden" name="price" value="">
                </div>
            </div>
            <div class="market__filter m-filter">
                <label class="m-filter__item">
                    <input type="checkbox">
                    В наличии
                </label>
            </div>
            <div class="market__filter m-filter">
                <h3 class="m-filter__title">Цвет</h3>
                <div class="m-colors">
                    <label class="m-colors__item m-colors__item_active" style="background-color: #D7CCC8;">
                        <input class="m-colors__input visuallyhidden" type="radio" name="color" value="#D7CCC8" checked>
                    </label>
                    <label class="m-colors__item" style="background-color: #A1887F;">
                        <input class="m-colors__input visuallyhidden" type="radio" name="color" value="#A1887F">
                    </label>
                    <label class="m-colors__item" style="background-color: #6D4C41;">
                        <input class="m-colors__input visuallyhidden" type="radio" name="color" value="#6D4C41">
                    </label>
                    <label class="m-colors__item" style="background-color: #212121;">
                        <input class="m-colors__input visuallyhidden" type="radio" name="color" value="#212121">
                    </label>
                    <label class="m-colors__item" style="background-color: #616161;">
                        <input class="m-colors__input visuallyhidden" type="radio" name="color" value="#616161">
                    </label>
                    <label class="m-colors__item" style="background-color: #FFE57F;">
                        <input class="m-colors__input visuallyhidden" type="radio" name="color" value="#FFE57F">
                    </label>
                </div>
            </div>
            <div class="market__filter m-filter">
                <h3 class="m-filter__title">Обработка краёв</h3>
                <label class="m-filter__item">
                    <input type="checkbox">
                    Естественная
                </label>
                <label class="m-filter__item">
                    <input type="checkbox">
                    Естественная заполированная
                </label>
                <label class="m-filter__item">
                    <input type="checkbox">
                    Ровный край
                </label>
            </div>
            <div class="market__filter m-filter">
                <h3 class="m-filter__title">Форма</h3>
                <label class="m-filter__item">
                    <input type="checkbox">
                    Овальная
                </label>
                <label class="m-filter__item">
                    <input type="checkbox">
                    Круглая
                </label>
                <label class="m-filter__item">
                    <input type="checkbox">
                    Квадратная
                </label>
                <label class="m-filter__item">
                    <input type="checkbox">
                    Прямоугольная
                </label>
            </div>
        </form>
    </div>
</div>