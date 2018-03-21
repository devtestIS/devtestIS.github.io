<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
	die();
}
if(!empty($arResult["CATEGORIES"]["READY"]))
{
	$productIds = array();
	$products = array();
	foreach ($arResult["CATEGORIES"]["READY"] as $index => $item)
	{
		$item["DETAIL_PICTURE"] = resizeImageIV($item["DETAIL_PICTURE"], "list_picture");
		$item["PRINT_DISCOUNT_PRICE"] = $item["SUM"];
		$item["PRINT_PRICE"] = $item["SUM"];
		$productIds[] = $item["PRODUCT_ID"];
		$products[$item["PRODUCT_ID"]] = $item;
	}
	$arResult["CATEGORIES"]["READY"] = $products;
	if(!empty($productIds))
	{
		$db_res = CPrice::GetList(
			array(),
			array(
				"PRODUCT_ID" => $productIds,
				"CATALOG_GROUP_ID" => PRICE_TYPE_OLD
			)
		);
		while ($arPrice = $db_res->Fetch())
		{
			if($arPrice["PRICE"] && round($arPrice["PRICE"]) != 0)
			{
				$arResult["CATEGORIES"]["READY"][$arPrice["PRODUCT_ID"]]["PRICE"] = $arPrice["PRICE"]*$arResult["CATEGORIES"]["READY"][$arPrice["PRODUCT_ID"]]["QUANTITY"];
				$arResult["CATEGORIES"]["READY"][$arPrice["PRODUCT_ID"]]["PRINT_PRICE"] = \CCurrencyLang::CurrencyFormat(
					round($arResult["CATEGORIES"]["READY"][$arPrice["PRODUCT_ID"]]["PRICE"]),
					$arPrice["CURRENCY"],
					true
				);
			}
		}
	}
	$totalPrice  = 0;
	$totalDiscountPrice = 0;
	foreach ($arResult["CATEGORIES"]["READY"] as $arItem)
	{
		$totalPrice += $arItem["PRICE"];
	}
	$arResult["TOTAL_DISCOUNT_PRICE"] = $arResult["TOTAL_PRICE"];
	$arResult["TOTAL_PRICE"] = \CCurrencyLang::CurrencyFormat(
		round($totalPrice),
		"RUB",
		true
	);
}