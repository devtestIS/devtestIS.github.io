<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$arResult["MAX_RATING"] = 5;
if ($arResult["ITEMS"])
{
	foreach ($arResult["ITEMS"] as $i => $item)
	{
		$item["PRODUCT"] = array();
		if ($item["DISPLAY_PROPERTIES"]["PRODUCT"])
		{
			$productId = $item["DISPLAY_PROPERTIES"]["PRODUCT"]["VALUE"];
			if ($product = $item["DISPLAY_PROPERTIES"]["PRODUCT"]["LINK_ELEMENT_VALUE"][$productId])
			{
				$item["PRODUCT"]["NAME"] = $product["NAME"];
				$item["PRODUCT"]["URL"] = $product["DETAIL_PAGE_URL"];
				$pictureFields = array("PREVIEW_PICTURE", "DETAIL_PICTURE");
				foreach ($pictureFields as $pictureField)
				{
					if ($product[$pictureField])
					{
						$resizeType = $arParams["RESIZE_TYPE"];
						$height = $arParams["HEIGHT"];
						$width = $arParams["WIDTH"];
						if ($resizeType && $height && $width)
						{
							$arImg = resizeImageIV(
								$product[$pictureField],
								array(
									"width" => $arParams["WIDTH"],
									"height" => $arParams["HEIGHT"],
									"resize_type" => $arParams["RESIZE_TYPE"],
									"permit_extensions" => true
								)
							);
							if ($arImg)
							{
								$item["PRODUCT"]["IMG"] = $arImg["SRC"];
							}
						}
						else
						{
							$item["PRODUCT"]["IMG"] = CFile::GetPath($product[$pictureField]);
						}
						break;
					}
				}
			}
			if (!$item["PRODUCT"]["NAME"] && $item["DISPLAY_PROPERTIES"]["PRODUCT_NAME"])
			{
				$item["PRODUCT"]["NAME"] = $item["DISPLAY_PROPERTIES"]["PRODUCT_NAME"]["DISPLAY_VALUE"];
			}
			if (!$item["PRODUCT"]["IMG"])
			{
				$item["PRODUCT"]["IMG"] = SITE_TEMPLATE_PATH . "/images/empty_h185.png";
			}
		}

		if ($item["FIELDS"]["DATE_CREATE"] && $arParams["ACTIVE_DATE_FORMAT"])
		{
			$time = strtotime($item["FIELDS"]["DATE_CREATE"]);
			$item["FIELDS"]["DATE_CREATE"] = CIBlockFormatProperties::DateFormat($arParams["ACTIVE_DATE_FORMAT"], $time);
		}

		$arResult["ITEMS"][$i] = $item;
	}
}