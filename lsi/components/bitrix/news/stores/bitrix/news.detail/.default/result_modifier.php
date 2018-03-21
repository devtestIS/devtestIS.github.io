<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
if ($arResult["DISPLAY_PROPERTIES"]["STORE"])
{
	$arResult["STORE"] = \Bitrix\Catalog\StoreTable::getById($arResult["DISPLAY_PROPERTIES"]["STORE"]["VALUE"])->fetch();
}

if ($arResult["DISPLAY_PROPERTIES"]["ADDRESS"])
{
	$arResult["INFO"]["ADDRESS"] = $arResult["DISPLAY_PROPERTIES"]["ADDRESS"]["DISPLAY_VALUE"];
}
elseif ($arResult["STORE"]["ADDRESS"])
{
	$arResult["INFO"]["ADDRESS"] = $arResult["STORE"]["ADDRESS"];
}

if ($arResult["DISPLAY_PROPERTIES"]["PHONE"])
{
	$arResult["INFO"]["PHONE"] = $arResult["DISPLAY_PROPERTIES"]["PHONE"]["DISPLAY_VALUE"];
}
elseif ($arResult["STORE"]["PHONE"])
{
	$arResult["INFO"]["PHONE"] = $arResult["STORE"]["PHONE"];
}
if(!empty($arResult["INFO"]["PHONE"]))
{
	$pattern = array("/^8/", "/\s/");
	$replace = array("+7", "");
	$arResult["INFO"]["PHONE_HREF"] = preg_replace($pattern, $replace, $arResult["INFO"]["PHONE"]);
}
if ($arResult["DISPLAY_PROPERTIES"]["WORKING_HOURS"])
{
	$arResult["INFO"]["WORKING_HOURS"] = str_replace("\n","<br>",$arResult["DISPLAY_PROPERTIES"]["WORKING_HOURS"]["DISPLAY_VALUE"]);
}
elseif ($arResult["STORE"]["SCHEDULE"])
{
	$arResult["INFO"]["WORKING_HOURS"] = $arResult["STORE"]["SCHEDULE"];
}

$blockProperties = array(
	"BUY_TEXT" => "BUY_TYPES",
	"PAYMENT_TEXT" => "PAYMENT_TYPES",
	"DELIVERY_TEXT" => "DELIVERY_TYPES",
	"CREDITS" => "CREDITS",
);
foreach ($blockProperties as $propertyCode => $block)
{
	if ($arResult["DISPLAY_PROPERTIES"][$propertyCode])
	{
		$arResult["BLOCKS"][$block] = explode("\n", $arResult["DISPLAY_PROPERTIES"][$propertyCode]["DISPLAY_VALUE"]);
	}
}

if ($arResult["DISPLAY_PROPERTIES"]["PHOTOS"])
{
	if ($arResult["DISPLAY_PROPERTIES"]["PHOTOS"]["FILE_VALUE"]["ID"])
	{
		$arResult["DISPLAY_PROPERTIES"]["PHOTOS"]["FILE_VALUE"] = array($arResult["DISPLAY_PROPERTIES"]["PHOTOS"]["FILE_VALUE"]);
	}
	foreach ($arResult["DISPLAY_PROPERTIES"]["PHOTOS"]["FILE_VALUE"] as $i => $file)
	{
		$arImg = CFile::ResizeImageGet($file, array("width" => $arParams["BIG_WIDTH"], "height" => $arParams["BIG_HEIGHT"]), intval($arParams["BIG_RESIZE_TYPE"]), true);
		if ($arImg)
		{
			$file["BIG"]["SRC"] = $arImg["src"];
			$file["BIG"]["WIDTH"] = $arImg["width"];
			$file["BIG"]["HEIGHT"] = $arImg["height"];
			$file["BIG"]["ALT"] = $arResult["IPROPERTY_VALUES"]["ELEMENT_PREVIEW_PICTURE_FILE_ALT"];
			$file["BIG"]["TITLE"] = $arResult["IPROPERTY_VALUES"]["ELEMENT_DETAIL_PICTURE_FILE_TITLE"];
		}

		$arImg = CFile::ResizeImageGet($file, array("width" => $arParams["SMALL_WIDTH"], "height" => $arParams["SMALL_HEIGHT"]), intval($arParams["SMALL_RESIZE_TYPE"]), true);
		if ($arImg)
		{
			$file["SMALL"]["SRC"] = $arImg["src"];
			$file["SMALL"]["WIDTH"] = $arImg["width"];
			$file["SMALL"]["HEIGHT"] = $arImg["height"];
			$file["SMALL"]["ALT"] = $arResult["IPROPERTY_VALUES"]["ELEMENT_PREVIEW_PICTURE_FILE_ALT"];
			$file["SMALL"]["TITLE"] = $arResult["IPROPERTY_VALUES"]["ELEMENT_DETAIL_PICTURE_FILE_TITLE"];
		}
		$arResult["DISPLAY_PROPERTIES"]["PHOTOS"]["FILE_VALUE"][$i] = $file;
	}
}

if ($arResult["DISPLAY_PROPERTIES"]["MAP"])
{
	$arResult["COORDS"] = explode(",", $arResult["DISPLAY_PROPERTIES"]["MAP"]["VALUE"]);
	$arResult["JSON"]["ADDRESS"] = array(
		"TITLE" => $arResult["NAME"],
		"LAT" => doubleval($arResult["COORDS"][0]),
		"LNG" => doubleval($arResult["COORDS"][1]),
	);
	$arResult["JSON"]["CENTER"] = array(
		"LAT" => doubleval($arResult["COORDS"][0]),
		"LNG" => doubleval($arResult["COORDS"][1]),
	);
}
elseif ($arResult["STORE"]["GPS_N"] && $arResult["STORE"]["GPS_S"])
{
	$arResult["JSON"]["ADDRESS"] = array(
		"TITLE" => $arResult["NAME"],
		"LAT" => doubleval($arResult["STORE"]["GPS_N"]),
		"LNG" => doubleval($arResult["STORE"]["GPS_S"]),
	);
	$arResult["JSON"]["CENTER"] = array(
		"LAT" => doubleval($arResult["STORE"]["GPS_N"]),
		"LNG" => doubleval($arResult["STORE"]["GPS_S"]),
	);
}