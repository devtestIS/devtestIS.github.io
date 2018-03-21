<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arViewModeList = array('LIST', 'LINE', 'TEXT', 'TILE');

if ('N' != $arParams['SHOW_PARENT_NAME'])
	$arParams['SHOW_PARENT_NAME'] = 'Y';
if ('Y' != $arParams['HIDE_SECTION_NAME'])
	$arParams['HIDE_SECTION_NAME'] = 'N';

if (0 < $arResult['SECTIONS_COUNT'])
{
	$boolPicture = false;
	$boolDescr = false;
	$arSelect = array('ID');
	$arMap = array();

	reset($arResult['SECTIONS']);
	$arCurrent = current($arResult['SECTIONS']);
	if (!isset($arCurrent['PICTURE']))
	{
		$boolPicture = true;
		$arSelect[] = 'PICTURE';
	}
	if ('LINE' == $arParams['VIEW_MODE'] && !array_key_exists('DESCRIPTION', $arCurrent))
	{
		$boolDescr = true;
		$arSelect[] = 'DESCRIPTION';
		$arSelect[] = 'DESCRIPTION_TYPE';
	}

	if ($boolPicture || $boolDescr)
	{
		foreach ($arResult['SECTIONS'] as $key => $arSection)
		{
			$arMap[$arSection['ID']] = $key;
		}
		$rsSections = CIBlockSection::GetList(array(), array('ID' => array_keys($arMap)), false, $arSelect);
		while ($arSection = $rsSections->GetNext())
		{
			if (!isset($arMap[$arSection['ID']]))
				continue;
			$key = $arMap[$arSection['ID']];
			if ($boolPicture)
			{
				$arSection['PICTURE'] = intval($arSection['PICTURE']);
				$arSection['PICTURE'] = (0 < $arSection['PICTURE'] ? CFile::GetFileArray($arSection['PICTURE']) : false);
				$arResult['SECTIONS'][$key]['PICTURE'] = $arSection['PICTURE'];
				$arResult['SECTIONS'][$key]['~PICTURE'] = $arSection['~PICTURE'];
			}
			if ($boolDescr)
			{
				$arResult['SECTIONS'][$key]['DESCRIPTION'] = $arSection['DESCRIPTION'];
				$arResult['SECTIONS'][$key]['~DESCRIPTION'] = $arSection['~DESCRIPTION'];
				$arResult['SECTIONS'][$key]['DESCRIPTION_TYPE'] = $arSection['DESCRIPTION_TYPE'];
				$arResult['SECTIONS'][$key]['~DESCRIPTION_TYPE'] = $arSection['~DESCRIPTION_TYPE'];
			}
		}
	}
}

foreach ($arResult['SECTIONS'] as $key=>$arSection) {
	if(is_array($arSection['PICTURE'])) {
		$img = ResizeImageGetIV(
			$arSection['PICTURE'],
			array('width' => 150, 'height' => 160),
			BX_RESIZE_IMAGE_EXACT
		);
		$arResult['SECTIONS'][$key]['PICTURE']['RESIZED'] = $img ? $img['src'] : $arSection['PICTURE']['SRC'];
	}else{
		$arResult['SECTIONS'][$key]['PICTURE'] = array(
			'ALT' => $arSection[" IPROPERTY_VALUES"]["SECTION_PICTURE_FILE_ALT"],
			'TITLE' => $arSection["IPROPERTY_VALUES"]["SECTION_PICTURE_FILE_TITLE"],
			'RESIZED' => SITE_TEMPLATE_PATH . '/images/empty_w150_h160.png'
		);
	}
}
?>