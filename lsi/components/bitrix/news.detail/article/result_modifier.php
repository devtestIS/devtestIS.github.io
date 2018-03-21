<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if($arParams['DISPLAY_DATE']=='Y') {
    if (!$arResult['DISPLAY_ACTIVE_FROM']) {
        $arResult['DISPLAY_ACTIVE_FROM']
            = ConvertDateTime($arResult['TIMESTAMP_X'], $arParams['ACTIVE_DATE_FORMAT'], 'ru');
    }
}

$this->__component->SetResultCacheKeys(array("PROPERTIES"));