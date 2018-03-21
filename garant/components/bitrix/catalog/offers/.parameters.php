<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Loader;
use Bitrix\Iblock;

use Intervolga\Custom\Iblock\Company;
use Intervolga\Custom\Iblock\Offer;

if (!Loader::includeModule('iblock'))
	return;

$arTemplateParameters = array();

// Вывод свойств элемента
$arProperty = array();
foreach($arCurrentValues['DETAIL_PROPERTY_CODE'] as $propCode)
{
	$arProperty[$propCode] = $propCode;
};

$arTemplateParameters["ELEMENT_PROPERTY_CODE"] = array(
	"PARENT" => "DETAIL_SETTINGS",
	"NAME" => GetMessage("ELEMENT_IBLOCK_PROPERTY"),
	"TYPE" => "LIST",
	"MULTIPLE" => "Y",
	"VALUES" => $arProperty,
	"SIZE" => (count($arProperty) > 5 ? 8 : 3),
	"REFRESH" => "N",
	"ADDITIONAL_VALUES" => "N"
);

// Вывод свойств компании предложения
if ($arCurrentValues['IBLOCK_ID'] == Offer::getIblockId())
{
	$arProperty = array();

	$propertyIterator = Iblock\PropertyTable::getList(array(
		'select' => array('ID', 'IBLOCK_ID', 'NAME', 'CODE', 'PROPERTY_TYPE', 'MULTIPLE', 'LINK_IBLOCK_ID', 'USER_TYPE', 'SORT'),
		'filter' => array('=IBLOCK_ID' => Company::getIblockId(), '=ACTIVE' => 'Y'),
		'order' => array('SORT' => 'ASC', 'NAME' => 'ASC')
	));

	while ($property = $propertyIterator->fetch())
	{
		$propertyCode = (string)$property['CODE'];
		if ($propertyCode == '')
			$propertyCode = $property['ID'];
		$propertyName = '['.$propertyCode.'] '.$property['NAME'];

		if ($property['PROPERTY_TYPE'] != Iblock\PropertyTable::TYPE_FILE)
		{
			$arProperty[$propertyCode] = $propertyName;
		}
	}
	unset($propertyCode, $propertyName, $property, $propertyIterator);

	$arTemplateParameters["COMPANY_PROPERTY_CODE"] = array(
		"PARENT" => "DETAIL_SETTINGS",
		"NAME" => GetMessage("COMPANY_IBLOCK_PROPERTY"),
		"TYPE" => "LIST",
		"MULTIPLE" => "Y",
		"VALUES" => $arProperty,
		"SIZE" => (count($arProperty) > 5 ? 8 : 3),
		"REFRESH" => "N",
		"ADDITIONAL_VALUES" => "N"
	);
}