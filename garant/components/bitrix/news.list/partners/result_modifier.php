<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
use Intervolga\Common\TemplateParameters;

$imgSize = TemplateParameters::getResizeParam("news_list_partners");

foreach ($arResult["ITEMS"] as $index => $arItem) {
    if ($arItem["FIELDS"]["PREVIEW_PICTURE"]) {
        $img = resizeImageIV($arItem["FIELDS"]["PREVIEW_PICTURE"], $imgSize);
        $arResult["ITEMS"][$index]["FIELDS"]["PREVIEW_PICTURE"] = $img;
    } else {
        $arResult["ITEMS"][$index]["FIELDS"]["PREVIEW_PICTURE"]["SRC"] = $imgSize["src"];
    }
}