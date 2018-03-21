<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Page\Asset;

$assets = Asset::getInstance();

$assets->addCss(SITE_TEMPLATE_PATH . '/js/lightbox/css/lightbox.css');
$assets->addJs(SITE_TEMPLATE_PATH . '/js/lightbox/js/lightbox.js');