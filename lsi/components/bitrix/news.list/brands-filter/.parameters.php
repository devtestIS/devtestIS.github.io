<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);
$arTemplateParameters = array(
	"OUT_FILTER_NAME" => array(
		"NAME" => Loc::getMessage("INTERVOLGA_CUSTOM.OUT_FILTER_NAME"),
		"TYPE" => "STRING",
	),
);