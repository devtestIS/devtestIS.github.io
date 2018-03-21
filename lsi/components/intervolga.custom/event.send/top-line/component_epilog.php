<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
use Bitrix\Main\Page\Asset;
$assets = Asset::getInstance();
$assets->addJs(SITE_TEMPLATE_PATH . '/js/inputmask.js');
$assets->addJs(SITE_TEMPLATE_PATH . '/js/jquery.inputmask.js');