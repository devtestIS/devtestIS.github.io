<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

if (file_exists($_SERVER["DOCUMENT_ROOT"] . SITE_TEMPLATE_PATH . "/components/bitrix/catalog.section/catalog-tile/" . basename(__FILE__))) {
    include $_SERVER["DOCUMENT_ROOT"] . SITE_TEMPLATE_PATH . "/components/bitrix/catalog.section/catalog-tile/" . basename(__FILE__);
}

unset($arResult['THIS_PRODUCT']['PROPERTIES']);