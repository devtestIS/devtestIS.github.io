<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

foreach($arResult["ITEMS"] as $i => $arItem) {
	if (is_array($arItem["PREVIEW_PICTURE"])) {
		$arImage = ResizeImageGetIV($arItem["PREVIEW_PICTURE"], array('height'=>34), BX_RESIZE_IMAGE_PROPORTIONAL);

		if ($arImage) {
			$arResult["ITEMS"][$i]['PREVIEW_PICTURE'] = $arImage;
		}
	}
}

?>
