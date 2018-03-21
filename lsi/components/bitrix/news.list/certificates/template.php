<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/**
 * @var array $arResult
 */
if ($arResult["ITEMS"]):
	$sliderClass = $arResult['CODE'] == 'certificates_company' ? 'certificates' : 'corporate'?>
<div class="certificates container" data-bem-repaced="container container_fluid_off">
	<h2 class="h2"><?= $arResult['NAME']?></h2>
	<div class="slider-<?= $sliderClass?>">
		<? foreach ($arResult["ITEMS"] as $item): ?>
			<?
			$this->AddEditAction($item["ID"], $item["EDIT_LINK"], CIBlock::GetArrayByID($item["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($item["ID"], $item["DELETE_LINK"], CIBlock::GetArrayByID($item["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage("CT_BNL_ELEMENT_DELETE_CONFIRM")));
			?>
			<a
				class="slider-<?= $sliderClass?>__item"
				id="<?=$this->GetEditAreaId($item['ID']);?>"
				href="<?= $item['DETAIL_PICTURE']['SRC']?>"
				data-lightbox="product-detail" data-title="<?= $item['NAME']?>">
				<img class="img-responsive" src="<?= $item['PREVIEW_PICTURE']['SRC']?>" alt="<?= $item['NAME']?>" />
			</a>
		<? endforeach ?>
	</div>
</div>
<? endif ?>