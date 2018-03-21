<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
use Intervolga\Common\TemplateParameters;

$imgSizeDetail = TemplateParameters::getResizeParam("news_list_slider_detail");
$imgSizePreview = TemplateParameters::getResizeParam("news_list_slider_preview");

foreach ($arResult["ITEMS"] as $index => $arItem) {
	// Широкая картинка
    if ($arItem["FIELDS"]["DETAIL_PICTURE"]) {
        $img = resizeImageIV($arItem["FIELDS"]["DETAIL_PICTURE"], $imgSizeDetail);
        $arResult["ITEMS"][$index]["FIELDS"]["DETAIL_PICTURE"] = $img;
    } else {
		$arResult["ITEMS"][$index]["FIELDS"]["DETAIL_PICTURE"]["SRC"] = $imgSizeDetail["src"];
    }

    // Картинка для мобильных
	if ($arItem["FIELDS"]["PREVIEW_PICTURE"]) {
		$img = resizeImageIV($arItem["FIELDS"]["PREVIEW_PICTURE"], $imgSizePreview);
		$arResult["ITEMS"][$index]["FIELDS"]["PREVIEW_PICTURE"] = $img;
	} else {
		$arResult["ITEMS"][$index]["FIELDS"]["PREVIEW_PICTURE"]["SRC"] = $imgSizePreview["src"];
	}
}