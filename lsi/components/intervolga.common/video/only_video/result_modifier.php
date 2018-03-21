<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

foreach ($arResult["ITEMS"] as &$arVideo) {
    if ($arVideo["TYPE"] == "Intervolga\\Common\\Iblock\\YoutubeVideo") {
        $arVideo["PROVIDER"] = "youtube";
        $arVideo["SRC"] = $arVideo["YOUTUBE"]["EMBED"];
    } elseif ($arVideo["TYPE"] == "Intervolga\\Common\\Iblock\\LocalVideo") {
        $arVideo["PROVIDER"] = "local";
        $arVideo["SRC"] = $arVideo["LOCAL"]["VIDEO"];
    } else {
        $arVideo["PROVIDER"] = "none";
    }

    if (!is_array($arVideo["COVER"])) {
        $arVideo["COVER"] = array(
            "src" => "data:image/gif;base64,R0lGODdhAgACAIAAAAAAAP///ywAAAAAAgACAAACAoRRADs=",
            "width" => $arParams["WIDTH"],
            "height" => $arParams["HEIGHT"]
        );
    } else {
        $arVideo["COVER"] = ResizeImageGetIV($arVideo["COVER"],
            array('width' => $arParams["WIDTH"], 'height' => $arParams["HEIGHT"]), BX_RESIZE_IMAGE_EXACT);
    }

}
unset($arVideo);