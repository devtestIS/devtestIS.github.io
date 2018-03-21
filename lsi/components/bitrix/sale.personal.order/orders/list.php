<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$arChildParams = array(
	"PATH_TO_DETAIL" => $arResult["PATH_TO_DETAIL"],
	"PATH_TO_CANCEL" => $arResult["PATH_TO_CANCEL"],
	"PATH_TO_COPY" => $arResult["PATH_TO_LIST"].'?COPY_ORDER=Y&ID=#ID#',
	"PATH_TO_BASKET" => $arParams["PATH_TO_BASKET"],
	"SAVE_IN_SESSION" => $arParams["SAVE_IN_SESSION"],
	"ORDERS_PER_PAGE" => $arParams["ORDERS_PER_PAGE"],
	"SET_TITLE" =>$arParams["SET_TITLE"],
	"ID" => $arResult["VARIABLES"]["ID"],
	"NAV_TEMPLATE" => $arParams["NAV_TEMPLATE"],
	"ACTIVE_DATE_FORMAT" => $arParams["ACTIVE_DATE_FORMAT"],
	"HISTORIC_STATUSES" => $arParams["HISTORIC_STATUSES"],

	"CACHE_TYPE" => $arParams["CACHE_TYPE"],
	"CACHE_TIME" => $arParams["CACHE_TIME"],
	"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],

	"NAV_TEMPLATE_BEFORE" => "before-list",
	"NAV_TEMPLATE_AFTER" => "after-list",
	'NO_WRAP' => $_POST['ajax'],
	'AJAX_ACTION' => $_POST['action'],
);

foreach ($arParams as $key => $val)
	if(strpos($key, "STATUS_COLOR_") !== false && strpos($key, "~") !== 0)
		$arChildParams[$key] = $val;

$oldBy = $_REQUEST["by"];
$_REQUEST["by"] = 'DATE_INSERT';

if ($_POST['ajax'] == 'Y') {
	$GLOBALS['APPLICATION']->RestartBuffer();
}
$APPLICATION->IncludeComponent(
	"intervolga.custom:sale.personal.order.list",
	"orders",
	$arChildParams,
	$component
);
if ($_POST['ajax'] == 'Y') {
	die;
}
$_REQUEST["by"] = $oldBy;
?>
