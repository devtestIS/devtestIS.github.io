<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Intervolga\Common\TemplateParameters;
use Intervolga\Custom\Iblock\Company;

// Изображения элемента
$arImagesIDs = array();
foreach ($arResult['PROPERTIES']['IMAGES']['VALUE'] as $imageID) {
    $arImagesIDs[] = $imageID;
}
$arImagesIDs = implode(',', $arImagesIDs);

$uploadDir = COption::GetOptionString("main", "upload_dir", "upload");
$arImages = array();
if (!empty($arImagesIDs)) {
    $dbRes = CFile::GetList(array(), array('@ID' => $arImagesIDs));
    while ($arImage = $dbRes->GetNext()) {
        $arImage['SRC'] = "/" . $uploadDir . "/" . $arImage["SUBDIR"] . "/" . $arImage["FILE_NAME"];
        $arImages[] = $arImage;
    }
}

$arResult['IMAGES'] = !empty($arImages) ? $arImages : array();

// Количество показов
$showCounterDbRes = \CIBlockElement::GetList(Array(), Array("ACTIVE" => "Y", "ID" => $arResult['ID'], "IBLOCK_ID" => $arResult['IBLOCK_ID']), array("SHOW_COUNTER"));
if ($showCounterProp = $showCounterDbRes->Fetch()) {
    $arResult['SHOW_COUNTER'] = $showCounterProp['SHOW_COUNTER'];
}

// Ресайз изображений
$imgSize = TemplateParameters::getResizeParam("catalog_offers_catalog_element_offer");
if ($arResult["PREVIEW_PICTURE"]) {
	$img = resizeImageIV($arResult["PREVIEW_PICTURE"], $imgSize);
	$arResult["PREVIEW_PICTURE"] = $img;
} else {
	$arResult["PREVIEW_PICTURE"]["SRC"] = $imgSize["src"];
}

$imgSize = TemplateParameters::getResizeParam("catalog_offers_catalog_element_images");
foreach ($arResult["IMAGES"] as $index => $arImage)
{
	$img = resizeImageIV($arImage, $imgSize);
	$arResult["IMAGES"][$index] = $img;
}

// Получить свойства элемента для вывода
$arResult['PROPERTIES']['ELEMENT']['PRINT_PROPERTIES'] = array();
$arElementProps = array();
foreach ($arResult['ORIGINAL_PARAMETERS']['ELEMENT_PROPERTY_CODE'] as $elementPropCode)
{
	if ($arResult['DISPLAY_PROPERTIES'][$elementPropCode])
	{
		$arElementPropsItem = array();
		$arElementPropsItem['CODE'] = $elementPropCode;
		$arElementPropsItem['NAME'] = $arResult['DISPLAY_PROPERTIES'][$elementPropCode]['NAME'];
		$arElementPropsItem['VALUE'] = $arResult['DISPLAY_PROPERTIES'][$elementPropCode]['VALUE'];
		$arElementProps[$elementPropCode] = $arElementPropsItem;
	}
}

if ($arElementProps)
{
	$arResult['PROPERTIES']['ELEMENT']['PRINT_PROPERTIES'] = $arElementProps;
}

// Получить свойства компании для вывода
$arResult['PROPERTIES']['COMPANY']['PRINT_PROPERTIES'] = array();
if (intval($arResult['PROPERTIES']['COMPANY']['VALUE']) > 0)
{
	$companyIblockId = Company::getIblockId();

	$arCompanyPropsCodes = $arResult['ORIGINAL_PARAMETERS']['COMPANY_PROPERTY_CODE'];

	// Получить информацию о свойствах каталога "Компании"
	$arCompanyPropsInfo = array();
	$arFilterCompanyProps = array("ACTIVE" => "Y", "IBLOCK_ID" => $companyIblockId);
	$dbResCompanyProps = CIBlockProperty::GetList(array(), $arFilterCompanyProps);
	while ($arCompanyPropInfo = $dbResCompanyProps->GetNext())
	{
		$arCompanyPropsInfo[$arCompanyPropInfo['CODE']] = $arCompanyPropInfo['NAME'];
	}

	// Получить свойства компании предложения
	$arFilterCompany = array(
		'ID' => $arResult['PROPERTIES']['COMPANY']['VALUE'],
		'IBLOCK_ID' => $companyIblockId
	);

	$arSelectCompany = array();
	foreach ($arCompanyPropsCodes as $companyPropCode)
	{
		$arSelectCompany[] = 'PROPERTY_' . $companyPropCode;
	}

	$arCompanyProps = array();
	$dbResCompany = CIBlockElement::GetList(array(), $arFilterCompany, false, false, $arSelectCompany);
	if ($arCompanyPropsVals = $dbResCompany->GetNext())
	{
		foreach ($arCompanyPropsCodes as $companyPropCode)
		{
			$arCompanyPropsItem = array();
			$arCompanyPropsItem['CODE'] = $companyPropCode;
			$arCompanyPropsItem['NAME'] = $arCompanyPropsInfo[$companyPropCode];
			$arCompanyPropsItem['VALUE'] = $arCompanyPropsVals['PROPERTY_' . $companyPropCode . '_VALUE'];
			$arCompanyProps[$companyPropCode] = $arCompanyPropsItem;
		}
	}

	if ($arCompanyProps)
	{
		$arResult['PROPERTIES']['COMPANY']['PRINT_PROPERTIES'] = $arCompanyProps;
	}
}

