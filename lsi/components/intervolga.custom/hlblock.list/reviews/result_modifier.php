<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

foreach ($arResult['ITEMS'] as &$row){
	$row['UF_WRITE'] = date('d.m.Y в h:i', $row['UF_WRITE']->getTimestamp());

	if($row['UF_ELEMENT']){
		$row['PRODUCT'] = CIBlockElement::GetByID($row['UF_ELEMENT'])->GetNext();
		$ipropValues = new Bitrix\Iblock\InheritedProperty\ElementValues($row['PRODUCT']["IBLOCK_ID"], $row['PRODUCT']["ID"]);
		$valuse = $ipropValues->getValues();
		if($row["PRODUCT"]["DETAIL_PICTURE"]){
			$row["PRODUCT"]["DETAIL_PICTURE"] = resizeImageIV(
				$row["PRODUCT"]["DETAIL_PICTURE"],
				array(
					"width" => 220,
					"height" => 185,
					"resize_type" => BX_RESIZE_IMAGE_PROPORTIONAL,
					"permit_extensions" => true
				)
			);
		}else{
			$row["PRODUCT"]["DETAIL_PICTURE"] = array(
				'SRC' => SITE_TEMPLATE_PATH . "/images/empty_h185.png"
			);
		}
		$row["PRODUCT"]["DETAIL_PICTURE"]["ALT"] = $valuse["ELEMENT_PREVIEW_PICTURE_FILE_ALT"];
		$row["PRODUCT"]["DETAIL_PICTURE"]["TITLE"] = $valuse["ELEMENT_PREVIEW_PICTURE_FILE_TITLE"];
	}
}
unset($row);