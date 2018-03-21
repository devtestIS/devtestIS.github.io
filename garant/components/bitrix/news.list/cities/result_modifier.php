<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

use Intervolga\Custom\Iblock\Company;
$companyIblockId = Company::getIblockId();
$companyIblockType = 'catalog';

$filesDir =  '/cities/files/';
$filesPath = $_SERVER['DOCUMENT_ROOT'] . $filesDir;
$filesExt = '.php';
$delimeter = '; ';

$arResult["PRINT_CITIES"] = array();
if (count($arResult["ITEMS"]))
{
	foreach ($arResult["ITEMS"] as $index => $arCompanyItem)
	{
		$arCompany = array();
		$arCompany['ID'] = $arCompanyItem['ID'];
		$arCompany['NAME'] = $arCompanyItem['NAME'];
		$arCompany['DETAIL_PAGE_URL'] = $arCompanyItem['DETAIL_PAGE_URL'];
		$arResult["PRINT_CITIES"][$arCompanyItem['DISPLAY_PROPERTIES']['CITY']['VALUE']]['COMPANIES'][] = $arCompany;
	}
}

// Очистка директории
$files = array_diff(scandir($filesPath), array('.','..'));
foreach ($files as $file) {
	unlink("$filesPath/$file");
}

rmdir($filesPath);

// Генерация файлов
foreach ($arResult['PRINT_CITIES'] as $city => $cityInfo)
{
	$contentBody = '';
	if (count($cityInfo['COMPANIES']))
	{
		$contentBody .= '<h6 class="h">Компании</h6><ul>';
	}
	foreach ($cityInfo['COMPANIES'] as $arCompany)
	{
		$cityLinkAdmin = '/bitrix/admin/iblock_element_edit.php?IBLOCK_ID=' . $companyIblockId . '&type=' . $companyIblockType . '&ID=' . $arCompany['ID'] . '&lang=' . LANGUAGE_ID . '&find_section_section=-1&WF=Y';
		$contentBody .= '<li><a href="' . $cityLinkAdmin . '" target="_blank">' . htmlspecialcharsBack($arCompany['NAME']) . '</a></li>';
	}
	if (count($cityInfo['COMPANIES']))
	{
		$contentBody .= '</ul>';
	}

	if ($contentBody)
	{
		$contentHeader = '<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
use Intervolga\Migrato\Data\Module\Main\Group;
$APPLICATION->SetTitle("'.$city.'");
?>
<?
$userID = $USER->getId();
$userGroups = $USER->GetUserGroup($userID);
$isModerator = in_array(Group::getPublicId(\'MODERATORS\'), $userGroups);
if ($USER->isAdmin() || $isModerator)
{
	$_SESSION["INTERVOLGA_ST_WAS_ADMIN"] = "Y";
}
if ($_SESSION["INTERVOLGA_ST_WAS_ADMIN"] != "Y")
{
	localRedirect(SITE_DIR, true, "301 Moved Permanently");
}
?>
';
		$contentFooter = '<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>';

		\Bitrix\Main\IO\File::putFileContents($filesPath . $city . $filesExt, $contentHeader . $contentBody . $contentFooter);
		$arResult["PRINT_CITIES"][$city]['FILE_LINK'] = $filesDir . $city . $filesExt;
	}
}
