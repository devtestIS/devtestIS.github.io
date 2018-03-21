<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

$this->setFrameMode(true);

$this->SetViewTarget('catalogDescription');
echo $arParams['CITY'] == \Intervolga\Custom\City::getDefaultXmlId()
    ? $arResult["DESCRIPTION"] : html_entity_decode($arResult['UF_DESCRIPTION_OTHER']);
$this->EndViewTarget();