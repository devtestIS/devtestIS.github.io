<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/**
 * @var array $arResult
 */
foreach($arResult["ITEMS"] as $i => &$arItem)
{
	if($arItem["DISPLAY_PROPERTIES"]["SECTION"]["LINK_SECTION_VALUE"])
	{
		$arSection = reset($arItem["DISPLAY_PROPERTIES"]["SECTION"]["LINK_SECTION_VALUE"]);
	}
	else
	{
		$arSection = CIBlockSection::GetByID($arItem["DISPLAY_PROPERTIES"]["SECTION"]["VALUE"])->GetNext();
	}
    if(!empty($arItem["DETAIL_PICTURE"]))
    {
        $arItem["DETAIL_PICTURE"] = resizeImageIV($arItem["DETAIL_PICTURE"], "slider_picture");
    }
    else
    {
        if($arSection["DETAIL_PICTURE"])
        {
            $arItem["DETAIL_PICTURE"] = resizeImageIV($arSection["DETAIL_PICTURE"], "slider_picture");
        }
        elseif($arSection["PICTURE"])
        {
            $arItem["DETAIL_PICTURE"] = resizeImageIV($arSection["PICTURE"], "slider_picture");
        }
        else
        {
            $arItem["DETAIL_PICTURE"] = resizeImageIV(false, "slider_picture");
        }

        $arItem["DETAIL_PICTURE"]["ALT"] = $arItem["IPROPERTY_VALUES"]["ELEMENT_DETAIL_PICTURE_FILE_ALT"];
        $arItem["DETAIL_PICTURE"]["TITLE"] = $arItem["IPROPERTY_VALUES"]["ELEMENT_DETAIL_PICTURE_FILE_TITLE"];
    }
    $arItem["DETAIL_PAGE_URL"] = $arSection["SECTION_PAGE_URL"];
}
unset($arItem);