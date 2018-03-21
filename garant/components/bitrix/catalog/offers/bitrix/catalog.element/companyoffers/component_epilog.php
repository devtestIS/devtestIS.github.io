<?php
defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED === true || die();

use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);
if ($arResult['NAME'])
{
	$APPLICATION->setTitle(Loc::getMessage('INTERVOLGA_GARANT.H1_TEMPLATE', array('#COMPANY#' => $arResult['NAME'])));
	$APPLICATION->setPageProperty('title', Loc::getMessage('INTERVOLGA_GARANT.TITLE_TEMPLATE', array('#COMPANY#' => $arResult['NAME'])));
}