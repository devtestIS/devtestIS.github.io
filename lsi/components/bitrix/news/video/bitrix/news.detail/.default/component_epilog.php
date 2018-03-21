<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
if ($arParams["OUT_PRODUCTS_FILTER_NAME"])
{
	$GLOBALS[$arParams["OUT_PRODUCTS_FILTER_NAME"]]["ID"] = $arResult["PROPERTIES"]["PRODUCTS"]["VALUE"];
}