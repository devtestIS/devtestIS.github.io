<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
	die();
}

$GLOBALS['APPLICATION']->AddChainItem('Мой заказ №' . $arResult['ACCOUNT_NUMBER']);

$GLOBALS['APPLICATION']->SetPageProperty('class_title_line', 'shop-top-line');