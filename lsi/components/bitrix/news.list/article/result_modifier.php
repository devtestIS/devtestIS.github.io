<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if($arParams["DISPLAY_PICTURE"]!="N" && $arParams["RESIZE_PREVIEW_PICT"]=="Y") {

    foreach($arResult["ITEMS"] as $i => $arItem) {
        if (is_array($arItem["PREVIEW_PICTURE"])) {

            $arImage = ResizeImageGetIV($arItem["PREVIEW_PICTURE"], array('width'=>$arParams['PREVIEW_PICT_W'], 'height'=>$arParams['PREVIEW_PICT_H']), constant($arParams['PREVIEW_PICT_RES_TYPE']));

            if ($arImage) {
                $arResult["ITEMS"][$i]['PREVIEW_PICTURE_SMALL'] = $arImage;
                $arResult["ITEMS"][$i]['PREVIEW_PICTURE_SMALL']["ALT"] = $arResult["PREVIEW_PICTURE"]["ALT"];
                $arResult["ITEMS"][$i]['PREVIEW_PICTURE_SMALL']["TITLE"] = $arResult["PREVIEW_PICTURE"]["TITLE"];
                $arResult["ITEMS"][$i]['PREVIEW_PICTURE_SMALL']["DESCRIPTION"] = $arResult["PREVIEW_PICTURE"]["DESCRIPTION"];
            }
        }
    }
}
if($arParams['DISPLAY_DATE']=='Y') {
    foreach ($arResult["ITEMS"] as $i => $arItem) {
        if (!$arItem['DISPLAY_ACTIVE_FROM']) {
            $arResult["ITEMS"][$i]['DISPLAY_ACTIVE_FROM']
                = ConvertDateTime($arItem['TIMESTAMP_X'], $arParams['ACTIVE_DATE_FORMAT'], 'ru');
        }
    }
}
?>
