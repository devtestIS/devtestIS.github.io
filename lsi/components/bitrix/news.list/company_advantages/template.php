<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/**
 * @var array $arResult
 */
?>
<? if ($arResult["ITEMS"]): ?>
	<div class="features">
		<? foreach ($arResult["ITEMS"] as $item): ?>
			<?
			$this->AddEditAction($item["ID"], $item["EDIT_LINK"], CIBlock::GetArrayByID($item["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($item["ID"], $item["DELETE_LINK"], CIBlock::GetArrayByID($item["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage("CT_BNL_ELEMENT_DELETE_CONFIRM")));
			?>
			<div class="features__item" id="<?=$this->GetEditAreaId($item['ID']);?>">
				<div class="features__icon"><img src="<?= $item['PREVIEW_PICTURE']['SRC']?>" /></div>
				<h3 class="features__heading"><?= $item['NAME']?></h3>
				<p class="features__description"><?= $item['DETAIL_TEXT']?></p>
			</div>
		<?endforeach;?>
		<img class="worker" src="<?= SITE_TEMPLATE_PATH?>/images/company/man.png" alt="worker" />
	</div>
<?endif;?>