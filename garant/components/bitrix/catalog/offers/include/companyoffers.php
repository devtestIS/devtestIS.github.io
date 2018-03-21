<?php
defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED === true || die();
use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);
/**
 * @var array $arParams
 * @var array $arResult
 */

$GLOBALS['companyOfferFilter'] = array(
	'PROPERTY_COMPANY.CODE' => $arResult['VARIABLES']['ELEMENT_CODE'],
);
$APPLICATION->IncludeComponent(
	'bitrix:catalog.element',
	'companyoffers',
	array(
		'IBLOCK_TYPE' => $arParams['IBLOCK_TYPE'],
		'IBLOCK_ID' => $arParams['IBLOCK_ID'],
		'ELEMENT_ID' => $arResult['VARIABLES']['ELEMENT_ID'],
		'ELEMENT_CODE' => $arResult['VARIABLES']['ELEMENT_CODE'],
		'SECTION_ID' => $arResult['VARIABLES']['SECTION_ID'],
		'SECTION_CODE' => $arResult['VARIABLES']['SECTION_CODE'],
		'ADD_SECTIONS_CHAIN' => (isset($arParams['ADD_SECTIONS_CHAIN']) ? $arParams['ADD_SECTIONS_CHAIN'] : ''),
		'ADD_ELEMENT_CHAIN' => (isset($arParams['ADD_ELEMENT_CHAIN']) ? $arParams['ADD_ELEMENT_CHAIN'] : ''),
		'CACHE_TYPE' => $arParams['CACHE_TYPE'],
		'CACHE_TIME' => $arParams['CACHE_TIME'],
		'CACHE_GROUPS' => $arParams['CACHE_GROUPS'],
		'SET_TITLE' => 'N',
	),
	$component,
	array(
		'HIDE_ICONS' => 'Y',
	)
);

$APPLICATION->IncludeComponent(
	'bitrix:catalog.section',
	'offers',
	array(
		'IBLOCK_ID' => \Intervolga\Custom\Iblock\Offer::getIblockId(),
		'BY_LINK' => 'Y',
		'FILTER_NAME' => 'companyOfferFilter',
	),
	$component,
	array(
		'HIDE_ICONS' => 'Y',
	)
);