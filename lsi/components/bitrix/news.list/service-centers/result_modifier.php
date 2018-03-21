<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

if ($arResult["ITEMS"])
{
	$arResult["TABLE"]["HEADERS"] = array();
	if (in_array("BRANDS", $arParams["PROPERTY_CODE"]))
	{
		$arResult["TABLE"]["HEADERS"]["BRAND"] = Loc::getMessage("INTERVOLGA_CUSTOM.BRAND");
	}
	if (in_array("NAME", $arParams["FIELD_CODE"]))
	{
		$arResult["TABLE"]["HEADERS"]["NAME"] = Loc::getMessage("INTERVOLGA_CUSTOM.SERVICE_CENTER");
	}
	if (in_array("ADDRESS", $arParams["PROPERTY_CODE"]))
	{
		$arResult["TABLE"]["HEADERS"]["ADDRESS"] = Loc::getMessage("INTERVOLGA_CUSTOM.ADDRESS");
	}
	if (in_array("PHONES", $arParams["PROPERTY_CODE"]))
	{
		$arResult["TABLE"]["HEADERS"]["PHONES"] = Loc::getMessage("INTERVOLGA_CUSTOM.PHONE");
	}

	foreach ($arResult["ITEMS"] as $item)
	{
		$this->AddEditAction($item["ID"], $item["EDIT_LINK"], CIBlock::GetArrayByID($item["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($item["ID"], $item["DELETE_LINK"], CIBlock::GetArrayByID($item["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage("CT_BNL_ELEMENT_DELETE_CONFIRM")));
		$id = $this->GetEditAreaId($item["ID"]);

		$row = array();
		if ($arResult["TABLE"]["HEADERS"]["BRAND"])
		{
			$row["BRAND"] = "";
			if ($item["DISPLAY_PROPERTIES"]["BRANDS"])
			{
				$brands = $item["DISPLAY_PROPERTIES"]["BRANDS"]["DISPLAY_VALUE"];
				if (!is_array($brands))
				{
					$brands = array($brands);
				}
				foreach ($brands as $i => $brand)
				{
					$brands[$i] = strip_tags($brand);
				}

				$row["BRAND"] = implode(", ", $brands);
			}
		}
		if ($arResult["TABLE"]["HEADERS"]["NAME"])
		{
			$row["NAME"] = $item["NAME"];
		}
		if ($arResult["TABLE"]["HEADERS"]["ADDRESS"])
		{
			$row["ADDRESS"] = $item["DISPLAY_PROPERTIES"]["ADDRESS"]["DISPLAY_VALUE"];
		}
		if ($arResult["TABLE"]["HEADERS"]["PHONES"])
		{
			$row["PHONES"] = $item["DISPLAY_PROPERTIES"]["PHONES"]["DISPLAY_VALUE"];
		}
		$arResult["TABLE"]["ROWS"][$id] = $row;
	}
}