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
$GLOBALS["COORDS"] = $arResult["ITEMS"][0]["PROPERTIES"]["COORD"]["VALUE"];
?>
<div class="content__block">
    <div class="wrapper wrapper_small">
		<? 
			$groups = [];
			foreach ($arResult["ITEMS"] as $key => $arItem) {
				$section_id = $arItem['IBLOCK_SECTION_ID'];
				$items[$section_id][$arItem['ID']] = $arItem;
				if (!empty($section_id)) {
					$section = \CIBlockSection::GetByID($section_id);
					$arSection = $section->Fetch();
					$groups[$section_id] = [
						'NAME' => $arSection['NAME'],
						'ITEMS' => $items[$section_id],
					];	
				}
			}

			foreach ($groups as $id => $group) {
				?>
				<div class="group">
					<div class="group_name"><? echo $group['NAME'];?></div>
					<div class="cities" style="display:none;">
				<? foreach ($group["ITEMS"] as $key => $arItem) { ?>
					<div id="<?= $this->GetEditAreaId($arItem['ID']); ?>"
						 class="cities__item <? if ($key == 0) { ?>cities__item_active<? } ?>"
						 data-center="[<?= $arItem["PROPERTIES"]["COORD"]["VALUE"] ?>]"
						 data-zoom="12"
						 data-text="<?= $arItem["PROPERTIES"]["SALOON_NAME"]["VALUE"] ?><br><?=$arItem["PROPERTIES"]["ADDRESS"]["VALUE"]?><br><?=$arItem["PROPERTIES"]["PHONE"]["VALUE"]?>"
					>
						<?
						$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
						$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
						?>
						<div class="cities__data">

							<? if ($arItem["PROPERTIES"]["SALOON_NAME"]["VALUE"]) { ?>
								<div class="saloon__name">
									<?= $arItem["PROPERTIES"]["SALOON_NAME"]["VALUE"] ?>
								</div>
							<? } ?>

							<? if ($arItem["PROPERTIES"]["ADDRESS"]["VALUE"]) { ?>
								<div class="cities__address">
									<?= $arItem["PROPERTIES"]["ADDRESS"]["VALUE"] ?>
								</div>
							<? } ?>
							<? if ($arItem["PROPERTIES"]["WORKTIME"]["VALUE"]) { ?>
								<div class="cities__work-time">
									<?= $arItem["PROPERTIES"]["WORKTIME"]["VALUE"] ?>
								</div>
							<? } ?> 
							<div class="cities__phone">
								<?
								$phone = str_replace(array(" ", "(", ")"), "", $arItem["PROPERTIES"]["PHONE"]["VALUE"]);
								?>
								<a href="tel:<?= $phone ?>"
								   class="link link_no-underline"><?= $arItem["PROPERTIES"]["PHONE"]["VALUE"] ?></a>
							</div>
						</div>
						<div class="cities__data">
							<? if ($arItem["PROPERTIES"]["EMAIL"]["VALUE"]) { ?>
								<div class="cities__email">
									Эл. почта: <a href="mailto:<?= $arItem["PROPERTIES"]["EMAIL"]["VALUE"] ?>"
												  class="link link_no-underline"><?= $arItem["PROPERTIES"]["EMAIL"]["VALUE"] ?></a>
								</div>
							<? } ?>
							<? if ($arItem["PROPERTIES"]["SKYPE"]["VALUE"]) { ?>
								<div class="cities__skype">
									Skype: <a href="skype:<?= $arItem["PROPERTIES"]["SKYPE"]["VALUE"] ?>"
											  class="link link_no-underline"><?= $arItem["PROPERTIES"]["SKYPE"]["VALUE"] ?></a>
								</div>
							<? } ?>
						</div>
					</div>
				<? } ?>
				</div>
				</div>
				<?
			}
		?>
    </div>
</div>
<style>
	.group
	{
		cursor: pointer;
		border: 1px solid #ccc;
		padding: 10px 10px;
		margin-bottom: -1px;
	}
	.group .cities
	{
		margin-top: 20px;
	}
	.group_name
	{
		font-weight: bold;
		font-size: 24px;
	}
	.group-active, .group:hover
	{
		border-color: #d7b740;
	}
	.group:hover + div
	{
		border-top-color: #d7b740;
	}
</style>
<script>
	$('.group .group_name').on('click', function() {
		var _self = $(this).parents('.group');
		_self.find('.cities').slideToggle('slow');
		if (_self.hasClass('group-active')) {
			_self.removeClass('group-active')
		} else {
			_self.addClass('group-active')
		}
	});
</script>