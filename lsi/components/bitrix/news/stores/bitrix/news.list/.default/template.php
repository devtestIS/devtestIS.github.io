<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
$this->addExternalJs("https://api-maps.yandex.ru/2.1/?lang=ru_RU");
?>
<? if ($arResult["JSON"]): ?>
	<div class="shop-detailed">
		<div class="contacts-map contacts-map_touch-lock" id="contacts-map-all" width="100%" height="290px">
			<div class="contacts-map__mess" data-toggle-text="Отключить масштабирование/перемещение для карты <i class=&quot;fa fa-unlock&quot; aria-hidden=&quot;true&quot;></i>">Включить масштабирование/перемещение для карты <i class="fa fa-lock" aria-hidden="true"></i></div>
		</div>
	</div>
	<script type="text/javascript">
		initShopsMap(<?=\Bitrix\Main\Web\Json::encode($arResult["JSON"])?>);
	</script>
<? endif ?>