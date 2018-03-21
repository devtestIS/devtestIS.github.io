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

$this->setFrameMode(true);

?>
<div class="row mbl">
	<div class="col-lg-3 col-md-4 col-sm-5">
		<?
		$APPLICATION->IncludeComponent(
			"intervolga.custom:catalog.smart.filter",
			"catalog",
			array(
				"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
				"IBLOCK_ID" => $arParams["IBLOCK_ID"],
				"SECTION_ID" => $arResult["VARIABLES"]["SECTION_ID"],
				"FILTER_NAME" => $arParams["FILTER_NAME"],
				"PRICE_CODE" => $arParams["PRICE_CODE"],
				"CACHE_TYPE" => $arParams["CACHE_TYPE"],
				"CACHE_TIME" => $arParams["CACHE_TIME"],
				"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
				"SAVE_IN_SESSION" => "N",
				"FILTER_VIEW_MODE" => $arParams["FILTER_VIEW_MODE"],
				"XML_EXPORT" => "Y",
				"SECTION_TITLE" => "NAME",
				"SECTION_DESCRIPTION" => "DESCRIPTION",
				'HIDE_NOT_AVAILABLE' => $arParams["HIDE_NOT_AVAILABLE"],
				"TEMPLATE_THEME" => $arParams["TEMPLATE_THEME"],
				'CONVERT_CURRENCY' => 'N',
				'CURRENCY_ID' => $arParams['CURRENCY_ID'],
				"SEF_MODE" => $arParams["SEF_MODE"],
				"SEF_RULE" => $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["smart_filter"],
				"SMART_FILTER_PATH" => $arResult["VARIABLES"]["SMART_FILTER_PATH"],
				"PAGER_PARAMS_NAME" => $arParams["PAGER_PARAMS_NAME"],
				"INSTANT_RELOAD" => $arParams["INSTANT_RELOAD"],

				'SHOW_ALL_WO_SECTION' => 'Y',

				"SMART_FILTER_HIDE_ZIRO" => $arParams["SMART_FILTER_HIDE_ZIRO"],

				'APPROVED_PROPERTIES' => array('TIP', 'BREND_'),

				"PRE_FILTER_NAME" => $arParams["PRE_FILTER_NAME"] ?: "catalogSmartFilter"
			),
			$component,
			array('HIDE_ICONS' => 'Y')
		);
		?>
	</div>
	<div class="col-lg-9 col-md-8 col-sm-7">
		<? $resultSort = $APPLICATION->IncludeComponent(
			"intervolga.custom:catalog.sort",
			"catalog",
			array(
				"PRICE_CODE" => $arParams["PRICE_CODE"],
				"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
				"IBLOCK_ID" => $arParams["IBLOCK_ID"],
				'SECTION_CODE' => $arResult["VARIABLES"]["SECTION_CODE"],
				'SECTION_ID' => $arResult["VARIABLES"]["SECTION_ID"],
				'CURRENT_SECTION_ID' => $currentSection['ID']
			),
			$component,
			array('HIDE_ICONS' => 'Y')
		); ?>
		<? if ($_POST['ajax'] == 'Y') {
			$GLOBALS['APPLICATION']->RestartBuffer();
		} ?>
		<? $intSectionID = $APPLICATION->IncludeComponent(
			"intervolga.custom:catalog.section",
			$resultSort['VIEW_MODE'] == 'line' ? "catalog-line" : "catalog-tile",
			array(
				"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
				"IBLOCK_ID" => $arParams["IBLOCK_ID"],
				"ELEMENT_SORT_FIELD" => $resultSort['FIELD'] ?: $arParams["ELEMENT_SORT_FIELD"],
				"ELEMENT_SORT_ORDER" => $resultSort['DIRECTION'] ?: $arParams["ELEMENT_SORT_ORDER"],
				"ELEMENT_SORT_FIELD2" => $arParams["ELEMENT_SORT_FIELD2"],
				"ELEMENT_SORT_ORDER2" => $arParams["ELEMENT_SORT_ORDER2"],
				"PROPERTY_CODE" => $arParams["LIST_PROPERTY_CODE"],
				"META_KEYWORDS" => $arParams["LIST_META_KEYWORDS"],
				"META_DESCRIPTION" => $arParams["LIST_META_DESCRIPTION"],
				"BROWSER_TITLE" => $arParams["LIST_BROWSER_TITLE"],
				"SET_LAST_MODIFIED" => $arParams["SET_LAST_MODIFIED"],
				"INCLUDE_SUBSECTIONS" => $arParams["INCLUDE_SUBSECTIONS"],
				"BASKET_URL" => $arParams["BASKET_URL"],
				"ACTION_VARIABLE" => $arParams["ACTION_VARIABLE"],
				"PRODUCT_ID_VARIABLE" => $arParams["PRODUCT_ID_VARIABLE"],
				"SECTION_ID_VARIABLE" => $arParams["SECTION_ID_VARIABLE"],
				"PRODUCT_QUANTITY_VARIABLE" => $arParams["PRODUCT_QUANTITY_VARIABLE"],
				"PRODUCT_PROPS_VARIABLE" => $arParams["PRODUCT_PROPS_VARIABLE"],
				"FILTER_NAME" => $arParams["FILTER_NAME"],
				"CACHE_TYPE" => $arParams["CACHE_TYPE"],
				"CACHE_TIME" => $arParams["CACHE_TIME"],
				"CACHE_FILTER" => $arParams["CACHE_FILTER"],
				"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
				"SET_TITLE" => $arParams["SET_TITLE"],
				"MESSAGE_404" => $arParams["MESSAGE_404"],
				"SET_STATUS_404" => $arParams["SET_STATUS_404"],
				"SHOW_404" => $arParams["SHOW_404"],
				"FILE_404" => $arParams["FILE_404"],
				"DISPLAY_COMPARE" => $arParams["USE_COMPARE"],
				"PAGE_ELEMENT_COUNT" => $arParams["PAGE_ELEMENT_COUNT"],
				"LINE_ELEMENT_COUNT" => $arParams["LINE_ELEMENT_COUNT"],
				"PRICE_CODE" => $arParams["PRICE_CODE"],
				"USE_PRICE_COUNT" => $arParams["USE_PRICE_COUNT"],
				"SHOW_PRICE_COUNT" => $arParams["SHOW_PRICE_COUNT"],

				"PRICE_VAT_INCLUDE" => $arParams["PRICE_VAT_INCLUDE"],
				"USE_PRODUCT_QUANTITY" => $arParams['USE_PRODUCT_QUANTITY'],
				"ADD_PROPERTIES_TO_BASKET" => (isset($arParams["ADD_PROPERTIES_TO_BASKET"])
					? $arParams["ADD_PROPERTIES_TO_BASKET"] : ''),
				"PARTIAL_PRODUCT_PROPERTIES" => (isset($arParams["PARTIAL_PRODUCT_PROPERTIES"])
					? $arParams["PARTIAL_PRODUCT_PROPERTIES"] : ''),
				"PRODUCT_PROPERTIES" => $arParams["PRODUCT_PROPERTIES"],

				"DISPLAY_TOP_PAGER" => $arParams["DISPLAY_TOP_PAGER"],
				"DISPLAY_BOTTOM_PAGER" => $arParams["DISPLAY_BOTTOM_PAGER"],
				"PAGER_TITLE" => $arParams["PAGER_TITLE"],
				"PAGER_SHOW_ALWAYS" => $arParams["PAGER_SHOW_ALWAYS"],
				"PAGER_TEMPLATE_BEFORE" => $arParams["PAGER_TEMPLATE_BEFORE"] ?: $arParams["PAGER_TEMPLATE"],
				"PAGER_TEMPLATE_AFTER" => $arParams["PAGER_TEMPLATE_AFTER"] ?: $arParams["PAGER_TEMPLATE"],
				"PAGER_DESC_NUMBERING" => $arParams["PAGER_DESC_NUMBERING"],
				"PAGER_DESC_NUMBERING_CACHE_TIME" => $arParams["PAGER_DESC_NUMBERING_CACHE_TIME"],
				"PAGER_SHOW_ALL" => $arParams["PAGER_SHOW_ALL"],
				"PAGER_BASE_LINK_ENABLE" => $arParams["PAGER_BASE_LINK_ENABLE"],
				"PAGER_BASE_LINK" => $arParams["PAGER_BASE_LINK"],
				"PAGER_PARAMS_NAME" => $arParams["PAGER_PARAMS_NAME"],

				"OFFERS_CART_PROPERTIES" => $arParams["OFFERS_CART_PROPERTIES"],
				"OFFERS_FIELD_CODE" => $arParams["LIST_OFFERS_FIELD_CODE"],
				"OFFERS_PROPERTY_CODE" => $arParams["LIST_OFFERS_PROPERTY_CODE"],
				"OFFERS_SORT_FIELD" => $arParams["OFFERS_SORT_FIELD"],
				"OFFERS_SORT_ORDER" => $arParams["OFFERS_SORT_ORDER"],
				"OFFERS_SORT_FIELD2" => $arParams["OFFERS_SORT_FIELD2"],
				"OFFERS_SORT_ORDER2" => $arParams["OFFERS_SORT_ORDER2"],
				"OFFERS_LIMIT" => $arParams["LIST_OFFERS_LIMIT"],

				"SECTION_ID" => $arResult["VARIABLES"]["SECTION_ID"],
				"SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
				"SECTION_URL" => $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["section"],
				"DETAIL_URL" => $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["element"],
				"USE_MAIN_ELEMENT_SECTION" => $arParams["USE_MAIN_ELEMENT_SECTION"],
				'CONVERT_CURRENCY' => $arParams['CONVERT_CURRENCY'],
				'CURRENCY_ID' => $arParams['CURRENCY_ID'],
				'HIDE_NOT_AVAILABLE' => $arParams["HIDE_NOT_AVAILABLE"],

				'LABEL_PROP' => $arParams['LABEL_PROP'],
				'ADD_PICT_PROP' => $arParams['ADD_PICT_PROP'],
				'PRODUCT_DISPLAY_MODE' => $arParams['PRODUCT_DISPLAY_MODE'],

				'OFFER_ADD_PICT_PROP' => $arParams['OFFER_ADD_PICT_PROP'],
				'OFFER_TREE_PROPS' => $arParams['OFFER_TREE_PROPS'],
				'PRODUCT_SUBSCRIPTION' => $arParams['PRODUCT_SUBSCRIPTION'],
				'SHOW_DISCOUNT_PERCENT' => $arParams['SHOW_DISCOUNT_PERCENT'],
				'SHOW_OLD_PRICE' => $arParams['SHOW_OLD_PRICE'],
				'MESS_BTN_BUY' => $arParams['MESS_BTN_BUY'],
				'MESS_BTN_ADD_TO_BASKET' => $arParams['MESS_BTN_ADD_TO_BASKET'],
				'MESS_BTN_SUBSCRIBE' => $arParams['MESS_BTN_SUBSCRIBE'],
				'MESS_BTN_DETAIL' => $arParams['MESS_BTN_DETAIL'],
				'MESS_NOT_AVAILABLE' => $arParams['MESS_NOT_AVAILABLE'],

				'TEMPLATE_THEME' => (isset($arParams['TEMPLATE_THEME']) ? $arParams['TEMPLATE_THEME'] : ''),
				"ADD_SECTIONS_CHAIN" => "Y",
				'ADD_TO_BASKET_ACTION' => $basketAction,
				'SHOW_CLOSE_POPUP' => isset($arParams['COMMON_SHOW_CLOSE_POPUP'])
					? $arParams['COMMON_SHOW_CLOSE_POPUP']
					: '',
				'COMPARE_PATH' => $arResult['FOLDER'] . $arResult['URL_TEMPLATES']['compare'],
				'BACKGROUND_IMAGE' => (isset($arParams['SECTION_BACKGROUND_IMAGE'])
					? $arParams['SECTION_BACKGROUND_IMAGE']
					: ''),
				'DISABLE_INIT_JS_IN_COMPONENT' => (isset($arParams['DISABLE_INIT_JS_IN_COMPONENT'])
					? $arParams['DISABLE_INIT_JS_IN_COMPONENT'] : ''),

				'FILT_ELEMENT_CSS_CLASS_IN_ROW' => 'col-lg-4 col-md-6',
				'FILT_VIEW_FEATURES' => 'N',
				'FILT_NO_WRAP' => $_POST['ajax'],
				'AJAX_ACTION' => $_POST['action'],
				"VIEW_LABEL_COUNT" => 1,
				'VIEW_LABEL' => $arParams['VIEW_LABEL'],

				'SHOW_ALL_WO_SECTION' => 'Y',
				'BY_LINK' => 'Y'
			),
			$component
		); ?>
		<? $GLOBALS["CATALOG_CURRENT_SECTION_ID"] = $intSectionID; ?>
		<? if ($_POST['ajax'] == 'Y') {
			die;
		} ?>
	</div>
