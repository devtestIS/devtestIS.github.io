<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

// Сжать изображения элементов
if (isset($arParams["RESIZE_TYPE"]) && $arParams["RESIZE_TYPE"] != -1 && $arParams["WIDTH"] && $arParams["HEIGHT"])
{
	foreach ($arResult["ITEMS"] as &$item)
	{
		if ($item["FIELDS"]["PREVIEW_PICTURE"])
		{
			$item["FIELDS"]["PREVIEW_PICTURE"] = resizeImageIV(
				$item["FIELDS"]["PREVIEW_PICTURE"]["ID"],
				array(
					"width" => $arParams["WIDTH"],
					"height" => $arParams["HEIGHT"],
					"resize_type" => $arParams["RESIZE_TYPE"],
					"permit_extensions" => true,
					"background" => array("r" => 255, "g" => 255, "b" => 255, "a" => 0)
				)
			);
		}
	}
}