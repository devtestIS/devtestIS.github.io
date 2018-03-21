<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
	die();
}

$arTemplateParameters['DISPLAY_ELEMENT_COUNT'] = array(
	'PARENT' => 'VISUAL',
	'NAME' => GetMessage('TP_BCSF_DISPLAY_ELEMENT_COUNT'),
	'TYPE' => 'CHECKBOX',
	'DEFAULT' => 'Y',
);
$arTemplateParameters['HIDE_UNUSED'] = array(
	'PARENT' => 'VISUAL',
	'NAME' => GetMessage('INTERVOLGA_CUSTOM.HIDE_UNUSED'),
	'TYPE' => 'CHECKBOX',
);

$arTemplateParameters['IN_SEARCH'] = array(
	'PARENT' => 'VISUAL',
	'NAME' => GetMessage('INTERVOLGA_CUSTOM.IN_SEARCH'),
	'TYPE' => 'CHECKBOX',
);