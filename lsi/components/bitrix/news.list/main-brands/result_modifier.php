<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if($arParams["DISPLAY_PICTURE"]!="N" && $arParams["RESIZE_PREVIEW_PICT"]=="Y") {

    foreach($arResult["ITEMS"] as $i => $arItem) {
        if (is_array($arItem["PREVIEW_PICTURE"])) {
            $arImage = resizeImageIV(
                $arItem["PREVIEW_PICTURE"]["ID"],
                array(
                    "width" => $arParams["PREVIEW_PICT_W"],
                    "height" => $arParams["PREVIEW_PICT_H"],
                    "resize_type" => constant($arParams['PREVIEW_PICT_RES_TYPE']),
                    "permit_extensions" => true
                )
            );
            if ($arImage) {
                $arResult["ITEMS"][$i]['PREVIEW_PICTURE_SMALL'] = $arImage;
            }
        }
    }
}

?>
