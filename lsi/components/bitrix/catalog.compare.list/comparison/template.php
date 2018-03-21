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

$itemCount = count($arResult);
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
		$frame = $this->createFrame()->begin('');
		if ($isAjax) {
			$APPLICATION->RestartBuffer();
		}
		if ($itemCount > 0) {
			?>
			<a class="comparison-btn" href="<?=$arParams["COMPARE_URL"]?>" target="_blank" <? if ($inCompare) { ?>onclick="return false;" <? } ?>>
				<img class="img comparison-btn__img" src="<?=SITE_TEMPLATE_PATH?>/images/control/comparison_white.png"
				     alt="<?=GetMessage('CP_BCCL_TPL_MESS_COMPARE_PAGE')?>"
				     title="<?=GetMessage('CP_BCCL_TPL_MESS_COMPARE_PAGE')?>"/>
				(<?=$itemCount?>)
			</a>
			<?
		}
		if ($isAjax) {
			die();
		}
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
	var <? echo $obCompare; ?> =
	new JCCatalogCompareList(<? echo CUtil::PhpToJSObject($jsParams, false, true); ?>);
	bx_compare.push(<?=$obCompare?>);
</script>
