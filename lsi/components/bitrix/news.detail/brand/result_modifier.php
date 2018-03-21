<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Web\Uri;

$arResult["COLUMNS"] = 4;
if ($arResult["ID"])
{
	// Сжать изображения элементов
	if (isset($arParams["RESIZE_TYPE"]) && $arParams["RESIZE_TYPE"] != -1 && $arParams["WIDTH"] && $arParams["HEIGHT"])
	{
		if ($arResult["FIELDS"]["PREVIEW_PICTURE"])
		{
			$arImg = CFile::ResizeImageGet($arResult["FIELDS"]["PREVIEW_PICTURE"], array(
				"width" => $arParams["WIDTH"],
				"height" => $arParams["HEIGHT"]
			), intval($arParams["RESIZE_TYPE"]), true);
			if ($arImg)
			{
				$arResult["FIELDS"]["PREVIEW_PICTURE"]["SRC"] = $arImg["src"];
				$arResult["FIELDS"]["PREVIEW_PICTURE"]["WIDTH"] = $arImg["width"];
				$arResult["FIELDS"]["PREVIEW_PICTURE"]["HEIGHT"] = $arImg["height"];
			}
		}
	}
	if ($arResult["EXTERNAL_ID"])
	{
		// Найти товары с указанным брендом
		$enumVariant = \Bitrix\Iblock\PropertyEnumerationTable::getList(array(
			"filter" => array(
				"=PROPERTY.CODE" => "BREND_",
				"=PROPERTY.IBLOCK_ID" => IBLOCK_ID_CATALOG,
				"=XML_ID" => $arResult["EXTERNAL_ID"],
			),
			"select" => array(
				"ID",
				"VALUE",
				"PROPERTY.ID",
			),
		))->fetch();
		if ($enumVariant)
		{
			/** @noinspection PhpDynamicAsStaticMethodCallInspection */
			$elements = \CIBlockElement::GetList(
				array("ID" => "ASC"),
				array(
					"IBLOCK_ID" => IBLOCK_ID_CATALOG,
					"ACTIVE" => "Y",
					"PROPERTY_BREND_" => $enumVariant["ID"]
				),
				false,
				false,
				array(
					"ID",
					"IBLOCK_SECTION_ID"
				)
			);
			$groupsCount = array();
			while ($element = $elements->fetch())
			{
				if ($element["IBLOCK_SECTION_ID"])
				{
					$groupsCount[$element["IBLOCK_SECTION_ID"]]++;
				}
			}
			if ($groupsCount)
			{
				// Найти разделы этих товаров
				$rsSections = CIBlockSection::GetList(
					array("SORT" => "ASC", "ID" => "DESC"),
					array(
						"IBLOCK_ID" => IBLOCK_ID_CATALOG,
						"ACTIVE" => "Y",
						"ID" => array_keys($groupsCount),
					),
					false,
					array("ID", "NAME", "SECTION_PAGE_URL", "PICTURE")
				);
				while ($section = $rsSections->GetNext())
				{
					if($section["PICTURE"]){
						$arImg = CFile::ResizeImageGet(
							CFile::GetFileArray($section["PICTURE"]),
							array("width" => 60),
							intval($arParams["RESIZE_TYPE"]),
							true
						);
						$section["IMG"] = $arImg['src'];
					}else{
						$section["IMG"] = SITE_TEMPLATE_PATH . '/images/empty_w60.png';
					}

					$arResult["SECTIONS"][$section["ID"]] = $section;
					$arResult["SECTIONS"][$section["ID"]]["CNT"] = $groupsCount[$section["ID"]];

					/*if ($arParams["SMART_FILTER_NAME"])
					{
						// Сформировать ссылку на раздел с фильтром
						$filterName = $arParams["SMART_FILTER_NAME"];
						$propertyId = $enumVariant["IBLOCK_PROPERTY_ENUMERATION_PROPERTY_ID"];
						$crc = abs(crc32($enumVariant["ID"]));
						$params = array(
							$filterName . "_" . $propertyId . "_" . $crc => "Y",
							"set_filter" => "Y",
						);

						$uri = new Uri($section["SECTION_PAGE_URL"]);
						$uri->addParams($params);
						$arResult["SECTIONS"][$section["ID"]]["FILTER_URL"] = $uri->getUri();
					}
					else
					{
						$arResult["SECTIONS"][$section["ID"]]["FILTER_URL"] = $section["SECTION_PAGE_URL"];
					}*/
					$filterUrl = $section["SECTION_PAGE_URL"]
						. 'filter/brend_-is-' . $arResult["EXTERNAL_ID"] . '/apply/';

					$filterSection = CIBlockSection::GetList(
						array(),
						array(
							'SECTION_ID' => $section["ID"],
							'IBLOCK_ID' => $section['IBLOCK_ID'],
							'=UF_FILTER_URL' => $filterUrl
						),
						false,
						array('ID', 'UF_FILTER_URL', 'SECTION_PAGE_URL')
					)->GetNext();
					if($filterSection) {
						$filterUrl = $filterSection['SECTION_PAGE_URL'];
					}

					$arResult["SECTIONS"][$section["ID"]]["FILTER_URL"] = $filterUrl;
				}
			}
		}
	}
}
if (isset($enumVariant))
{
	$arResult["ENUM_ID"] = $enumVariant["ID"];
}
if (isset($groupsCount))
{
	$arResult["PRODUCTS_FOUND"] = array_sum($groupsCount);
}
$this->__component->SetResultCacheKeys(array("ENUM_ID", "PRODUCTS_FOUND"));