</div>

<?
$curSec = CIBlockSection::GetList(
	array("SORT"=>"ASC"),
	array("ID" => $intSectionID, "IBLOCK_ID" => $arParams["IBLOCK_ID"]),
	false,
	array('ID', 'UF_RECOMMENDATION')
)->Fetch();

$recommendation = false;
if($curSec) {
	$recommendation = $curSec['UF_RECOMMENDATION'];
}

if($recommendation) {
	$GLOBALS['filterSectionRecommendation'] = array(
		'ID' => $recommendation
	);
	$GLOBALS['sortSectionRecommendation'] = array(
		'sort' => 'ASC'
	);
	$this->SetViewTarget('catalogRecommendation');
	$APPLICATION->IncludeComponent(
		"intervolga.custom:catalog.section.list",
		"recommendation",
		array(
			"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
			"IBLOCK_ID" => $arParams["IBLOCK_ID"],
			"CACHE_TYPE" => $arParams["CACHE_TYPE"],
			"CACHE_TIME" => $arParams["CACHE_TIME"],
			"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
			"COUNT_ELEMENTS" => $arParams["COUNT_ELEMENTS"],
			"TOP_DEPTH" => 0,
			"SECTION_URL" => $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["section"],
			"VIEW_MODE" => $arParams["SECTIONS_VIEW_MODE"],
			"SHOW_PARENT_NAME" => $arParams["SECTIONS_SHOW_PARENT_NAME"],
			"HIDE_SECTION_NAME" => (isset($arParams["SECTIONS_HIDE_SECTION_NAME"])
				? $arParams["SECTIONS_HIDE_SECTION_NAME"] : "N"),
			"ADD_SECTIONS_CHAIN" => (isset($arParams["ADD_SECTIONS_CHAIN"]) ? $arParams["ADD_SECTIONS_CHAIN"] : ''),
			"COUNT_SECTIONS" => 6,
			'FILTER_NAME' => 'filterSectionRecommendation',
			'SORT_NAME' => 'sortSectionRecommendation',
		),
		$component
	);
	$this->EndViewTarget();
}
?>
