<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/**
 * @var array $arResult
 */
?>
<? if ($arResult["ITEMS"]): ?>
	<section class="corporate-features">
		<h2>Почему выбирают нас</h2>
		<div class="corporate-features__row">
			<? foreach ($arResult["ITEMS"] as $item): ?>
				<?
				$this->AddEditAction($item["ID"], $item["EDIT_LINK"], CIBlock::GetArrayByID($item["IBLOCK_ID"], "ELEMENT_EDIT"));
				$this->AddDeleteAction($item["ID"], $item["DELETE_LINK"], CIBlock::GetArrayByID($item["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage("CT_BNL_ELEMENT_DELETE_CONFIRM")));
				?>
				<div class="corporate-features__item" id="<?=$this->GetEditAreaId($item['ID']);?>">
					<div class="corporate-features__icon"><img src="<?= $item['PREVIEW_PICTURE']['SRC']?>" /></div>
					<div class="corporate-features__text">
						<h3 class="corporate-features__heading"><?= $item['NAME']?></h3>
						<p class="corporate-features__description"><?= $item['DETAIL_TEXT']?></p>
					</div>
				</div>
			<?endforeach;?>
		</div>
	</section>
<?endif;?>