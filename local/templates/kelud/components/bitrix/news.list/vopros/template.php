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
?>
<div class="content__block wrapper content__block_indentless wrapper_small">
    <div class="faq">
        <dl class="faq__wrapper">
            <? foreach ($arResult["ITEMS"] as $key => $item) {
                $class = "";
                $classF = "";
                if ($key == 0) {
                    $class = "link_current";
                    $classF = "faq__answer_active";
                }
                ?>

                <dt class="faq__question">
                    <?
                    $this->AddEditAction($item['ID'], $item['EDIT_LINK'], CIBlock::GetArrayByID($item["IBLOCK_ID"], "ELEMENT_EDIT"));
                    $this->AddDeleteAction($item['ID'], $item['DELETE_LINK'], CIBlock::GetArrayByID($item["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                    ?>
                    <a id="<?=$this->GetEditAreaId($item['ID']);?>" href="#"
                                             class="faq__link link link_dotted <?= $class ?>"><?= $item["NAME"] ?></a>
                </dt>
                <dd class="content__text faq__answer <?= $classF ?>">
                    <?= $item["PREVIEW_TEXT"] ?>
                </dd>
            <? } ?>
        </dl>
		<div class="faq__catalog catalog">
			<?foreach($arResult["SUB_ITEMS"] as $item){?>
				<a class="catalog__item" href="<?=$item["DETAIL_PAGE_URL"]?>">
					<img class="catalog__preview lozad" data-src="<?=$item["DETAIL_PICTURE"]?>" alt="" src="<?=$item["DETAIL_PICTURE"]?>" data-loaded="true">
					<div class="catalog__title"><span><?= $item["NAME"] ?></span></div>
					<div class="catalog__price"><?= $item["PROPERTY_PRICE_VALUE"] ?> ₽</div>
				</a>				
			<?}?>
			</div>
    </div>
</div>