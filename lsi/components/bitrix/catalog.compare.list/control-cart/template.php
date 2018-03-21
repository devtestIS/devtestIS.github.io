<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
	die();
}
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

$itemCount = count($arResult["ITEMS"]);
$idCompareCount = 'compareList' . $this->randString();
$obCompare = 'ob' . $idCompareCount;
$isAjax = (
	isset($_REQUEST["ajax_action"])
	&& $_REQUEST["ajax_action"] == "Y"
	&& isset($_REQUEST["obCompare"])
	&& $_REQUEST["obCompare"] == $obCompare
);
$inCompare = false;
if(preg_match('/([^?]+)/', $arParams["COMPARE_URL"], $matches)){
	if($matches[1] == $GLOBALS['APPLICATION']->GetCurPage()){
		$inCompare = true;
	}
}
?>
<div id="<? echo $idCompareCount; ?>">
	<?
	$frame = $this->createFrame()->begin();
	if ($isAjax) {
		$APPLICATION->RestartBuffer();
	} ?>
	<a class="btn btn-default control-cart__btn control-cart__btn_type_comparison <? if ($itemCount <= 0) { ?>disabled<? } ?>"
	   href="<?=$arParams["COMPARE_URL"]?>" <? if ($itemCount <= 0 || $inCompare) { ?>onclick="return false;" <? } ?> target="_blank">
		<span class="span hidden-xs hidden-sm hidden-md"><?=GetMessage('CP_BCCL_TPL_MESS_COMPARE_PAGE')?> </span><? if ($itemCount > 0) { ?>
			<span class="btn__count"><?=$itemCount?></span><? } ?>
	</a>
	<?if(!empty($arResult["ITEMS"])):?>
		<div class="popup-header">
			<div class="popup-header__inner">
				<div class="popup-header__body">
					<?foreach ($arResult["ITEMS"] as $arItem):?>
						<div class="teaser-product">
							<div class="teaser-product__image"><a href="<?= $arItem['DETAIL_PAGE_URL']?>"><img src="<?= $arItem["DETAIL_PICTURE"]["SRC"]?>" alt="<?= $arItem["NAME"]?>" title="<?= $arItem["NAME"]?>" /></a></div>
							<div class="teaser-product__body"><a class="teaser-product__title" href="<?= $arItem['DETAIL_PAGE_URL']?>"><?= $arItem['NAME']?></a>
								<div class="teaser-product__price"><span class="span"><?= $arItem["PRINT_DISCOUNT_PRICE"]?></span><?= $arItem["PRINT_DISCOUNT_PRICE"]!= $arItem["PRINT_PRICE"]? "<span class=\"span old\">".$arItem["PRINT_PRICE"]."</span>" : ""?></div>
							</div>
							<div class="teaser-product__close"><i data-compare-remove="<?= $arItem["DETAIL_PAGE_URL"]."?action=DELETE_FROM_COMPARE_LIST&id=".$arItem["ID"]."&ajax_action=Y"?>" class="fa fa-times-circle"></i></div>
						</div>
					<?endforeach;?>
				</div>
				<div class="popup-header__footer">
					<div class="popup-header__total">
						<span class="span">Итого: </span>
						<b><?= $arResult["TOTAL_DISCOUNT_PRICE"]?></b>
						<?= $arResult["TOTAL_PRICE"] != $arResult["TOTAL_DISCOUNT_PRICE"] ? "<span class='span old'>".$arResult["TOTAL_PRICE"]."</span>" : "" ?>
					</div>
					<a class="btn btn-primary btn-block" role="button" href="<?=$arParams['COMPARE_URL']?>">Перейти к сравнению</a>
				</div>
			</div>
		</div>
	<?endif;?>
	<?
	if ($isAjax) {
		die();
	}
	?>
	<script>
		function initAdd2Compare(){
			<?
			foreach ($arResult["ITEMS"] as $item) {
			?>
			$('[data-action="ADD2COMPARE"][data-rel$="<?=$arParams['ACTION_VARIABLE']?>=ADD_TO_COMPARE_LIST&<?=$arParams['PRODUCT_ID_VARIABLE']?>=<?=$item["ID"]?>&ajax_action=Y"]').each(function(){
				switchAdd2CompareButton(this, false);
				$(this).removeClass('disabled');
			});
			<?
			}
			?>
			$('[data-action="ADD2COMPARE"][data-rel]').removeClass('disabled');
		}
		$(initAdd2Compare);
	</script>
	<?
	$frame->beginStub();
	?>
	<a class="btn btn-default control-cart__btn control-cart__btn_type_comparison disabled"
		href="<?=$arParams["COMPARE_URL"]?>" onclick="return false;" target="_blank">
		<span class="span hidden-xs hidden-sm hidden-md"><?=GetMessage('CP_BCCL_TPL_MESS_COMPARE_PAGE')?> </span>
	</a>
	<?
	$frame->end();
	?>
</div>
<?
$currentPath = CHTTP::urlDeleteParams(
	$APPLICATION->GetCurPageParam(),
	array(
		$arParams['PRODUCT_ID_VARIABLE'],
		$arParams['ACTION_VARIABLE'],
		'ajax_action'
	),
	array("delete_system_params" => true)
);

$jsParams = array(
	'VISUAL' => array(
		'ID' => $idCompareCount,
	),
	'AJAX' => array(
		'url' => $currentPath,
		'params' => array(
			'ajax_action' => 'Y',
			'obCompare' => $obCompare
		),
		'templates' => array(
			'delete' => (strpos($currentPath, '?') === false ? '?'
					: '&') . $arParams['ACTION_VARIABLE'] . '=DELETE_FROM_COMPARE_LIST&' . $arParams['PRODUCT_ID_VARIABLE'] . '='
		)
	),
	'POSITION' => array(
		'fixed' => $arParams['POSITION_FIXED'] == 'Y',
		'align' => array(
			'vertical' => $arParams['POSITION'][0],
			'horizontal' => $arParams['POSITION'][1]
		)
	)
);
?>
<script type="text/javascript">
	var <?=$obCompare?> =
	new JCCatalogCompareList(<? echo CUtil::PhpToJSObject($jsParams, false, true); ?>);
	bx_compare.push(<?=$obCompare?>);
</script>