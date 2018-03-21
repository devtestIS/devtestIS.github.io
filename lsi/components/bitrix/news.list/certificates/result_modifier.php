<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/**
 * @var array $arParams
 * @var array $arResult
 */
$resizeType = $arParams['RESIZE_TYPE'];
foreach ($arResult["ITEMS"] as &$item) {
	if ($item["PREVIEW_PICTURE"]) {
		$item["PREVIEW_PICTURE"] = resizeImageIV($item["PREVIEW_PICTURE"], $resizeType);
	} elseif($item["DETAIL_PICTURE"]) {
		$item["PREVIEW_PICTURE"] = resizeImageIV($item["DETAIL_PICTURE"], $resizeType);
	}
}