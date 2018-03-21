<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
	die();
}
use Intervolga\Custom\SiteTools;

define('TEMPLATE_COUNT_FEATURES', 5);
define('TEMPLATE_MAX_COUNT_IN_NORMAL_NUMBER', 6);

$arResult['CAN_BUY_BRAND_TOOLTIP'] = SiteTools::makeBrandTooltip();
$stores = \Intervolga\Custom\Product::getStores();
$storesXmlIds = array();
foreach ($stores as $store){
	$storesXmlIds = array_merge($storesXmlIds, $store['STORE']);
}

$productIds = array();
foreach ($arResult["ITEMS"] as $item) {
	$productIds[] = $item['ID'];
}
$productStoresDB = \Bitrix\Sale\Internals\StoreProductTable::getList(
	array(
		'filter' => array(
			'PRODUCT_ID' => $productIds,
			'STORE.XML_ID' => $storesXmlIds
		),
		'runtime' => array(
			new \Bitrix\Main\Entity\ReferenceField(
				'STORE',
				'Bitrix\Catalog\StoreTable',
				array('=this.STORE_ID' => 'ref.ID')
			),
			new \Bitrix\Main\Entity\ExpressionField('CNT', 'SUM(AMOUNT)')
		),
		'select' => array(
			'PRODUCT_ID',
			'CNT'
		),
		'group' => array(
			'PRODUCT_ID'
		)
	)
);
$productStores = array();
while($el = $productStoresDB->fetch()){
	$productStores[$el['PRODUCT_ID']] = $el['CNT'];
}

$oldPrices = array();
$db_res = CPrice::GetList(
	array(),
	array(
		"PRODUCT_ID" => $productIds,
		"CATALOG_GROUP_ID" => PRICE_TYPE_OLD
	)
);
while($ar_res = $db_res->Fetch()) {
	$oldPrices[$ar_res['PRODUCT_ID']] = $ar_res;
}

$arParams['VIEW_LABEL'] = $arParams['VIEW_LABEL'] ?: array();
if(!is_array($arParams['VIEW_LABEL'])) {
	$arParams['VIEW_LABEL'] = array($arParams['VIEW_LABEL']);
}

foreach ($arResult["ITEMS"] as &$item) {
	$item['COUNT'] = $productStores[$item['ID']] ?: 0;
	$item['RATE'] = \Intervolga\Custom\Product::getRate($item['ID']);
	$item['PREVIEW_PICTURE'] = $item["DETAIL_PICTURE"];
	if ($item["PREVIEW_PICTURE"]) {
		$item['PREVIEW_PICTURE'] = resizeImageIV(
			is_array($item["PREVIEW_PICTURE"]) ? $item["PREVIEW_PICTURE"]['ID'] : $item["PREVIEW_PICTURE"],
			array(
				'width' => 215,
				'height' => 185,
				'resize_type' => BX_RESIZE_IMAGE_PROPORTIONAL,
				'permit_extensions' => true
			)
		);
	}

	$item['SHOWCASE'] = \Intervolga\Custom\Product::getShowCase($item, TEMPLATE_COUNT_FEATURES);

	if(floatval($oldPrices[$item['ID']]['PRICE']) > floatval($item["MIN_PRICE"]["VALUE"])) {
		$item["MIN_PRICE"]["VALUE"] = $oldPrices[$item['ID']]["PRICE"];
	}

	if (in_array(USER_GROUP_ID_RETAIL, $GLOBALS['USER']->GetUserGroupArray())) {
		$item['CAN_BUY'] = false;
	}

	$item['MIN_PRICE']['PRINT_VALUE'] = \CCurrencyLang::CurrencyFormat(
		round($item['MIN_PRICE']['VALUE']),
		$item['MIN_PRICE']["CURRENCY"],
		true
	);
	$item['MIN_PRICE']['PRINT_DISCOUNT_VALUE'] = \CCurrencyLang::CurrencyFormat(
		round($item['MIN_PRICE']['DISCOUNT_VALUE']),
		$item['MIN_PRICE']["CURRENCY"],
		true
	);

	$item['LABELS'] = array(
		'SEASON' => array(
			'VIEW' => in_array('SEASON', $arParams['VIEW_LABEL'])
				&& ($item['PROPERTIES']['TOVAR_SEZONA_']['VALUE_XML_ID'] == 'true'
					||$item['PROPERTIES']['TOVAR_SEZONA_NA_GLAVNOY_']['VALUE_XML_ID'] == 'true'),
			'NAME' => 'Товар сезона',
			'TYPE' => 'season'
		),
		'ACTION' => array(
			'VIEW' => in_array('ACTION', $arParams['VIEW_LABEL'])
				&& $item['PROPERTIES']['AKTSIYA_']['VALUE_XML_ID'] == 'true',
			'NAME' => 'Акция',
			'TYPE' => 'action'
		),
		'SALE' => array(
			'VIEW' => /*in_array('ACTION', $arParams['VIEW_LABEL'])
				&& $item['PROPERTIES']['AKTSIYA_']['VALUE_XML_ID'] != 'true'
				&& $item['MIN_PRICE']['DISCOUNT_VALUE'] != $item['MIN_PRICE']['VALUE']*/
				in_array('ACTION', $arParams['VIEW_LABEL'])
				/*&& $item['PROPERTIES']['AKTSIYA_']['VALUE_XML_ID'] != 'true'*/
				&& $item['PROPERTIES']['RASPRODAZHA_']['VALUE_XML_ID'] == 'true',
			'NAME' => 'Распродажа',
			'TYPE' => 'sale'
		),
		'NEW' => array(
			'VIEW' => in_array('NEW', $arParams['VIEW_LABEL'])
				&& $item['PROPERTIES']['NOVINKA_']['VALUE_XML_ID'] == 'true',
			'NAME' => 'Новинка',
			'TYPE' => 'new'
		),
		'OUR_CHOICE' => array(
			'VIEW' => in_array('OUR_CHOICE', $arParams['VIEW_LABEL'])
				&& $item['PROPERTIES']['NASH_VYBOR_']['VALUE_XML_ID'] == 'true',
			'NAME' => 'Наш выбор',
			'TYPE' => 'our-choice'
		),
		'HIT' => array(
			'VIEW' => $arResult['PROPERTIES']['KHIT_PRODAZH_']['VALUE_XML_ID'] == 'true',
			'NAME' => 'Хит продаж',
			'TYPE' => 'hit'
		),
		'GUARANTEE' => array(
			'VIEW' => in_array('GUARANTEE', $arParams['VIEW_LABEL'])
				&& false,
			'NAME' => 'Гарантия ' + ' год',
			'TYPE' => 'guarantee'
		),
		'AVAILABILITY' => array(
			'VIEW' => in_array('AVAILABILITY', $arParams['VIEW_LABEL'])
				&& $item['COUNT'] > 0,
			'NAME' => 'В наличии',
			'TYPE' => 'availability'
		),
	);
	$item['ARCHIV'] = $item["PROPERTIES"]["SNYATO_S_PROIZVODSTVA_"]["VALUE"] == "Да";
	$item['CAN_BUY_BRAND'] = true;
	if ($item['PROPERTIES']['BREND_']['VALUE_XML_ID']) {
		$item['CAN_BUY_BRAND'] = SiteTools::isBrandCanBuy($item['PROPERTIES']['BREND_']['VALUE_XML_ID']);
	}
	unset($item['PROPERTIES']);
}
unset($item);

$this->__component->SetResultCacheKeys(array('ITEMS'));