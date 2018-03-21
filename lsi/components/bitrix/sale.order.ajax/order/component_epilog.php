<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

use Bitrix\Main\Page\Asset;
$assets = Asset::getInstance();
$assets->addString('<script src="//api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>');