<?php
defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED === true || die();

use Intervolga\Custom\Iblock\Company;
use Intervolga\Custom\Iblock\Offer;

$isNeedFilter = INTERVOLGA_GARANT_CATALOG_OFFERS == 'Y' || INTERVOLGA_GARANT_CATALOG_COMPANIES == 'Y';

if ($isNeedFilter)
{
	$maxDepthLevel = 0;
	$arSectionsShortInfo = array();
}

foreach ($arResult['SECTIONS'] as $arSection)
{
	if ($arSection['CODE'] == $arParams['CURRENT_SECTION'])
	{
		if ($arSection['DEPTH_LEVEL'] == 1)
		{
			$arResult['CURRENT_SECTION'] = $arSection['ID'];
		} else
		{
			$arResult['CURRENT_SECTION'] = $arSection['IBLOCK_SECTION_ID'];
		}
	}

	if ($isNeedFilter)
	{
		// Высчитать максимальную глубину секций
		if ($maxDepthLevel < $arSection['DEPTH_LEVEL'])
		{
			$maxDepthLevel = $arSection['DEPTH_LEVEL'];
		}

		// Выбрать необходимую информацию о секциях
		$arSectionsShortInfo[$arSection['ID']]['IBLOCK_SECTION_ID'] = $arSection['IBLOCK_SECTION_ID'];
		$arSectionsShortInfo[$arSection['ID']]['ELEMENT_CNT'] = $arSection['ELEMENT_CNT'];
		$arSectionsShortInfo[$arSection['ID']]['DEPTH_LEVEL'] = $arSection['DEPTH_LEVEL'];
		$arSectionsShortInfo[$arSection['ID']]['NEW_ELEMENT_CNT'] = 0;
	}
}

if ($isNeedFilter)
{
	// Получить идентификаторы предложений
	$arFilterOffers = array(
		'IBLOCK_ID' => (INTERVOLGA_GARANT_CATALOG_OFFERS == 'Y') ? Offer::getIblockId() : Company::getIblockId(),
		'ACTIVE' => 'Y',
		array(
			'LOGIC' => 'OR',
			array('PROPERTY_ACCEPT_MODERATION' => 1),
			array('PROPERTY_COMMENT' => false),
		),
	);

	$arSelectOffers = array(
		'ID'
	);

	$dbResOffers = CIBlockElement::GetList(array(), $arFilterOffers, false, false, $arSelectOffers);
	$arOffersIds = array();
	while ($arOfferRes = $dbResOffers->GetNext())
	{
		$arOffersIds[] = $arOfferRes['ID'];
	}

	// Сгруппировать секции и их предложения
	$arSectionsOffers = array();
	if ($arOffersIds)
	{
		$dbResSectionsOffers = CIBlockElement::GetElementGroups($arOffersIds, true);
		while ($arSectionsOffersRes = $dbResSectionsOffers->GetNext())
		{
			$arSectionsOffers[$arSectionsOffersRes['ID']][] = $arSectionsOffersRes['IBLOCK_ELEMENT_ID'];
		}
	}

	// Высчитать кол-во предложений для сгруппированных секций
	$arSectionsOffersCnt = array();
	if ($arSectionsOffers)
	{
		foreach ($arSectionsOffers as $sectionId => $arSectionOffers)
		{
			$arSectionsOffersCnt[$sectionId] = count($arSectionOffers);
		}
	}

	// Высчитать кол-во предложений для каждой секции дерева секций
	for ($i = $maxDepthLevel; $i >= 1; $i--)
	{
		foreach ($arSectionsShortInfo as $id => $arSectionShortInfo)
		{
			if ($arSectionShortInfo['DEPTH_LEVEL'] == $i)
			{
				if (key_exists($id, $arSectionsOffersCnt))
				{
					$arSectionsShortInfo[$id]['NEW_ELEMENT_CNT'] += $arSectionsOffersCnt[$id];
				}

				if ($arSectionShortInfo['IBLOCK_SECTION_ID'])
				{
					$arSectionsShortInfo[$arSectionShortInfo['IBLOCK_SECTION_ID']]['NEW_ELEMENT_CNT'] += $arSectionsShortInfo[$id]['NEW_ELEMENT_CNT'];
				}
			}
		}
	}

	// Занести значения в $arResult
	foreach ($arResult['SECTIONS'] as $index => $arSection)
	{
		$arResult['SECTIONS'][$index]['ELEMENT_CNT'] = $arSectionsShortInfo[$arSection['ID']]['NEW_ELEMENT_CNT'];
	}
}
