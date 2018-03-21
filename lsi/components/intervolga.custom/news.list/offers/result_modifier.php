<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if($arParams["DISPLAY_PICTURE"]!="N" && $arParams["RESIZE_PREVIEW_PICT"]=="Y") {
    foreach($arResult["ITEMS"] as $i => $arItem) {
        if (is_array($arItem["PREVIEW_PICTURE"])) {
            $arResult["ITEMS"][$i]['PREVIEW_PICTURE_SMALL'] = $arItem["PREVIEW_PICTURE"];
        }
        elseif (is_array($arItem["DETAIL_PICTURE"]))
        {
            $arResult["ITEMS"][$i]['PREVIEW_PICTURE_SMALL'] = $arItem["DETAIL_PICTURE"];
        }
    }
}

if($arParams['DISPLAY_DATE']=='Y') {
    foreach ($arResult["ITEMS"] as $i => $arItem) {
        if ($arItem["DISPLAY_PROPERTIES"]['DATE_FROM']) {
            $arResult["ITEMS"][$i]['DATE_ACTIVE_FROM_FORMATED']
                = ConvertDateTime($arItem["DISPLAY_PROPERTIES"]['DATE_FROM']["VALUE"], $arParams['ACTIVE_DATE_FORMAT']);
        }
        if ($arItem["DISPLAY_PROPERTIES"]['DATE_TO']) {
            $arResult["ITEMS"][$i]['DATE_ACTIVE_TO_FORMATED']
                = ConvertDateTime($arItem["DISPLAY_PROPERTIES"]['DATE_TO']["VALUE"], $arParams['ACTIVE_DATE_FORMAT']);
        }
    }
}
?>
