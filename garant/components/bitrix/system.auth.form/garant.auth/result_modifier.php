<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/**
 * @var array $arParams
 * @var array $arResult
 */
use Bitrix\Main\Loader;
use Intervolga\Custom\Iblock\Company;
global $USER;
if($USER->IsAuthorized() && Loader::includeModule('iblock')) {
	$filter = array(
		"=IBLOCK_ID" => Company::getIblockId(),
		"=PROPERTY_MODERATOR" => $USER->GetID()
	);
	$arCompany = \CIBlockElement::GetList(array(), $filter, false, false, array('ID', 'NAME'))->Fetch();
	if($arCompany) {
		$arResult['USER_NAME'] = $arCompany['NAME'];
	}
}
