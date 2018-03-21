<?php
defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED === true || die();

use Intervolga\Custom\Iblock\Offer;
use Intervolga\Custom\Iblock\Company;
use Intervolga\Migrato\Data\Module\Main\Group;

$sections = array();
$dbSection = Bitrix\Iblock\SectionTable::getList(array(
	'filter' => array(
		'DEPTH_LEVEL' => 2,
		'ACTIVE' => "Y",
		'IBLOCK_ID' => $arParams['IBLOCK_ID']
		),
	'select' => array('ID','NAME')
));
while ($arSection = $dbSection->fetch()) {
	$sections[$arSection['ID']] = $arSection['NAME'];
}

$arResult["TAGS_JSON"] = Bitrix\Main\Web\Json::encode($sections);
if ($arResult['PROPERTIES'] && $arParams['PROPERTY_CODES_HIDDEN'])
{
	foreach ($arResult['PROPERTIES'] as $idProperty => $property)
	{
		$arResult['PROPERTIES'][$idProperty]['IS_HIDDEN'] = '';
		if (in_array($idProperty, $arParams['PROPERTY_CODES_HIDDEN']))
		{
			$arResult['PROPERTIES'][$idProperty]['IS_HIDDEN'] = 'Y';
		}
	}
}

if (!isset($arResult['ELEMENT']))
{
	if (isset($arResult['PROPERTIES']['PROPERTY_EMAIL']))
	{
		if ($arResult['IBLOCK']['ID'] == Offer::getIblockId())
		{
			global $USER;
			$userID = $USER->GetID();

			$userGroups = $USER->GetUserGroup($userID);
			$isModerator = in_array(Group::getPublicId('MODERATORS'), $userGroups);

			if (!$USER->IsAdmin() && !$isModerator)
			{
				$arFilterCompany = array(
					'IBLOCK_ID' => Company::getIblockId(),
					'PROPERTY_MODERATOR' => $userID
				);

				$arSelectCompany = array(
					'ID',
					'NAME',
					'PROPERTY_EMAIL'
				);

				$dbResCompany = \CIBlockElement::GetList(array(), $arFilterCompany, false, false, $arSelectCompany);

				$email = '';
				if ($arCompany = $dbResCompany->GetNext())
				{
					$email = $arCompany['PROPERTY_EMAIL_VALUE'];
				}

				if ($email)
				{
					if (isset($arResult['PROPERTIES']['PROPERTY_EMAIL']['VALUES'][0]))
					{
						$arResult['PROPERTIES']['PROPERTY_EMAIL']['VALUES'][0] = $email;
					} else
					{
						$arResult['PROPERTIES']['PROPERTY_EMAIL']['VALUES'][] = $email;
					}
				}
			}
		}
	}
}
