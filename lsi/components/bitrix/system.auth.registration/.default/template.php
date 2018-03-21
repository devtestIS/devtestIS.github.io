<?
/**
 * Bitrix Framework
 * @package bitrix
 * @subpackage main
 * @copyright 2001-2014 Bitrix
 */

/**
 * Bitrix vars
 * @global CMain $APPLICATION
 * @param array $arParams
 * @param array $arResult
 * @param CBitrixComponentTemplate $this
 */

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
	die();
}

define('WRAP_INFORMATION', 'Y');
?>
<?$APPLICATION->IncludeComponent(
	"intervolga.custom:main.register",
	"registration",
	Array(
		"AUTH" => "Y",
		"REQUIRED_FIELDS" => array("EMAIL"),
		"SET_TITLE" => "Y",
		"SHOW_FIELDS" => array("EMAIL"),
		"SUCCESS_PAGE" => "/login/?confirm_registration=yes&send=yes",
		"USER_PROPERTY" => array(),
		"USER_PROPERTY_NAME" => "",
		"USE_BACKURL" => "Y"
	)
);?>