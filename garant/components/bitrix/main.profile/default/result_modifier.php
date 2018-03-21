<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

use Intervolga\Common\TemplateParameters;
use Intervolga\Custom\Iblock\Company;
use Intervolga\Custom\Iblock\Offer;
use Intervolga\Migrato\Data\Module\Main\Group;

if (\Bitrix\Main\Loader::includeModule('iblock'))
{
	global $USER;

	$userID = $arResult['ID'];

	$userGroups = $USER->GetUserGroup($userID);
	$isModerator = in_array(Group::getPublicId('MODERATORS'), $userGroups);
	$arResult['IS_MODERATOR'] = $isModerator;

	if ($userID)
	{
		$arSelect = array(
			"ID",
			"IBLOCK_ID",
			"IBLOCK_CODE",
			"NAME",
			"DETAIL_PICTURE",
			"DETAIL_TEXT",
			"PREVIEW_PICTURE",
			"PREVIEW_TEXT",
			"PROPERTY_*"
		);

		$arFilter = array("IBLOCK_ID" => Company::getIblockId(), "ACTIVE" => "Y");
		if ($isModerator)
		{
			$arFilter["PROPERTY_ACCEPT_MODERATION"] = 0;
		}
		else
		{
			$arFilter["PROPERTY_MODERATOR"] = $userID;
		}

		$dbRes = CIBlockElement::GetList(array(), $arFilter, false, array(), $arSelect);
		while ($arCompanyOb = $dbRes->GetNextElement())
		{
			$arCompany = array();
			$arCompany = $arCompanyOb->GetFields();
			$arCompany['PROPERTIES'] = $arCompanyOb->GetProperties();
			$arResult['ELEMENTS']['COMPANIES'][] = $arCompany;
		}

		// Изображения компаний + идентификаторы компаний
		$arCompaniesIDs = array();
		$arImagesIDs = array();
		foreach ($arResult['ELEMENTS']['COMPANIES'] as $arCompany)
		{
			$arCompaniesIDs[] = $arCompany['ID'];
			foreach ($arCompany['PROPERTIES']['IMAGES']['VALUE'] as $imageID)
			{
				$arImagesIDs[] = $imageID;
			}
		}
		$arImagesIDs = implode(',', $arImagesIDs);

		$uploadDir = COption::GetOptionString("main", "upload_dir", "upload");
		$arImages = array();
		if (!empty($arImagesIDs))
		{
			$dbRes = CFile::GetList(array(), array('@ID' => $arImagesIDs));
			while ($arImage = $dbRes->GetNext())
			{
				$arImage['SRC'] = "/" . $uploadDir . "/" . $arImage["SUBDIR"] . "/" . $arImage["FILE_NAME"];
				$arImages[$arImage['ID']] = $arImage;
			}
		}

		$arResult['IMAGES']['COMPANIES'] = !empty($arImages) ? $arImages : array();

		// Ресайз изображений
		$imgSize = TemplateParameters::getResizeParam("main_profile_default_company_images");
		foreach ($arResult['IMAGES']['COMPANIES'] as $key => $arImage)
		{
			$img = resizeImageIV($arImage, $imgSize);
			$arResult['IMAGES']['COMPANIES'][$key] = $img;
		}

		// Список рубрик компаний
		$arRubrics = array();
		$dbRes = \CIBlockElement::GetElementGroups($arCompaniesIDs);
		while ($arItem = $dbRes->GetNext())
		{
			$arRubric['NAME'] = $arItem['NAME'];
			$arRubric['SECTION_PAGE_URL'] = $arItem['SECTION_PAGE_URL'];
			$arRubrics[$arItem['IBLOCK_ELEMENT_ID']][] = $arRubric;
		}

		$arResult['RUBRICS']['COMPANIES'] = $arRubrics;

		$companyID = null;
		if (!$isModerator)
		{
			$companyID = $arResult['ELEMENTS']['COMPANIES'][0]['ID'];
		}

		if ($companyID || $isModerator)
		{
			// Список предложений
			$arSelect = array(
				"ID",
				"IBLOCK_ID",
				"NAME",
				"DETAIL_PICTURE",
				"DETAIL_TEXT",
				"PREVIEW_PICTURE",
				"PREVIEW_TEXT",
				"ACTIVE_TO",
				"PROPERTY_*"
			);

			$arFilter = array("IBLOCK_ID" => Offer::getIblockId(), "ACTIVE" => "Y");
			if (!$isModerator) {
				$arFilter["PROPERTY_COMPANY.ID"] = $companyID;
			}

			$dbRes = CIBlockElement::GetList(array(), $arFilter, false, array(), $arSelect);
			while ($arCompanyOb = $dbRes->GetNextElement())
			{
				$arOffer = array();
				$arOffer = $arCompanyOb->GetFields();
				$arOffer['PROPERTIES'] = $arCompanyOb->GetProperties();
				$arResult['ELEMENTS']['OFFERS'][] = $arOffer;
			}

			// Изображения предложений + идентификаторы предложений
			$arOffersIDs = array();
			$arImagesIDs = array();
			foreach ($arResult['ELEMENTS']['OFFERS'] as $arOffer)
			{
				$arOffersIDs[] = $arOffer['ID'];
				foreach ($arOffer['PROPERTIES']['IMAGES']['VALUE'] as $imageID)
				{
					$arImagesIDs[] = $imageID;
				}
			}
			$arImagesIDs = implode(',', $arImagesIDs);

			$uploadDir = COption::GetOptionString("main", "upload_dir", "upload");
			$arImages = array();
			if (!empty($arImagesIDs))
			{
				$dbRes = CFile::GetList(array(), array('@ID' => $arImagesIDs));
				while ($arImage = $dbRes->GetNext())
				{
					$arImage['SRC'] = "/" . $uploadDir . "/" . $arImage["SUBDIR"] . "/" . $arImage["FILE_NAME"];
					$arImages[$arImage['ID']] = $arImage;
				}
			}

			$arResult['IMAGES']['OFFERS'] = !empty($arImages) ? $arImages : array();

			// Ресайз изображений
			$imgSize = TemplateParameters::getResizeParam("main_profile_default_offers_images");
			foreach ($arResult['IMAGES']['OFFERS'] as $key => $arImage)
			{
				$img = resizeImageIV($arImage, $imgSize);
				$arResult['IMAGES']['OFFERS'][$key] = $img;
			}

			// Список рубрик
			$arRubrics = array();
			$dbRes = \CIBlockElement::GetElementGroups($arOffersIDs);
			while ($arItem = $dbRes->GetNext())
			{
				$arRubric['NAME'] = $arItem['NAME'];
				$arRubric['SECTION_PAGE_URL'] = $arItem['SECTION_PAGE_URL'];
				$arRubrics[$arItem['IBLOCK_ELEMENT_ID']][] = $arRubric;
			}

			$arResult['RUBRICS']['OFFERS'] = $arRubrics;

			// Свойства, которые необходимо выводить
			$arResult['PRINT_PROPERTIES'] = array(
				'CITY',
				'ADDRESS',
				'SITE',
				'EMAIL',
				'CONTACT_FACE',
				'PHONE',
				'INN',
				'DESCRIPTION',
				'ADDITIONAL_DESCRIPTION'
			);
		}
	}
}

