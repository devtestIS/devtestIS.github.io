<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Page\Asset;

Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/ajax/pagination.js");
Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/ajax/selection.js");