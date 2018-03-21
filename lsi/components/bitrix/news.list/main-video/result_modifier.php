<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

foreach($arResult["ITEMS"] as &$arItem){
    if($arItem['PROPERTIES']['SRC']['VALUE'] && $arItem['PROPERTIES']['SRC']['VALUE']['YOUTUBE']['COVER']){
        $arItem['PROPERTIES']['SRC']['VALUE']['YOUTUBE']['COVER'] =
            CFile::GetFileArray($arItem['PROPERTIES']['SRC']['VALUE']['YOUTUBE']['COVER']);
        $arItem['PROPERTIES']['SRC']['VALUE']['YOUTUBE']['COVER'] =
            ResizeImageGetIV(
                $arItem['PROPERTIES']['SRC']['VALUE']['YOUTUBE']['COVER'],
                array('width' => 300),
                BX_RESIZE_IMAGE_PROPORTIONAL
            );
    }
}
unset($arItem);
?>
