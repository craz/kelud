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
$summ = 0;
?><div class="content__block wrapper wrapper_small">
    <div class="checkout-list">
        <? foreach ($arResult["ITEMS"] as $item) { 

			$price = str_replace(" ","",$item["PROPERTIES"]["PRICE"]["VALUE"]);
			$summ += ($price* $item["CART"]->count)

			?>
            <div class="checkout-list__item checkout-item" data-id="<?=$item["ID"]?>">
                <img class="checkout-item__image lozad" data-src="<?= $item["DETAIL_PICTURE"]["SRC"] ?>"
                     alt="">
                <div class="checkout-item__info">
                    <h3 class="checkout-item__title"><a class="link" href="#"><?= $item["NAME"] ?></a></h3>
                    <div class="checkout-item__price"><?= $item["PROPERTIES"]["PRICE"]["VALUE"] ?></div>
                </div>
                <input class="checkout-item__count" type="number" min="1" value="<?= $item["CART"]->count ?>">
                <button class="checkout-item__remove">
                    <svg class="checkout-item__icon">
                        <use href="<?= SITE_TEMPLATE_PATH ?>/styles/icons.svg#outline-close"/>
                    </svg>
                </button>
            </div>
        <? }
		$summ = number_format($summ, 0, ',', ' ');
		 ?>
			<div class="checkout-list__sum">
				<span style="font-weight:  normal">Общая сумма:</span> <?=$summ?>
			</div>
    </div>
</div>