<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}
if ($arResult["ITEMS"]) {
    foreach ($arResult["ITEMS"] as $i => $item) {
        if ($item["COVER"]) {
            $img = resizeImageIV(
                $item["COVER"],
                array(
                    "width" => $arParams["WIDTH"],
                    "height" => $arParams["HEIGHT"]
                )
            );
            if ($img) {
            	$img['ALT'] = $arParams["ALT"];
            	$img['TITLE'] = $arParams["TITLE"];
                $item["COVER"] = $img;
            }
        }
        $arResult["ITEMS"][$i] = $item;
    }
}