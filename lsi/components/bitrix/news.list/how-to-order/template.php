<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/**
 * @var array $arResult
 */
if ($arResult["ITEMS"]): ?>
<div class="ordering-points">
	<? foreach ($arResult["ITEMS"] as $item): ?>
		<?
		$this->AddEditAction($item["ID"], $item["EDIT_LINK"], CIBlock::GetArrayByID($item["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($item["ID"], $item["DELETE_LINK"], CIBlock::GetArrayByID($item["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage("CT_BNL_ELEMENT_DELETE_CONFIRM")));
		?>
		<div class="ordering-points__column" id="<?=$this->GetEditAreaId($item['ID']);?>">
			<figure class="ordering-points__thumbnail">
				<?if($item['DETAIL_PICTURE']):?>
					<a class="ordering-points__wrapper" href="<?= $item['DETAIL_PICTURE']['SRC']?>" data-lightbox="point1">
				<?else:?>
					<picture class="ordering-points__wrapper">
				<?endif;?>
				<img src="<?= $item['PREVIEW_PICTURE']['SRC']?>" alt="<?= $item['NAME']?>" />
				<?if($item['DETAIL_PICTURE']):?>
					</a>
				<?else:?>
					</picture>
				<?endif;?>
				<figcaption class="ordering-points__caption"><?= $item['DETAIL_TEXT']?></figcaption>
			</figure>
		</div>
	<? endforeach ?>
</div>
<? endif ?>