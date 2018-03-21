<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

use Bitrix\Main\Page\Asset;
$assets = Asset::getInstance();
$assets->addString('<link rel="canonical" href="https://' . $_SERVER['SERVER_NAME'] . $GLOBALS['APPLICATION']->GetCurPage(false) . '" />');