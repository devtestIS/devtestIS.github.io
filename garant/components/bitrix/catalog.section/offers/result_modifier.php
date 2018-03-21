<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Intervolga\Common\TemplateParameters;

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

// Ресайз изображений
$imgSize = TemplateParameters::getResizeParam("catalog_section_offers");

foreach ($arResult["ITEMS"] as $index => $arItem) {
	if ($arItem["PREVIEW_PICTURE"]) {
		$img = resizeImageIV($arItem["PREVIEW_PICTURE"], $imgSize);
		$arResult["ITEMS"][$index]["PREVIEW_PICTURE"] = $img;
	} else {
		$arResult["ITEMS"][$index]["PREVIEW_PICTURE"]["SRC"] = $imgSize["src"];
	}
}