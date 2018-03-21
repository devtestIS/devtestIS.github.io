<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);
/**
 * @var \Intervolga\Custom\SearchPage helper
 * @var array $arResult
 */
ob_start();
if ($helper->getProductsFromSearch())
{
	$GLOBALS["arPreFilterForSmartFilter"] = array("ID" => $helper->getProductsFromSearch());
	$APPLICATION->IncludeComponent("intervolga.custom:catalog.smart.filter", "catalog",
		array(
			"CACHE_GROUPS" => "N",
			"CACHE_TIME" => "36000000",
			"CACHE_TYPE" => "A",
			"DISPLAY_ELEMENT_COUNT" => "Y",
			"FILTER_NAME" => $helper->getFilterName(),
			"IBLOCK_ID" => IBLOCK_ID_CATALOG,
			"POPUP_POSITION" => "left",
			"PRICE_CODE" => \Intervolga\Custom\Product::getAllPriceCode(),
			"SECTION_DESCRIPTION" => "-",
			"SECTION_TITLE" => "-",
			"SEF_MODE" => "N",
			"SAVE_IN_SESSION" => "N",
			"HIDE_NOT_AVAILABLE" => "Y",
			"INSTANT_RELOAD" => "N",
			"IN_SEARCH" => "Y",
			"SHOW_ALL_WO_SECTION" => "Y",
			"PRE_FILTER_NAME" => "arPreFilterForSmartFilter",
			"PRICE_RANGES" => $arResult["PRICE_RANGES"],
			"SMART_FILTER_HIDE_ZIRO" => "Y"
		),
		$component,
		array("HIDE_ICONS" => "Y")
	);
}
$filter = ob_get_clean();
if ($helper->getFilter())
{
	$APPLICATION->AddViewContent("smartfilter", $filter);
}
elseif ($USER->IsAdmin())
{
	$arResult["ERRORS"][] = Loc::getMessage("INTERVOLGA_CUSTOM.NO_SMART_FILTER_RESULT");
}