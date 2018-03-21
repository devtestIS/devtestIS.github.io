<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $templateData */
/** @var @global CMain $APPLICATION */
use Bitrix\Main\Page\Asset;
use Bitrix\Main\Config\Option;
use Intervolga\Custom\SiteTools;
$assets = Asset::getInstance();
$GLOBALS["CATALOG_CURRENT_ELEMENT"] = $arResult;
$assets->addJs(SITE_TEMPLATE_PATH . '/js/lib/senderror.js');

define('TITLE_WITHOUT_MARGIN', 'Y');

/** \CatalogElementComponent $this */
$subpage = $this->__parent ? mb_strtoupper($this->__parent->getTemplatePage()) : 'ELEMENT';
if($subpage != 'ELEMENT') {

	$baseProps = array(
	    'SUB_PAGE_TITLE' => $arResult["META_TAGS"]["TITLE"],
	    'SUB_META_TITLE' => $arResult["META_TAGS"]["BROWSER_TITLE"],
	    'SUB_META_DESCRIPTION' => $arResult["META_TAGS"]["DESCRIPTION"],
	    'SUB_META_KEYWORDS' => $arResult["META_TAGS"]["KEYWORDS"]
	);

	$seoProps = SiteTools::prepareSeoProps($arResult["ID"], $subpage, $baseProps);

    $this->arResult["META_TAGS"]["TITLE"] = $seoProps['SUB_PAGE_TITLE'];
    $this->arResult["META_TAGS"]["BROWSER_TITLE"] = $seoProps['SUB_META_TITLE'];
    $this->arResult["META_TAGS"]['DESCRIPTION'] = $seoProps['SUB_META_DESCRIPTION'];
    $this->arResult["META_TAGS"]['KEYWORDS'] = $seoProps['SUB_META_KEYWORDS'];

    $this->arResult['SECTION']['PATH'][] = array('NAME' => $baseProps["SUB_PAGE_TITLE"]);
}