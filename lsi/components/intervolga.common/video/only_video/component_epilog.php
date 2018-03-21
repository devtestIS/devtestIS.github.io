<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

CJSCore::Init('jquery');


foreach ($arResult["ITEMS"] as $arVideo)
{
	if ($arVideo["TYPE"] == "Intervolga\\Common\\Iblock\\LocalVideo")
	{
		$APPLICATION->AddHeadScript('/bitrix/components/bitrix/player/mediaplayer/jwplayer.js');
	}
}