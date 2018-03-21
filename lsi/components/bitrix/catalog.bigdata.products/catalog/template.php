<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
	die();
}
/** @var CBitrixComponentTemplate $this */
/** @var array $arParams */
/** @var array $arResult */
/** @global CDatabase $DB */
/** @global CMain $APPLICATION */

$frame = $this->createFrame()->begin("");

$templateData = array(
	'TEMPLATE_THEME' => $this->GetFolder() . '/themes/' . $arParams['TEMPLATE_THEME'] . '/style.css',
	'TEMPLATE_CLASS' => 'bx_' . $arParams['TEMPLATE_THEME']
);

$injectId = $arParams['UNIQ_COMPONENT_ID'];

if (isset($arResult['REQUEST_ITEMS'])) {
	// code to receive recommendations from the cloud
	CJSCore::Init(array('ajax'));

	// component parameters
	$signer = new \Bitrix\Main\Security\Sign\Signer;
	$signedParameters = $signer->sign(
		base64_encode(serialize($arResult['_ORIGINAL_PARAMS'])),
		'bx.bd.products.recommendation'
	);
	$signedTemplate = $signer->sign($arResult['RCM_TEMPLATE'], 'bx.bd.products.recommendation');

	?>

	<div id="<?=$injectId?>"></div>

	<script type="text/javascript">
		BX.ready(function () {
			bx_rcm_get_from_cloud(
				'<?=CUtil::JSEscape($injectId)?>',
				<?=CUtil::PhpToJSObject($arResult['RCM_PARAMS'])?>,
				{
					'parameters': '<?=CUtil::JSEscape($signedParameters)?>',
					'template': '<?=CUtil::JSEscape($signedTemplate)?>',
					'site_id': '<?=CUtil::JSEscape(SITE_ID)?>',
					'rcm': 'yes'
				}
			);
		});
	</script>
	<?
	$frame->end();

	return;

	// \ end of the code to receive recommendations from the cloud
}


// regular template then
// if customized template, for better js performance don't forget to frame content with <span id="{$injectId}_items">...</span> 

