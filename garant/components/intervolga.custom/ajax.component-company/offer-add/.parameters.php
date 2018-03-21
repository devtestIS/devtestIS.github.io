<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);
$arTemplateParameters = array(
	"TITLE" => array(
		"NAME" => Loc::getMessage("INTERVOLGA_COMMON.AJAX_COMPONENT_TITLE"),
		"TYPE" => "STRING",
		"PARENT" => "AJAX_BASE",
		"DEFAULT" => Loc::getMessage("INTERVOLGA_COMMON.AJAX_COMPONENT_TITLE_DEFAULT")
	),
	"SIZE" => array(
		"NAME" => Loc::getMessage("INTERVOLGA_COMMON.AJAX_COMPONENT_SIZE"),
		"TYPE" => "LIST",
		"PARENT" => "AJAX_BASE",
		"VALUES" => array(
			"" => Loc::getMessage("INTERVOLGA_COMMON.AJAX_COMPONENT_SIZE_NORMAL"),
			"modal-lg" => Loc::getMessage("INTERVOLGA_COMMON.AJAX_COMPONENT_SIZE_LARGE"),
			"modal-sm" => Loc::getMessage("INTERVOLGA_COMMON.AJAX_COMPONENT_SIZE_SMALL"),
		),
	),
	"SHOW_BUTTON" => array(
		"NAME" => Loc::getMessage("INTERVOLGA_COMMON.AJAX_COMPONENT_SHOW_BUTTON"),
		"TYPE" => "CHECKBOX",
		"PARENT" => "AJAX_BASE",
		"DEFAULT" => "Y",
	),
);
?>