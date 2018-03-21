<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
	die();
}

if(is_array($arResult['ELEMENTS'])) {
	foreach ($arResult['ELEMENTS'] as $i => $arItem) {
		if ($arItem['ITEM']['DETAIL_PICTURE']) {
			$detailPicture = CFile::GetFileArray($arItem['ITEM']['DETAIL_PICTURE']);
			$arResult['ELEMENTS'][$i]['ITEM']['DETAIL_PICTURE'] = resizeImageIV(
				$detailPicture,
				array(
					'height' => 50,
					'width' => 80,
					'resize_type' => BX_RESIZE_IMAGE_PROPORTIONAL,
					'permit_extensions' => true,
					'background' => array("r" => 255, "g" => 255, "b" => 255, "a" => 0)
				)
			);
		}
	}
}
