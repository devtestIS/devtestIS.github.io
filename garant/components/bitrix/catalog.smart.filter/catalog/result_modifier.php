<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

use Bitrix\Main\Loader;

$arCitiesNames = array();

foreach ($arResult['ITEMS'] as $indexProp => $arProperty)
{
	if ($arProperty['CODE'] == 'CITY')
	{
		foreach ($arProperty['VALUES'] as $index => $arPropertyValue)
		{
			if (!empty($arParams['CITIES_LIST']))
			{
				if (!in_array($arPropertyValue['VALUE'], $arParams['CITIES_LIST']))
				{
					unset($arResult['ITEMS'][$indexProp]['VALUES'][$index]);
					continue;
				}
			}

			if ($arPropertyValue['CHECKED'])
			{
				$arCitiesNames[] = $arPropertyValue['VALUE'];
			}
		}
	}
}

$arResult["TAGS_JSON"] = Bitrix\Main\Web\Json::encode($arCitiesNames);
