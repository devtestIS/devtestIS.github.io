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
use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);
if ($arResult["JSON"])
{
	$this->addExternalJs("https://api-maps.yandex.ru/2.1/?lang=ru_RU");
}

$this->SetViewTarget('after_title_html');
?><a class="btn btn_print shop-top-line__btn" role="button" href="?print=yes" target="_blank">распечатать страницу</a><?
$this->EndViewTarget();
?>

<div class="shop-detailed" itemscope="" itemtype="http://schema.org/Organization">
	<div class="hidden" itemprop="name">ООО "ЛидерСтройИнструмент"</div>
	<? if ($arResult["INFO"]["ADDRESS"] || $arResult["INFO"]["PHONE"] || $arResult["INFO"]["WORKING_HOURS"]): ?>

	<? endif ?>
	<div class="shop-detailed__head">
		<div class="shop-detailed-head">
			<? if ($arResult["INFO"]["ADDRESS"]): ?>
				<div class="shop-detailed-head__col shop-detailed-head__col_column_one" itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
					<div
						class="shop-detailed-head__title shop-detailed-head__title_icon_address">
						<?= Loc::getMessage("INTERVOLGA_CUSTOM.ADDRESS") ?>
					</div>
					<div class="shop-detailed-head__content" itemprop="streetAddress"><?= $arResult["INFO"]["ADDRESS"] ?></div>
				</div>
			<? endif ?>

			<? if ($arResult["INFO"]["PHONE"]): ?>
				<div class="shop-detailed-head__col shop-detailed-head__col_column_two">
					<div
						class="shop-detailed-head__title shop-detailed-head__title_icon_phone">
						<?= Loc::getMessage("INTERVOLGA_CUSTOM.PHONE") ?>
					</div>
					<a class="phone_tel_det shop-detailed-head__content" itemprop="telephone" href="tel:<?= $arResult["INFO"]["PHONE_HREF"] ?>"><?= $arResult["INFO"]["PHONE"] ?></a>
				</div>
			<? endif ?>

			<? if ($arResult["INFO"]["WORKING_HOURS"]): ?>
				<div class="shop-detailed-head__col shop-detailed-head__col_column_three">
					<div
						class="shop-detailed-head__title shop-detailed-head__title_icon_watch">
						<?= Loc::getMessage("INTERVOLGA_CUSTOM.WORKING_HOURS") ?>
					</div>
					<div class="shop-detailed-head__content"><?= $arResult["INFO"]["WORKING_HOURS"] ?></div>
				</div>
			<? endif ?>
		</div>
	</div>

	<? if ($arResult["JSON"]): ?>
		<div class="contacts-map contacts-map_touch-lock" id="contacts-map" width="100%" height="290px">
			<div class="contacts-map__mess" data-toggle-text="Отключить масштабирование/перемещение для карты <i class=&quot;fa fa-unlock&quot; aria-hidden=&quot;true&quot;></i>">Включить масштабирование/перемещение для карты <i class="fa fa-lock" aria-hidden="true"></i></div>
		</div>
	<? endif ?>

	<? if ($arResult["BLOCKS"]): ?>
		<div class="shop-detailed__info">
			<div class="row row_clean-lg_4 row_clean-sm_2">
				<? if ($arResult["BLOCKS"]["BUY_TYPES"]): ?>
					<div class="col-sm-6 col-lg-3"><img class="img-responsive" src="<?=SITE_TEMPLATE_PATH?>/images/contacts/img-1.png"
							alt=""/>
						<div class="shop-detailed-info">
							<div
								class="shop-detailed-info__title"><?= Loc::getMessage("INTERVOLGA_CUSTOM.BUY_TYPES") ?></div>
							<ul class="ul ul_primary">
								<? foreach ($arResult["BLOCKS"]["BUY_TYPES"] as $buyType): ?>
									<li class="ul__li"><?= $buyType ?></li>
								<? endforeach ?>
							</ul>
						</div>
					</div>
				<? endif ?>
				<? if ($arResult["BLOCKS"]["PAYMENT_TYPES"]): ?>
					<div class="col-sm-6 col-lg-3"><img class="img-responsive" src="<?=SITE_TEMPLATE_PATH?>/images/contacts/img-2.png"
							alt=""/>
						<div class="shop-detailed-info">
							<div
								class="shop-detailed-info__title"><?= Loc::getMessage("INTERVOLGA_CUSTOM.PAYMENT_TYPES") ?></div>
							<ul class="ul ul_primary">
								<? foreach ($arResult["BLOCKS"]["PAYMENT_TYPES"] as $paymentType): ?>
									<li class="ul__li"><?= $paymentType ?></li>
								<? endforeach ?>
							</ul>
						</div>
					</div>
				<? endif ?>
				<? if ($arResult["BLOCKS"]["DELIVERY_TYPES"]): ?>
					<div class="col-sm-6 col-lg-3"><img class="img-responsive" src="<?=SITE_TEMPLATE_PATH?>/images/contacts/img-3.png"
							alt=""/>
						<div class="shop-detailed-info">
							<div
								class="shop-detailed-info__title"><?= Loc::getMessage("INTERVOLGA_CUSTOM.DELIVERY_TYPES") ?></div>
							<ul class="ul ul_primary">
								<? foreach ($arResult["BLOCKS"]["DELIVERY_TYPES"] as $deliveryType): ?>
									<li class="ul__li"><?= $deliveryType ?></li>
								<? endforeach ?>
							</ul>
						</div>
					</div>
				<? endif ?>
				<? if ($arResult["BLOCKS"]["CREDITS"]): ?>
					<div class="col-sm-6 col-lg-3"><img class="img-responsive" src="<?=SITE_TEMPLATE_PATH?>/images/contacts/img-4.png"
							alt=""/>
						<div class="shop-detailed-info">
							<div class="shop-detailed-info__title"><?= Loc::getMessage("INTERVOLGA_CUSTOM.CREDITS") ?></div>
							<ul class="ul ul_primary">
								<? foreach ($arResult["BLOCKS"]["CREDITS"] as $credit): ?>
									<li class="ul__li"><?= $credit ?></li>
								<? endforeach ?>
							</ul>
						</div>
					</div>
				<? endif ?>
			</div>
		</div>
	<? endif ?>

	<? if ($arResult["FIELDS"]["DETAIL_TEXT"] || $arResult["DISPLAY_PROPERTIES"]["PHOTOS"]): ?>
		<div class="shop-detailed__content">
			<? if ($arResult["FIELDS"]["DETAIL_TEXT"]): ?>
				<?= $arResult["FIELDS"]["DETAIL_TEXT"] ?>
			<? endif ?>
			<? if ($arResult["DISPLAY_PROPERTIES"]["PHOTOS"]): ?>
				<div class="h2 shop-detailed__title-slider"><?= Loc::getMessage("INTERVOLGA_CUSTOM.PHOTOS") ?></div>
				<div class="slider-shop">
					<? foreach ($arResult["DISPLAY_PROPERTIES"]["PHOTOS"]["FILE_VALUE"] as $file): ?>
						<div class="slider-shop__item">
							<a class="lightbox-link" href="<?=$file["BIG"]["SRC"]?>" data-lightbox="lightbox" title="<?=$arResult["NAME"]?>">
								<img class="img-responsive" src="<?=$file["SMALL"]["SRC"]?>" alt="<?=$file["SMALL"]["ALT"]?>" title="<?=$file["SMALL"]["TITLE"]?>"/>
							</a>
						</div>
					<? endforeach ?>
				</div>
			<? endif ?>
		</div>
	<? endif ?>
</div>
<? if ($arResult["JSON"]): ?>
	<script type="text/javascript">
		var PICK_POINT_ADDRESS = <?=\Bitrix\Main\Web\Json::encode($arResult["JSON"]["ADDRESS"])?>;
		var PICK_POINT_CENTER = <?=\Bitrix\Main\Web\Json::encode($arResult["JSON"]["CENTER"])?>;
	</script>
<? endif ?>