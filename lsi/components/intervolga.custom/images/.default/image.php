<?php
$element = $arResult["VARIABLES"]["ELEMENT_CODE"];
$picture = $arResult["VARIABLES"]["PICTURE_NAME"];
$dbElements = CIBlockElement::getList(array(), array("CODE" => $element), false, false, array("ID", "DETAIL_PICTURE", "PROPERTY_MORE_PHOTO"));
$arPict = array();
while ($arEl = $dbElements->fetch())
{
	$arPict[$arEl["DETAIL_PICTURE"]] = $arEl["DETAIL_PICTURE"];
	$arPict[$arEl["PROPERTY_MORE_PHOTO_VALUE"]] = $arEl["PROPERTY_MORE_PHOTO_VALUE"];
}
if(!empty($arPict))
{
	$str = "";
	foreach ($arPict as $pict)
	{
		$str .= $pict.", ";
	}
	$dbPict = CFile::GetList(array(), array("@ID" => $str));
	while ($arPicture = $dbPict->fetch())
	{
		preg_match("/(.+)\.(.+)$/", $arPicture["ORIGINAL_NAME"], $matches);
		if($picture == CUtil::translit($matches[1], "ru"))
		{
			$GLOBALS['APPLICATION']->RestartBuffer();
			header("Content-Type: image/".$matches[2]);
			$path = "http://".$_SERVER["SERVER_NAME"]."/upload/".$arPicture["SUBDIR"]."/".$arPicture["FILE_NAME"];
			readfile($path);
			die;
		}
		else
		{
			CHTTP::SetStatus("404 Not Found");
		}
	}
}
