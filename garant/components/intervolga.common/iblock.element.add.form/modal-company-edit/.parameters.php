<?php
defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED === true || die();

use Bitrix\Main\Loader;
use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

if (!Loader::includeModule('iblock'))
{
	return;
}

$iblockTypes = CIBlockParameters::getIBlockTypes();
$iblocks = array();
$iblocksGetList = CIBlock::getList(Array('sort' => 'asc'), Array('TYPE' => $arCurrentValues['IBLOCK_TYPE'], 'ACTIVE' => 'Y'));
while ($iblock = $iblocksGetList->fetch())
{
	if ($iblock['CODE'])
	{
		$iblocks[$iblock['CODE']] = '[' . $iblock['CODE'] . '] ' . $iblock['NAME'];
	}
}

$properties = array(
	'FIELD_NAME' => Loc::getMessage('INTERVOLGA_COMMON.IBLOCK_ELEMENT_ADD_FORM_ADD_NAME'),
	'FIELD_CODE' => Loc::getMessage('INTERVOLGA_COMMON.IBLOCK_ELEMENT_ADD_FORM_ADD_CODE'),
	'FIELD_TAGS' => Loc::getMessage('INTERVOLGA_COMMON.IBLOCK_ELEMENT_ADD_FORM_ADD_TAGS'),
	'FIELD_ACTIVE_FROM' => Loc::getMessage('INTERVOLGA_COMMON.IBLOCK_ELEMENT_ADD_FORM_ADD_ACTIVE_FROM'),
	'FIELD_ACTIVE_TO' => Loc::getMessage('INTERVOLGA_COMMON.IBLOCK_ELEMENT_ADD_FORM_ADD_ACTIVE_TO'),
	'FIELD_IBLOCK_SECTION' => Loc::getMessage('INTERVOLGA_COMMON.IBLOCK_ELEMENT_ADD_FORM_ADD_IBLOCK_SECTION'),
	'FIELD_PREVIEW_TEXT' => Loc::getMessage('INTERVOLGA_COMMON.IBLOCK_ELEMENT_ADD_FORM_ADD_PREVIEW_TEXT'),
	'FIELD_PREVIEW_PICTURE' => Loc::getMessage('INTERVOLGA_COMMON.IBLOCK_ELEMENT_ADD_FORM_ADD_PREVIEW_PICTURE'),
	'FIELD_DETAIL_TEXT' => Loc::getMessage('INTERVOLGA_COMMON.IBLOCK_ELEMENT_ADD_FORM_ADD_DETAIL_TEXT'),
	'FIELD_DETAIL_PICTURE' => Loc::getMessage('INTERVOLGA_COMMON.IBLOCK_ELEMENT_ADD_FORM_ADD_DETAIL_PICTURE'),
);
$propsGetList = CIBlockProperty::getList(
	array(
		'sort' => 'asc',
		'name' => 'asc',
	),
	array(
		'ACTIVE' => 'Y',
		'IBLOCK_CODE' => $arCurrentValues['IBLOCK_CODE'],
	)
);
while ($property = $propsGetList->fetch())
{
	if (strlen($property['CODE']))
	{
		$properties['PROPERTY_' . $property['CODE']] = '[' . $property['CODE'] . '] ' . $property['NAME'];
	}
}

$arTemplateParameters = array(
	'PROPERTY_CODES_HIDDEN' => array(
		'PARENT' => 'FIELDS',
		'NAME' => Loc::getMessage('INTERVOLGA_COMMON.IBLOCK_ELEMENT_ADD_FORM_PROPERTY_HIDDEN'),
		'TYPE' => 'LIST',
		'MULTIPLE' => 'Y',
		'VALUES' => $properties,
		'SIZE' => 7,
	),
	'BUTTON_TEXT' => array(
		'NAME' => Loc::getMessage('INTERVOLGA_COMMON.IBLOCK_ELEMENT_ADD_FORM_BUTTON_TEXT'),
		'PARENT' => 'PARAMS',
	),
	'COMPANY_ID' => array(
		'NAME' => Loc::getMessage('INTERVOLGA_COMMON.IBLOCK_ELEMENT_ADD_FORM_COMPANY_ID'),
		'PARENT' => 'PARAMS',
	),
);