if (!empty($arResult['ITEMS'])) {
	?>

	<div id="<?=$injectId?>_items">

		<script type="text/javascript">
			BX.message({
				CBD_MESS_BTN_BUY: '<? echo('' != $arParams['MESS_BTN_BUY'] ? CUtil::JSEscape($arParams['MESS_BTN_BUY'])
					: GetMessageJS('CVP_TPL_MESS_BTN_BUY')); ?>',
				CBD_MESS_BTN_ADD_TO_BASKET: '<? echo('' != $arParams['MESS_BTN_ADD_TO_BASKET'] ? CUtil::JSEscape(
					$arParams['MESS_BTN_ADD_TO_BASKET']
				) : GetMessageJS('CVP_TPL_MESS_BTN_ADD_TO_BASKET')); ?>',
				CBD_MESS_BTN_DETAIL: '<? echo('' != $arParams['MESS_BTN_DETAIL'] ? CUtil::JSEscape(
					$arParams['MESS_BTN_DETAIL']
				) : GetMessageJS('CVP_TPL_MESS_BTN_DETAIL')); ?>',
				CBD_MESS_NOT_AVAILABLE: '<? echo('' != $arParams['MESS_BTN_DETAIL'] ? CUtil::JSEscape(
					$arParams['MESS_BTN_DETAIL']
				) : GetMessageJS('CVP_TPL_MESS_BTN_DETAIL')); ?>',
				CBD_BTN_MESSAGE_BASKET_REDIRECT: '<? echo GetMessageJS('CVP_CATALOG_BTN_MESSAGE_BASKET_REDIRECT'); ?>',
				CBD_BASKET_URL: '<? echo $arParams["BASKET_URL"]; ?>',
				CBD_ADD_TO_BASKET_OK: '<? echo GetMessageJS('CVP_ADD_TO_BASKET_OK'); ?>',
				CBD_TITLE_ERROR: '<? echo GetMessageJS('CVP_CATALOG_TITLE_ERROR') ?>',
				CBD_TITLE_BASKET_PROPS: '<? echo GetMessageJS('CVP_CATALOG_TITLE_BASKET_PROPS') ?>',
				CBD_TITLE_SUCCESSFUL: '<? echo GetMessageJS('CVP_ADD_TO_BASKET_OK'); ?>',
				CBD_BASKET_UNKNOWN_ERROR: '<? echo GetMessageJS('CVP_CATALOG_BASKET_UNKNOWN_ERROR') ?>',
				CBD_BTN_MESSAGE_SEND_PROPS: '<? echo GetMessageJS('CVP_CATALOG_BTN_MESSAGE_SEND_PROPS'); ?>',
				CBD_BTN_MESSAGE_CLOSE: '<? echo GetMessageJS('CVP_CATALOG_BTN_MESSAGE_CLOSE') ?>'
			});
		</script>
		<?
		$GLOBALS['arFilterBigData'] = array(
			'ID' => array_keys($arResult['ITEMS'])
		);
		?>
		<?$APPLICATION->IncludeComponent(
			"bitrix:catalog.section",
			"catalog-tile",
			array(
				"ACTION_VARIABLE" => "action",
				"ADD_PICT_PROP" => "-",
				"ADD_PROPERTIES_TO_BASKET" => "Y",
				"ADD_SECTIONS_CHAIN" => "N",
				"ADD_TO_BASKET_ACTION" => "ADD",
				"AJAX_MODE" => "N",
				"AJAX_OPTION_ADDITIONAL" => "",
				"AJAX_OPTION_HISTORY" => "N",
				"AJAX_OPTION_JUMP" => "N",
				"AJAX_OPTION_STYLE" => "N",
				"BACKGROUND_IMAGE" => "-",
				"BASKET_URL" => "/personal/basket.php",
				"BROWSER_TITLE" => "-",
				"CACHE_FILTER" => "N",
				"CACHE_GROUPS" => "Y",
				"CACHE_TIME" => "36000000",
				"CACHE_TYPE" => "A",
				"CONVERT_CURRENCY" => "Y",
				"CURRENCY_ID" => "RUB",
				"DETAIL_URL" => "",
				"DISABLE_INIT_JS_IN_COMPONENT" => "Y",
				"DISPLAY_BOTTOM_PAGER" => "N",
				"DISPLAY_TOP_PAGER" => "N",
				"ELEMENT_SORT_FIELD" => "sort",
				"ELEMENT_SORT_FIELD2" => "id",
				"ELEMENT_SORT_ORDER" => "asc",
				"ELEMENT_SORT_ORDER2" => "desc",
				"HIDE_NOT_AVAILABLE" => "N",
				"IBLOCK_ID" => IBLOCK_ID_CATALOG,
				"IBLOCK_TYPE" => IBLOCK_TYPE_CATALOG,
				"INCLUDE_SUBSECTIONS" => "Y",
				"LABEL_PROP" => "-",
				"LINE_ELEMENT_COUNT" => "3",
				"MESSAGE_404" => "",
				"MESS_BTN_ADD_TO_BASKET" => "В корзину",
				"MESS_BTN_BUY" => "Купить",
				"MESS_BTN_DETAIL" => "Подробнее",
				"MESS_BTN_SUBSCRIBE" => "Подписаться",
				"MESS_NOT_AVAILABLE" => "Под заказ",
				"META_DESCRIPTION" => "-",
				"META_KEYWORDS" => "-",
				"OFFERS_LIMIT" => "5",
				"PAGER_BASE_LINK_ENABLE" => "N",
				"PAGER_DESC_NUMBERING" => "N",
				"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
				"PAGER_SHOW_ALL" => "N",
				"PAGER_SHOW_ALWAYS" => "N",
				"PAGER_TEMPLATE" => ".default",
				"PAGER_TITLE" => "Товары",
				"PAGE_ELEMENT_COUNT" => "16",
				"PARTIAL_PRODUCT_PROPERTIES" => "Y",
				"PRICE_CODE" => \Intervolga\Custom\Product::getAllPriceCode(),
				"PRICE_VAT_INCLUDE" => "Y",
				"PRODUCT_ID_VARIABLE" => "id",
				"PRODUCT_PROPERTIES" => array(),
				"PRODUCT_PROPS_VARIABLE" => "prop",
				"PRODUCT_QUANTITY_VARIABLE" => "",
				"PRODUCT_SUBSCRIPTION" => "N",
				"PROPERTY_CODE" => array("", ""),
				"SECTION_CODE" => "",
				"SECTION_ID" => "",
				"SECTION_ID_VARIABLE" => "SECTION_ID",
				"SECTION_URL" => "",
				"SECTION_USER_FIELDS" => array("", ""),
				"SEF_MODE" => "N",
				"SET_BROWSER_TITLE" => "N",
				"SET_LAST_MODIFIED" => "N",
				"SET_META_DESCRIPTION" => "Y",
				"SET_META_KEYWORDS" => "N",
				"SET_STATUS_404" => "N",
				"SET_TITLE" => "N",
				"SHOW_404" => "N",
				"SHOW_ALL_WO_SECTION" => "Y",
				"SHOW_CLOSE_POPUP" => "N",
				"SHOW_DISCOUNT_PERCENT" => "Y",
				"SHOW_OLD_PRICE" => "Y",
				"SHOW_PRICE_COUNT" => "1",
				"TEMPLATE_THEME" => "blue",
				"USE_MAIN_ELEMENT_SECTION" => "N",
				"USE_PRICE_COUNT" => "N",
				"USE_PRODUCT_QUANTITY" => "N",
				"FILTER_NAME" => "arFilterBigData",
				'FILT_ELEMENT_CSS_CLASS_IN_ROW' => 'col-lg-3 col-sm-6',
				'FILT_ELEMENT_CSS_CLASS' => 'card-product_no-shadow',
				'FILT_VIEW_FEATURES' => 'N',
				'CUSTOM_CURRENT_PAGE' => '/',
				'DISPLAY_COMPARE' => 'Y'
			),
			NULL,
			array('HIDE_ICONS' => 'Y')
		);?>
	</div>
	<?
}

$frame->end();