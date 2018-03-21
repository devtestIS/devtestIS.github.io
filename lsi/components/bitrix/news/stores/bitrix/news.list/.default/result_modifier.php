<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$storesIds = array();
foreach ($arResult["ITEMS"] as $item)
{
	if ($item["DISPLAY_PROPERTIES"]["STORE"])
	{
		$storesIds[] = $item["DISPLAY_PROPERTIES"]["STORE"]["VALUE"];
	}
}
if (\Bitrix\Main\Loader::includeModule("catalog"))
{
	$stores = \Bitrix\Catalog\StoreTable::getList(array("filter" => array("ID" => $storesIds)));
	while ($store = $stores->fetch())
	{
		$arResult["STORES"][$store["ID"]] = $store;
	}
}
foreach ($arResult["ITEMS"] as $item)
{
	$storeId = $item["DISPLAY_PROPERTIES"]["STORE"]["VALUE"];
	$store = $arResult["STORES"][$storeId];
	if ($item["DISPLAY_PROPERTIES"]["MAP"])
	{
		$coords = explode(",", $item["DISPLAY_PROPERTIES"]["MAP"]["VALUE"]);
		$arResult["JSON"][] = array(
			"TITLE" => $item["NAME"],
			"LAT" => doubleval($coords[0]),
			"LNG" => doubleval($coords[1]),
		);
	}
	elseif ($store["GPS_N"] && $store["GPS_S"])
	{
		$arResult["JSON"][] = array(
			"TITLE" => $item["NAME"],
			"LAT" => doubleval($store["GPS_N"]),
			"LNG" => doubleval($store["GPS_S"]),
		);
	}
}
