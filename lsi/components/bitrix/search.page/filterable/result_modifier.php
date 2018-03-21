<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

if ($arResult["SEARCH"])
{
	$helper = new \Intervolga\Custom\SearchPage($arResult, $arParams);

	$arResult["PRICE_RANGES"] = array();
	if (\Bitrix\Main\Loader::includeModule("iblock"))
	{
		$prices = CIBlockPriceTools::GetCatalogPrices(IBLOCK_ID_CATALOG, \Intervolga\Custom\Product::getAllPriceCode());
		if ($prices)
		{
			$select = array("ID", "IBLOCK_ID");
			$filter = array(
				"IBLOCK_ID" => IBLOCK_ID_CATALOG,
				"ID" => $helper->getProductsFromSearch(),
			);
			foreach($prices as $price)
			{
				if ($price['CAN_VIEW'] || $price['CAN_BUY'])
				{
					$select[] = $price["SELECT"];
					$filter["CATALOG_SHOP_QUANTITY_" . $price["ID"]] = 1;

					$arResult["PRICE_RANGES"][$price["ID"]] = array("MIN" => false, "MAX" => false);
				}
			}
			$rsElements = CIBlockElement::GetList(array("ID" => "ASC"), $filter, false, false, $select);
			while($arElement = $rsElements->Fetch())
			{
				foreach($prices as $price)
				{
					if ($productPrice = $arElement["CATALOG_PRICE_" . $price["ID"]])
					{
						if ($arResult["PRICE_RANGES"][$price["ID"]]["MIN"] > $productPrice || $arResult["PRICE_RANGES"][$price["ID"]]["MIN"] === false)
						{
							$arResult["PRICE_RANGES"][$price["ID"]]["MIN"] = $productPrice;
						}
						if ($arResult["PRICE_RANGES"][$price["ID"]]["MAX"] < $productPrice || $arResult["PRICE_RANGES"][$price["ID"]]["MAX"] === false)
						{
							$arResult["PRICE_RANGES"][$price["ID"]]["MAX"] = $productPrice;
						}
					}
				}
			}
		}
	}

	include "filter.php";

	ob_start();
	$sort = $APPLICATION->IncludeComponent(
		"intervolga.custom:catalog.sort",
		"catalog",
		array(
			"PRICE_CODE" => \Intervolga\Custom\Product::getAllPriceCode(),
			"HIDE_VIEW_TYPE" => "Y",
			"CUSTOM_SORT_TYPE" => "Релевантости",
			"DEFAULT_SORT" => "custom",
			"DEFAULT_ORDER" => "desc",
			"COOKIE_PREFIX" => "search_",

			'SECTION_ID' => false
		),
		$component,
		array('HIDE_ICONS' => 'Y')
	);
	$arResult["SORT_HTML"] = ob_get_clean();

	if($sort["FIELD"] == "CUSTOM"){
		$sort["DIRECTION"] = $sort["DIRECTION"] == "ASC" ? "DESC" : "ASC";
	}

	$helper->loadFilteredProductsCached(array($sort["FIELD"] => $sort["DIRECTION"], "ID" => "ASC"));

	$arResult["TOTAL_PRODUCTS_COUNT"] = count($helper->getProductsFromSearch());
	$arResult["CURRENT_FILTER_PRODUCTS_COUNT"] = $helper->getAllFoundProductsCount();
	$arResult["PAGE_PRODUCTS"] = $helper->getThisPageIds();
	$arResult["NAV_RESULT"] = $helper->getPaginationObject();

	$GLOBALS[$helper->getFilterName()]["ID"] = $arResult["PAGE_PRODUCTS"];
	$arResult["FILTER_NAME"] = $helper->getFilterName();
}