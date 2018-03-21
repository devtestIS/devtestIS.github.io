<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/**
 * @var array $arParams
 * @var array $arResult
 */
?>
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
</div>
<?$APPLICATION->IncludeComponent(
	$arParams["COMPONENT"],
	$arResult['TEMPLATE'],
	$arResult["INNER_PARAMS"],
	$component
);?>
