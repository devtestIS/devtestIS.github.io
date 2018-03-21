<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
	die();
}
/**
 * @var array $arResult
 */
\Bitrix\Main\Loader::includeModule("catalog");
$productIDs = array();
if(!empty($arResult))
{
	foreach ($arResult as &$item)
	{
		if($arPrice = \CCatalogProduct::GetOptimalPrice($item["ID"], 1))
		{
			$item["PRICE"] = $arPrice["DISCOUNT_PRICE"];
			$item["DISCOUNT_PRICE"] = $arPrice["DISCOUNT_PRICE"];

			$item["PRINT_PRICE"] = \CCurrencyLang::CurrencyFormat(
				round($item["PRICE"]),
				$arPrice['RESULT_PRICE']["CURRENCY"],
				true
			);

			$item['PRINT_DISCOUNT_PRICE'] = \CCurrencyLang::CurrencyFormat(
				round($item["DISCOUNT_PRICE"]),
				$arPrice['RESULT_PRICE']["CURRENCY"],
				true
			);
		}
		$productIDs[] = $item["ID"];
	}
	unset($item);

	if(!empty($productIDs))
	{
		$db_res = CPrice::GetList(
			array(),
			array(
				"PRODUCT_ID" => $productIDs,
				"CATALOG_GROUP_ID" => PRICE_TYPE_OLD
			)
		);
		while ($ar_res = $db_res->Fetch())
		{
			if (floatval($ar_res['PRICE']) > floatval($arResult[$ar_res["PRODUCT_ID"]]["PRICE"]))
			{
				$arResult[$ar_res["PRODUCT_ID"]]["PRICE"] = $ar_res["PRICE"];
				$arResult[$ar_res["PRODUCT_ID"]]["PRINT_PRICE"] = \CCurrencyLang::CurrencyFormat(
					round($arResult[$ar_res["PRODUCT_ID"]]["PRICE"]),
					$arPrice['RESULT_PRICE']["CURRENCY"],
					true
				);
			}
		}
		$db_res = CIBlockElement::GetList(array(), array("=ID" => $productIDs), false, false, array("ID", "DETAIL_PICTURE"));
		while ($arItem = $db_res->Fetch())
		{
			$arResult[$arItem["ID"]]["DETAIL_PICTURE"] = resizeImageIV($arItem["DETAIL_PICTURE"], "list_picture");
		}
	}
	$arResult = array("ITEMS" => $arResult);
	$totalPrice  = 0;
	$totalDiscountPrice = 0;
	foreach ($arResult["ITEMS"] as $arItem)
	{
		$totalPrice += $arItem["PRICE"];
		$totalDiscountPrice += $arItem["DISCOUNT_PRICE"];
	}
	$arResult["TOTAL_PRICE"] = \CCurrencyLang::CurrencyFormat(
		round($totalPrice),
		"RUB",
		true
	);
	$arResult["TOTAL_DISCOUNT_PRICE"] = \CCurrencyLang::CurrencyFormat(
		round($totalDiscountPrice),
		"RUB",
		true
	);
}