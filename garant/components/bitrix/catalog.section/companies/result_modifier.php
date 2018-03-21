<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

$arItemsIds = array();
foreach ($arResult["ITEMS"] as $arItem) {
    $arItemsIds[] = $arItem['ID'];
}

$arParentSections = array();
if (!empty($arItemsIds)) {
    $dbRes = \CIBlockElement::GetElementGroups($arItemsIds, true);
    $dbRes->SetUrlTemplates($arParams['DETAIL_URL'], $arParams['SECTION_URL']);
    while ($arItem = $dbRes->GetNext()) {
        $arParentSection['NAME'] = $arItem['NAME'];
        $arParentSection['SECTION_PAGE_URL'] = $arItem['SECTION_PAGE_URL'];
        $arParentSections[$arItem['IBLOCK_ELEMENT_ID']][] = $arParentSection;
    }
}

$arResult['ELEMENTS_PARENT_SECTIONS'] = (!empty($arParentSections)) ? $arParentSections : array();

//echo '<pre>';
//echo var_export($arParams, 1);
//echo '</pre>';