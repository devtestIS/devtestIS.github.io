<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/**
 * @var array $arResult
 */

foreach ($arResult["ITEMS"] as &$item) {
	if ($item["PREVIEW_PICTURE"]) {
		$item["PREVIEW_PICTURE"] = resizeImageIV($item["PREVIEW_PICTURE"], 'corp-this');
	} elseif($item["DETAIL_PICTURE"]) {
		$item["PREVIEW_PICTURE"] = resizeImageIV($item["DETAIL_PICTURE"], 'corp-this');
	}
}