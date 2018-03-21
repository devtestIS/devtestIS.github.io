<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/**
 * @var array $arResult
 */
use Bitrix\Main\Page\Asset;
$GLOBALS['ARTICLE_PRODUCTS'] = $arResult["PROPERTIES"]["PRODUCTS"]["VALUE"];

$assets = Asset::getInstance();
$GLOBALS["CATALOG_CURRENT_ELEMENT"] = $arResult;
$assets->addJs('//yastatic.net/es5-shims/0.0.2/es5-shims.min.js');
$assets->addJs('//yastatic.net/share2/share.js');