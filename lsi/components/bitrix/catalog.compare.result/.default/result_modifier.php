<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
use Intervolga\Custom\SiteTools;

$arResult['CAN_BUY_BRAND_TOOLTIP'] = SiteTools::makeBrandTooltip();
$arResult['SECTIONS'] = array();
$arResult['CURRENT_SECTION'] = $_REQUEST['section'] ?: false;
$entity = \Bitrix\Iblock\Model\Section::compileEntityByIblock(IBLOCK_ID_CATALOG);
if($arResult['CURRENT_SECTION']){
	$sec = Bitrix\Iblock\SectionTable::getList(array(
		'filter' => array(
			'LOGIC' => 'OR',
			'ID' => intval($_REQUEST['section']),
			'CODE' => preg_replace('/[^a-zA-Z0-1_-]+/', '', $_REQUEST['section']),
		),
		'select' => array('ID')
	))->fetch();
	$arResult['CURRENT_SECTION'] = $sec ? $sec['ID'] : false;
}

if ($arResult["ITEMS"])
{
	$sections = array();
	foreach ($arResult["ITEMS"] as $i => $item) {
		$sections[] = $item["IBLOCK_SECTION_ID"];
	}
	$db = $entity::getList(array(
		'order' => array('SORT'),
		"select" => array("UF_FILTER_URL", "ID", "NAME", 'CODE', 'PARENT_' => 'PARENT_SECTION'),
		"filter" => array( 'ID' => $sections, "IBLOCK_ID" => IBLOCK_ID_CATALOG)
	));
	$findCurrent = false;
	$matchesSection = array();
	while($sec = $db->Fetch()){
		if($sec["UF_FILTER_URL"] != "")
		{
			$arResult["SECTIONS"][$sec["PARENT_ID"]] = array("ID" => $sec["PARENT_ID"], "CODE" => $sec["PARENT_CODE"], "NAME" => $sec["PARENT_NAME"]);
			$sec["USE_PARENT"] = 'Y';
			$matchesSection[$sec["ID"]] = $sec["PARENT_ID"];
		}
		else
		{
			$arResult['SECTIONS'][$sec["ID"]] = $sec;
		}
		if($sec['ID'] == $arResult['CURRENT_SECTION']) {
			$findCurrent = true;
		}
	}
	if (!$arResult['CURRENT_SECTION'] || !$findCurrent) {
		foreach ($arResult['SECTIONS'] as $sec){
			$arResult['CURRENT_SECTION'] = $sec['ID'];
			break;
		}
	}
	foreach ($arResult["ITEMS"] as $i => $item)
	{
		if($matchesSection[$item["IBLOCK_SECTION_ID"]])
		{
			$item["IBLOCK_SECTION_ID"] = $matchesSection[$item["IBLOCK_SECTION_ID"]];
		}
		if($arResult['CURRENT_SECTION'] != $item["IBLOCK_SECTION_ID"]){
			unset($arResult["ITEMS"][$i]);
			continue;
		}
		$item['RATE'] = \Intervolga\Custom\Product::getRate($item['ID']);
		// Сжать изображения
		if (!$item["PREVIEW_PICTURE"])
		{
			$item["PREVIEW_PICTURE"] = $item["DETAIL_PICTURE"];
		}
		if ($item["PREVIEW_PICTURE"])
		{
			$img = ResizeImageGetIV($item["PREVIEW_PICTURE"], array("height"=>185), BX_RESIZE_IMAGE_PROPORTIONAL);
			if ($img)
			{
				$item["PREVIEW_PICTURE"]["SRC"] = $img["src"];
			}
		}
		else
		{
			$item["PREVIEW_PICTURE"] = array("SRC" => SITE_TEMPLATE_PATH . "/images/empty_h185.png");
		}

		if($item["PROPERTIES"]["SNYATO_S_PROIZVODSTVA_"]["VALUE"] == 'Да')
		{
			$item["MIN_PRICE"]["CAN_BUY"] = false;
			$item["MIN_PRICE"]["PRINT_DISCOUNT_VALUE"] = "-";
		}
		else
		{
			$item["MIN_PRICE"]["PRINT_DISCOUNT_VALUE"] = \CCurrencyLang::CurrencyFormat(
				round($item["MIN_PRICE"]["DISCOUNT_VALUE"]),
				$item["MIN_PRICE"]["CURRENCY"],
				true
			);
		}
		// Округлить цены

		if (in_array(USER_GROUP_ID_RETAIL, $GLOBALS['USER']->GetUserGroupArray())) {
			$item['CAN_BUY'] = false;
		}

		$item['CAN_BUY_BRAND'] = true;
		if ($item['PROPERTIES']['BREND_']['VALUE_XML_ID']) {
			$item['CAN_BUY_BRAND'] = SiteTools::isBrandCanBuy($item['PROPERTIES']['BREND_']['VALUE_XML_ID']);
		}

		$arResult["ITEMS"][$i] = $item;
	}

	// Обработать названия свойств
	foreach ($arResult["SHOW_PROPERTIES"] as $i => $property)
	{
		if($exception = \Intervolga\Custom\Product::getPropertyDescription($property['ID'], $arResult['CURRENT_SECTION'])){
			$property["NAME"] = $exception['NAME'];
			$property["MEASURE"] = $exception['UNIT'];
			$property["HINT"] = $exception['HINT'];
		}
		$arResult["SHOW_PROPERTIES"][$i] = $property;
	}

	foreach ($arResult["SHOW_PROPERTIES"] as $i => $property)
	{
		$propertyCode = $property["CODE"];
		$isFound = false;
		$values = array();
		foreach ($arResult["ITEMS"] as $item)
		{
			if ($item["DISPLAY_PROPERTIES"][$propertyCode])
			{
				$isFound = true;
			}
			$values[] = serialize($item["DISPLAY_PROPERTIES"][$propertyCode]["DISPLAY_VALUE"]);
		}
		if ($isFound)
		{
			if ($arResult["DIFFERENT"])
			{
				if (count(array_unique($values)) == 1)
				{
					unset($arResult["SHOW_PROPERTIES"][$i]);
				}
			}
		}
		else
		{
			unset($arResult["SHOW_PROPERTIES"][$i]);
		}
	}
}
$arResult["URLS"]["ALL"] = $arResult["COMPARE_URL_TEMPLATE"] . "DIFFERENT=N";
$arResult["URLS"]["DIFFERENT"] = $arResult["COMPARE_URL_TEMPLATE"] . "DIFFERENT=Y";