<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arResult['COUNT_CAN_BUY'] = 0;
foreach ($arResult["GRID"]["ROWS"] as $k=>$item) {
	if ($item["DELAY"] == "N" && $item["CAN_BUY"] == "Y") {
		$arResult['COUNT_CAN_BUY']++;
	}
	$traits = array();
	$db = CIBlockElement::GetProperty(
		IBLOCK_ID_CATALOG,
		$item['PRODUCT_ID'],
		array(),
		array('CODE' => 'CML2_TRAITS')
	);
	while($val = $db->Fetch()){
		$traits[$val['DESCRIPTION']] = $val['VALUE'];
	}
	$arResult["GRID"]["ROWS"][$k]['TRAITS'] = $traits;
	if($item["DETAIL_PICTURE"]){
		$picture = CFile::GetFileArray($item["DETAIL_PICTURE"]);
		if($picture){
			$arResult["GRID"]["ROWS"][$k]["DETAIL_PICTURE"] = ResizeImageGetIV(
				$picture,
				array('height' => 100, 'width' => 150),
				BX_RESIZE_IMAGE_PROPORTIONAL
			);
		}
	}
}