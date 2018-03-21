<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/**
 * @var array $arResult
 * @var array $arParams
 */
?>
<? if ($arResult["ITEMS"]): ?>
	<main class="box-shadow">
		<? foreach ($arResult["ITEMS"] as $item): ?>
			<?
			$this->AddEditAction($item["ID"], $item["EDIT_LINK"], CIBlock::GetArrayByID($item["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($item["ID"], $item["DELETE_LINK"], CIBlock::GetArrayByID($item["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage("CT_BNL_ELEMENT_DELETE_CONFIRM")));
			?>
			<section class="section-collapse" id="<?=$this->GetEditAreaId($item['ID']);?>">
				<a class="section-collapse__title" href="#collapsed<?= $item['ID']?>" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="collapsed1"><?= $item['NAME']?></a>
				<div class="section-collapse__text collapse" id="collapsed<?= $item['ID']?>" role="tabpanel" aria-expanded="false">
					<div class="section-collapse__container">
						<?= $item['DETAIL_TEXT']?>
					</div>
				</div>
			</section>
		<?endforeach;?>
	</main>
	<? if ($arParams["DISPLAY_BOTTOM_PAGER"]): ?>
		<?= $arResult["NAV_STRING"] ?>
	<? endif ?>
<?endif;?>