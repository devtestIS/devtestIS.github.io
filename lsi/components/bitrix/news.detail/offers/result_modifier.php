<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if($arParams['DISPLAY_DATE']=='Y') {
	if ($arResult["DISPLAY_PROPERTIES"]['DATE_FROM']) {
		$arResult['DATE_ACTIVE_FROM_FORMATED']
			= ConvertDateTime($arResult["DISPLAY_PROPERTIES"]['DATE_FROM']["VALUE"], $arParams['ACTIVE_DATE_FORMAT']);
	}
	if ($arResult["DISPLAY_PROPERTIES"]['DATE_TO']) {
		$arResult['DATE_ACTIVE_TO_FORMATED']
			= ConvertDateTime($arResult["DISPLAY_PROPERTIES"]['DATE_TO']["VALUE"], $arParams['ACTIVE_DATE_FORMAT']);
	}
}

$this->__component->SetResultCacheKeys(array("PROPERTIES"));