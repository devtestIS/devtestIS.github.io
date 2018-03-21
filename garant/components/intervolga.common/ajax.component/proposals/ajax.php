<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/**
 * @var array $arParams
 * @var array $arResult
 */
?>
<? if ($arParams["TITLE"]): ?>
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h4 class="modal-title" id="<?=$arResult["ID"]?>Label"><?=$arParams["TITLE"]?></h4>
	</div>
<? endif ?>
<div class="modal-body">
	<?$APPLICATION->IncludeComponent(
		$arParams["COMPONENT"],
		$arResult['TEMPLATE'],
		$arResult["INNER_PARAMS"],
		$component
	);?>
</div>