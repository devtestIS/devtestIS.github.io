<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var CBitrixComponentTemplate $this */
/** @var array $arParams */
/** @var array $arResult */
/** @global CDatabase $DB */

$frame = $this->createFrame()->begin('');

if (!empty($arResult['ITEMS'])) {
	$GLOBALS['arFilterViewed'] = array(
		'ID' => array_keys($arResult['ITEMS'])
	)
	?>
	<div class="recommend-products">
		<div class="container mbl">
			<div class="h2">Вы недавно смотрели:</div>
		</div>
		<div class="catalog catalog_recommend">
			<div class="catalog__container container">
				<div class="row" data-height="equal" data-target=".card-product__features-container">
					<?
					foreach ($arResult['ITEMS'] as $item) {
						$GLOBALS['arFilterViewed'] = array(
							'ID' => $item['ID']
						);
						$APPLICATION->IncludeComponent(
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
								"CACHE_FILTER" => "Y",
								"CACHE_GROUPS" => "N",
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
								"PAGE_ELEMENT_COUNT" => "9",
								"PARTIAL_PRODUCT_PROPERTIES" => "Y",
								"PRICE_CODE" => \Intervolga\Custom\Product::getAllPriceCode(),
								"PRICE_VAT_INCLUDE" => "Y",
								"PRODUCT_ID_VARIABLE" => "id",
								"PRODUCT_PROPERTIES" => array(),
								"PRODUCT_PROPS_VARIABLE" => "prop",
								"PRODUCT_QUANTITY_VARIABLE" => "",
								"PRODUCT_SUBSCRIPTION" => "N",
								"PROPERTY_CODE" => array(1 => "SNYATO_S_PROIZVODSTVA_",""),
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
								"FILTER_NAME" => "arFilterViewed",
								'FILT_ELEMENT_CSS_CLASS_IN_ROW' => 'col-lg-3 col-sm-6',
								'FILT_ELEMENT_CSS_CLASS' => 'card-product_no-shadow',
								'FILT_VIEW_FEATURES' => 'N',
								'CUSTOM_CURRENT_PAGE' => '/',
								'DISPLAY_COMPARE' => 'Y',
								'FILT_NO_WRAP' => 'Y',
								'SHOW_FAVORITE' => 'Y',
							),
							NULL,
							array('HIDE_ICONS' => 'Y')
						);
					}
					?>
				</div>
			</div>
		</div>
	</div>
	<?
}
$frame->end();