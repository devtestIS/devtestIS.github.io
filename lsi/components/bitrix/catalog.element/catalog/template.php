<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
	die();
}
use Intervolga\Custom\City;

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
$archiv = $arResult["PROPERTIES"]["SNYATO_S_PROIZVODSTVA_"]["VALUE"] == 'Да';
?>

<div itemscope="" itemtype="http://schema.org/Product">
	<div class="hidden" itemprop="name"><?=$arResult['NAME']?></div>
<div class="product-top-line">
	<a class="btn btn_print product-top-line__btn" role="button" href="?print=yes" target="_blank">распечатать
		страницу</a>
	<?
	if (trim($arResult["PROPERTIES"]["CML2_ARTICLE"]["VALUE"])) {
		?>
		<div class="product-top-line__id">
			Артикул: <strong><?=trim($arResult["PROPERTIES"]["CML2_ARTICLE"]["VALUE"])?></strong>
		</div>
		<?
	}
	if ($arResult["PROPERTIES"]["CML2_TRAITS"]) {
		foreach ($arResult["PROPERTIES"]["CML2_TRAITS"]["DESCRIPTION"] as $key => $val) {
			if (strtolower($val) == 'код') {
				if (trim($arResult["PROPERTIES"]["CML2_TRAITS"]["VALUE"][$key])) {
					?>
					<div class="product-top-line__id">
						Код товара: <strong><?=trim($arResult["PROPERTIES"]["CML2_TRAITS"]["VALUE"][$key])?></strong>
					</div>
					<?
				}
				break;
			}
		}
	}
	?>
</div>
<div class="product-detail shadow">
	<div class="product-detail__one">
		<div class="product-detail__label-line">
			<div class="star-rating star-rating_disabled star-rating_product-detail">
				<?$round = $arResult['RATE']['AVG']['COUNT']?>
				<div class="star-rating__wrap"  <?= $round > 0 ? "data-count='".$round."'" : ""?>>
					<?if ($round > 0):?>
						<div itemprop="aggregateRating" class="hidden"
							 itemscope itemtype="http://schema.org/AggregateRating">
							<span itemprop="ratingValue"><?=$arResult['RATE']['AVG']['RATE']?></span>
							<span itemprop="reviewCount"><?=$arResult['RATE']['AVG']['COUNT']?></span>
						</div>
					<?endif;?>
					<?
					for ($i = 5; $i > 0; $i--) {
						?>
						<input class="star-rating__input"
						       id="star_rating_input_<?=$arResult['ID']?>_<?=$i?>"
						       type="checkbox"
						       name="star_rating_input_<?=$arResult['ID']?>"
						       value="<?=$i?>"
						       disabled<?=$i == round($arResult['RATE']['AVG']['RATE']) ? ' checked="checked"' : ''?> />
						<label class="star-rating__icon fa fa-star"
						       for="star_rating_input_<?=$arResult['ID']?>_<?=$i?>"></label>
						<?
					}
					?>
				</div>
			</div>
			<?
			if($archiv)
			{?>
				<div class="product-detail__label product-detail__label_type_action">Снят с производства</div>
			<?} else {
				foreach ($arResult['LABELS'] as $label) {
					if (!$label['VIEW']) {
						continue;
					}
					?>
					<div class="product-detail__label product-detail__label_type_<?=$label['TYPE']?>"><?=$label['NAME']?></div>
					<?
				}
			}
			?>
		</div>
		<div class="star">
			<div class="product-slider">
				<?
				foreach ($arResult['SLIDER'] as $item) {
					if (isset($item['VIDEO'])) {
						?>
						<div class="product-slider__video">
							<iframe class="video-youtube" width="100%" height="380"
									src="https://www.youtube.com/embed/<?=$item['VIDEO']['CODE']?>?enablejsapi=1&amp;version=3&amp;playerapiid=ytplayer"
									allowfullscreen="true" allowscriptaccess="always"
									id="video-youtube"></iframe>
						</div>
						<?
					} else {
						?>
						<a class="product-slider__item" href="<?=$item['REAL']['src']?>" data-lightbox="product-detail"
						   data-title="<?=$arResult['NAME']?>">
							<img class="img-responsive" src="<?=$item['BIG']['src']?>" alt="<?=$item['ALT']?>" title="<?=$item['TITLE']?>" itemprop="image"/>
						</a>
						<?
					}
				}
				?>
			</div>
			<a class="star__icon send" data-favorite="<?=$arResult['ID']?>" title="Добавить<br>в&amp;nbsp;избранное" href="javascript:void(0)"></a>
		</div>
		<div class="product-slider-nav">
			<?
			foreach ($arResult['SLIDER'] as $item) {
				?>
				<div class="product-slider-nav__item<? if (isset($item['VIDEO'])) {
					echo ' product-slider-nav__item_video';
				} ?>">
					<img class="img-responsive" src="<?=$item['SMALL']['src']?>" alt="<?=$item['ALT']?>" title="<?=$item['TITLE']?>"/>
				</div>
				<?
			}
			?>
		</div>
	</div>
	<div class="product-detail__border"></div>
	<div class="product-detail__two">
		<div class="product-control">
			<?if(!$archiv):?>
				<div class="product-control__one">
					<div class="product-control__price product-control__price_new product-control__price_big"
						 itemprop="offers" itemscope="" itemtype="http://schema.org/Offer">
						<div class="hidden">
							<span itemprop="price"><?=$arResult["MIN_PRICE"]["DISCOUNT_VALUE"]?></span>
							<span itemprop="priceCurrency">RUB</span>
							<?
							if($arResult["MIN_PRICE"]['CAN_BUY'] == 'Y') {
								?>
								<link itemprop="availability" href="http://schema.org/InStock">
								<?
							}
							?>
						</div>
						<div><?=$arResult["MIN_PRICE"]["PRINT_DISCOUNT_VALUE"]?></div>
						<?
						if ($arResult["MIN_PRICE"]["DISCOUNT_VALUE"]
							!= $arResult["MIN_PRICE"]["VALUE"]
						) {
							?>
							<div class="product-control__old-price">
								<?=$arResult["MIN_PRICE"]["PRINT_VALUE"]?>
							</div>
							<?
						}
						?>
					</div>
				</div>
				<div class="product-control__two">
					<?
					if ($arResult["MIN_PRICE"]['CAN_BUY'] == 'Y') {
						?>
						<a class="btn btn-primary btn_cart"
						   data-element="<?=$arResult['ID']?>"
						   data-element-title="<?=$arResult['NAME']?>"
						   data-toggle="tooltip"
						   data-original-title="<?= $arResult['CAN_BUY_BRAND'] ? 'Добавить в корзину' : $arResult['CAN_BUY_BRAND_TOOLTIP']?>"
						   role="button"
						   href="javascript:void(0);"
						   data-rel="<?=$arResult['ADD_URL']?>&ajax_basket=Y"
						   data-action="ADD2BASKET"
						   data-after-title="<?= $arItem['CAN_BUY_BRAND'] ? 'В КОРЗИНЕ' : 'В РЕЗЕРВЕ'?>"
						   data-after-tooltip="Перейти в корзину">
							<?= $arResult['CAN_BUY_BRAND'] ? 'КУПИТЬ' : 'В РЕЗЕРВ' ?>
						</a>
						<div class="buy-one-click">
							<a class="buy-one-click__link" href="#modal-buy-one-click" data-toggle="modal">Купить в 1 клик</a>
						</div>
						<?
					}
					?>
				</div>
				<div class="product-control__three">
					<div class="found-a-cheaper"><a class="found-a-cheaper__link" href="#modal-found-a-cheaper" data-toggle="modal">Нашли дешевле, <br/>снизим цену!</a></div>
				</div>
			<?endif;?>
			<div class="product-control__four">
				<div class="product-control__comparison">
					<a class="btn btn-default btn-block disabled"
					   data-toggle="tooltip"
					   title="Добавить в сравнение"
					   role="button"
					   href="javascript:void(0);"
					   data-rel="<?=$arResult['COMPARE_URL']?>&ajax_action=Y"
					   data-action="ADD2COMPARE"
					   data-after-tooltip="Убрать из сравнения"
					   data-after-action="REMOVE2COMPARE"
					   data-after-class="btn__icon-comparison_added"
					   data-after-rel="<?=str_replace('=ADD_TO_COMPARE_LIST&', '=DELETE_FROM_COMPARE_LIST&', $arResult['COMPARE_URL'])?>&ajax_action=Y">
						<div class="btn__icon-comparison"></div>
					</a>
				</div>
			</div>
		</div>

		<?
		if(City::currentIsDefault() && $arResult["MIN_PRICE"]["DISCOUNT_VALUE"] >= 3000 && $arResult['CAN_BUY_BRAND']) {
			?>
			<div class="product-info product-info_border">
				<div class="product-info__title product-info__title_icon_track"><a
						href="<?= $arParams['DELIVERY_URL'] ?>">Доставка курьером</a></div>
				<div class="product-info__row">
					<div class="product-info__label">В течение дня (или завтра) при наличии</div>
					<div class="product-info__value"><span
							class="product-info__span"><?= $arResult['DELIVERY_PRICE'] ?></span></div>
				</div>
			</div>
			<?
		}
		?>
		<div class="product-info product-info_border">
			<div class="product-info__title product-info__title_icon_cart">
				<?= City::currentIsDefault() ? 'Самовывоз из магазинов Уфы БЕСПЛАТНО' : 'Самовывоз из пунктов выдачи {{=город:р}}'?>
			</div>
			<?
			foreach ($arResult['STORE'] as $store) {
				?>
				<div class="product-info__row">
					<div class="product-info__label">
						<div class="product-info__span product-info__span_line">
							<?
							if($store["URL"]){
								?><a href="<?=$store["URL"]?>"><?=$store["NAME"]?></a><?
							} else {
								?><span><?=$store["NAME"]?></span><?
							}
							?>
						</div>
					</div>
					<?
					if($archiv) {
						?>
						<div class="product-info__value product-info__value_available_none">
							<span class="product-info__span">
								Нет в наличии <i class="fa fa-question-circle-o" data-toggle="tooltip"
								                 data-placement="top"
								                 title="Снят с производства."
								                 data-container="body"></i>
							</span>
						</div>
						<?
					} elseif ($store["COUNT"] > 0) {
						?>
						<div class="product-info__value product-info__value_available">
							<span class="product-info__span">В наличии</span>
						</div>
						<?
					} elseif($arResult['COUNT_IN_STORE'] > 0 && City::currentIsDefault()) {
						$deliveryDays = ($store["DELIVERY_DAYS"]) ?: 1;
						?>
						<div class="product-info__value product-info__value_available_none">
							<span class="product-info__span">
								Через <?=$deliveryDays?> <?=\Intervolga\Custom\SiteTools::getWordForm($deliveryDays, 'день', 'дня', 'дней')?>
								<i class="fa fa-question-circle-o" data-toggle="tooltip"
									 data-placement="top"
									 title="Срок поставки <?=$deliveryDays?> <?=\Intervolga\Custom\SiteTools::getWordForm($deliveryDays, 'рабочий день', 'рабочих дня', 'рабочих дней')?> при условии наличия в одном из магазинов."
									 data-container="body"></i>
							</span>
						</div>
						<?
					} elseif($arResult['COUNT_IN_STORE'] > 0) {
						$deliveryDays = ($store["DELIVERY_DAYS"]) ?: 1;
						?>
						<div class="product-info__value product-info__value_available_none">
							<span class="product-info__span">
								Через <?=$deliveryDays?> <?=\Intervolga\Custom\SiteTools::getWordForm($deliveryDays, 'день', 'дня', 'дней')?>
								<i class="fa fa-question-circle-o" data-toggle="tooltip"
								   data-placement="top"
								   title="Срок поставки <?=$deliveryDays?> <?=\Intervolga\Custom\SiteTools::getWordForm($deliveryDays, 'рабочий день', 'рабочих дня', 'рабочих дней')?> при наличии на центральном складе."
								   data-container="body"></i>
							</span>
						</div>
						<?
					} else {
						$deliveryDays = ($store["DELIVERY_DAYS"] + $store["DELIVERY_DAYS_IN_CENTER_STORE"]) ?: 1;
						?>
						<div class="product-info__value product-info__value_available_none">
							<span class="product-info__span">
								Через <?=$deliveryDays?> <?=\Intervolga\Custom\SiteTools::getWordForm($deliveryDays, 'день', 'дня', 'дней')?> <i class="fa fa-question-circle-o" data-toggle="tooltip"
												 data-placement="top"
												 title="Срок поставки <?=$deliveryDays?> <?=\Intervolga\Custom\SiteTools::getWordForm($deliveryDays, 'рабочий день', 'рабочих дня', 'рабочих дней')?> при условии наличия на удаленном складе."
												 data-container="body"></i>
							</span>
						</div>
						<?
					}
					?>
				</div>
				<?
			}
			?>
		</div>
		<?/*<div class="product-info product-info_border">
			<div class="product-info__title product-info__title_icon_plane">Доставка в другие регионы</div>
			<?
			foreach ($arResult['DELIVERY_TO_REGION'] as $variant) {
				?>
				<div class="product-info__row">
					<div class="product-info__label">
						<div class="product-info__span product-info__span_line"><?=$variant['UF_TITLE']?></div>
					</div>
					<div class="product-info__value">
						<span class="product-info__span">
						<? if ($variant['UF_LINK']){ ?><a class="product-info__link" href="<?=$variant['UF_LINK']?>"><? } ?>
								<?=$variant['UF_VALUE']?>
								<? if ($variant['UF_LINK']){ ?></a><? } ?>
						</span>
					</div>
				</div>
				<?
			}
			?>
		</div>*/?>
		<div class="product-info product-info_border">
			<div class="product-info__title product-info__title_icon_cash">Способы оплаты</div>
			<?
			foreach ($arResult['PAYMENT_VARIANT'] as $variant) {
				?>
				<div class="product-info__row">
					<div class="product-info__label">
						<div class="product-info__span product-info__span_line"><?=$variant['UF_TITLE']?></div>
					</div>
					<div class="product-info__value">
						<span class="product-info__span">
						<? if ($variant['UF_LINK']){ ?><a class="product-info__link" href="<?=$variant['UF_LINK']?>"><? } ?>
								<?=$variant['UF_VALUE']?>
								<? if ($variant['UF_LINK']){ ?></a><? } ?>
						</span>
					</div>
				</div>
				<?
			}
			?>
		</div>
	</div>
</div>
<ul class="nav-tabs" role="tablist" id="elementNavTabs">
	<li class="nav-tabs__item active" role="presentation">
		<a class="nav-tabs__link" href="#product-description" aria-controls="product-description" role="tab" data-toggle="tab"
		   data-set-url="<?=$arResult["DETAIL_PAGE_URL"]?>"
		   data-set-title="<?=$arResult["META_TAGS"]["TITLE"]?>"
		   data-set-meta-title="<?=$arResult["META_TAGS"]["BROWSER_TITLE"]?>">
			Описание
		</a>
	</li>
	<? if(!empty($arResult['SHOW_PROPERTIES'])) { ?>
	<li class="nav-tabs__item" role="presentation">
		<a class="nav-tabs__link" href="#product-features" aria-controls="product-features" role="tab" data-toggle="tab"
		   data-set-url="<?=$arParams['SUB_PAGES']['characteristics']['URL'] ?: $arResult["DETAIL_PAGE_URL"]?>"
		   data-set-title="<?=$arParams['SUB_PAGES']['characteristics']['TITLE'] ? htmlspecialchars($arParams['SUB_PAGES']['characteristics']['TITLE']) : $arResult["META_TAGS"]["TITLE"]?>"
		   data-set-meta-title="<?=$arParams['SUB_PAGES']['characteristics']['BROWSER_TITLE'] ? htmlspecialchars($arParams['SUB_PAGES']['characteristics']['BROWSER_TITLE']) : $arResult["META_TAGS"]["BROWSER_TITLE"]?>">
			Характеристики
		</a>
	</li>
	<? } ?>
	<li class="nav-tabs__item" role="presentation">
		<a class="nav-tabs__link" href="#product-reviews" aria-controls="product-reviews" role="tab" data-toggle="tab"
		   data-set-url="<?=$arParams['SUB_PAGES']['reviews']['URL'] ?: $arResult["DETAIL_PAGE_URL"]?>"
		   data-set-title="<?=$arParams['SUB_PAGES']['reviews']['TITLE'] ? htmlspecialchars($arParams['SUB_PAGES']['reviews']['TITLE']) : $arResult["META_TAGS"]["TITLE"]?>"
		   data-set-meta-title="<?=$arParams['SUB_PAGES']['reviews']['BROWSER_TITLE'] ? htmlspecialchars($arParams['SUB_PAGES']['reviews']['BROWSER_TITLE']) : $arResult["META_TAGS"]["BROWSER_TITLE"]?>">
			Отзывы <?=$arResult['RATE']['AVG']['COUNT'] > 0 ? '<span>(' . $arResult['RATE']['AVG']['COUNT'] . ')</span>'
				: ''?>
		</a>
	</li>
	<? if (!empty($arResult['SERVICE_CENTERS'])) { ?>
		<li class="nav-tabs__item" role="presentation">
			<a class="nav-tabs__link" href="#product-service" aria-controls="product-service" role="tab" data-toggle="tab"
			   data-set-url="<?=$arResult["DETAIL_PAGE_URL"]?>"
			   data-set-title="<?=$arResult["META_TAGS"]["TITLE"]?>"
			   data-set-meta-title="<?=$arResult["META_TAGS"]["BROWSER_TITLE"]?>">
				Сервисные центры
			</a>
		</li>
	<? } ?>
	<? if ($arResult['HAVE_BUYWITH']) { ?>
	<li class="nav-tabs__item" role="presentation">
		<a class="nav-tabs__link" href="#product-related" aria-controls="product-related" role="tab" data-toggle="tab"
		   data-set-url="<?=$arResult["DETAIL_PAGE_URL"]?>"
		   data-set-title="<?=$arResult["META_TAGS"]["TITLE"]?>"
		   data-set-meta-title="<?=$arResult["META_TAGS"]["BROWSER_TITLE"]?>">
			С этим товаром покупают
		</a>
	</li>
	<? } ?>
</ul>
<div class="tab-content">
	<div class="tab-pane in active fade" role="tabpanel" id="product-description">
		<?
		$viewRightBlock = count($arResult['CERTIFICATES']) > 0 || count($arResult['INSTRUCTIONS']) > 0;
		if ($viewRightBlock) {
		?>
		<div class="row">
			<div class="col-sm-8 col-md-9">
				<?
				}
				?>
				<div class="article" itemprop="description">
					<?
					if($arParams['CITY'] != \Intervolga\Custom\City::getDefaultXmlId()) {
						echo $arResult['PREVIEW_TEXT'];
					} else {
						echo $arResult['DETAIL_TEXT'];
					}
					?>
				</div>
				<?
				$viewRightBlock = count($arResult['CERTIFICATES']) > 0 || count($arResult['INSTRUCTIONS']) > 0;
				if ($viewRightBlock) {
				?>
			</div>
			<div class="col-sm-4 col-md-3">
				<div class="manual">
					<?
					foreach ($arResult['CERTIFICATES'] as $cert) {
						?>
						<a class="lightbox-link lightbox-link_icon-zoom mbm" href="<?=$cert['REAL']['SRC']?>"
						   data-lightbox="lightbox">
							<img class="img-responsive"
							     src="<?=$cert['SMALL']['src']?>"
							     alt="<?=$cert['ALT']?>"
							     title="<?=$cert['TITLE']?>"/>
						</a>
						<?
					}
					foreach ($arResult['INSTRUCTIONS'] as $manual) {
						?>
						<div class="manual__link manual__link_icon_pdf">
							<a href="<?=$manual['SRC']?>">Скачать инструкцию</a>
							<div class="manual__info-size"><?=CFile::FormatSize($manual["FILE_SIZE"])?></div>
						</div>
						<?
					}
					?>
				</div>
			</div>
		</div>
	<?
	}
	?>
	</div>
	<div class="tab-pane fade" role="tabpanel" id="product-features">
		<div class="row">
			<div class="col-sm-8">
				<div class="product-info product-info_pm_pvn">
					<?
					foreach ($arResult['SHOW_PROPERTIES'] as $item) {
						if (!is_array($item)) {
							?>
							<div class="product-info__title"><strong><?=$item?></strong></div>
							<?
						} else {
							?>
							<div class="product-info__row">
								<div class="product-info__label">
									<div class="product-info__span product-info__span_line">
										<? if ($item['HINT']) { ?>
											<ins tabindex="0"
												 role="button"
												 data-trigger="hover"
												 data-toggle="popover"
												 data-trigger="focus"
												 data-container="body"
												 data-html="true"
												 data-content="<?=str_replace('"', '&quot;', $item['HINT'])?>">
										<? } ?>
										<?=$item['NAME']?>
										<? if ($item['HINT']) { ?>
											</ins>
										<? } ?>
									</div>
								</div>
								<div class="product-info__value">
									<span class="product-info__span"
									      title="<?=$item["DIRECTORY"]['UNIT_DESC'] ?: $item["DIRECTORY"]['UNIT_NAME']?>">
										<?=$item['VALUE']?> <?=$item["DIRECTORY"]['UNIT_NAME']?>
									</span>
								</div>
							</div>
							<?
						}
					}
					?>
				</div>
			</div>
			<div class="col-sm-4 col-lg-3 col-lg-offset-1">
				<div class="panel panel-default hidden-xs hidden-sm">
					<div class="panel-body">
						<div class="h4 mtn"><strong>Нашли ошибку в описании?</strong></div>
						<p class="p">Выделите текст с ошибкой и нажмите Ctrl+Enter или кнопку "Сообщить об ошибке".</p><button class="btn btn-default btn-block" role="button" id="send-button">Сообщить об ошибке</button></div>
				</div>
			</div>
		</div>
	</div>
	<div class="tab-pane fade" role="tabpanel" id="product-reviews">
		<!--CATALOG REVIEWS PRODUCTS-->
	</div>
	<? if (!empty($arResult['SERVICE_CENTERS'])) { ?>
		<div class="tab-pane fade" role="tabpanel" id="product-service">
			<div class="row">
				<div class="col-md-8">
					<div class="pseudo-table table-bordered table-striped" data-auto-title="true">
						<div class="pseudo-table__thead hidden-xs hidden-sm">
							<div class="pseudo-table__tr">
								<div class="pseudo-table__th">Сервис-центр</div>
								<div class="pseudo-table__th">Адрес</div>
								<div class="pseudo-table__th">Телефон</div>
							</div>
						</div>
						<div class="pseudo-table__tbody">
							<?
							foreach ($arResult['SERVICE_CENTERS'] as $center) {
								?>
								<div class="pseudo-table__tr">
									<div class="pseudo-table__td"><?=$center['NAME']?></div>
									<div class="pseudo-table__td"><?=$center['PROPERTIES']['ADDRESS']['VALUE']?></div>
									<div class="pseudo-table__td"><?=$center['PROPERTIES']['PHONES']['VALUE']?></div>
								</div>
								<?
							}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	<? } ?>
	<div class="tab-pane fade" role="tabpanel" id="product-related">
		<!--CATALOG BIG DATA PRODUCTS-->
	</div>
</div>
</div>

<? $this->SetViewTarget('col_column_product'); ?>
<div class="header-main-line__col header-main-line__col_column_product">
	<div class="product-short-line">
		<div class="product-short-line__image">
			<div class="product-slider-nav__item">
				<?
				foreach ($arResult['SLIDER'] as $item) {
					if (isset($item['VIDEO'])) {
						continue;
					} else {
						?>
						<img class="img-responsive" src="<?=$item['SMALL']['src']?>" alt="<?=$item['ALT']?>">
						<?
						break;
					}
				}
				?>
			</div>
		</div>
		<div class="product-short-line__description">
			<div class="mbx"><?=$arResult['NAME']?></div>
			<div class="star-rating star-rating_disabled">
				<?$round = $arResult['RATE']['AVG']['COUNT']?>
				<div class="star-rating__wrap" <?= $round > 0 ? "data-count='".$round."'" : ""?>>
					<?
					for ($i = 5; $i > 0; $i--) {
						?>
						<input class="star-rating__input"
							   id="star_rating_head_input_<?=$arResult['ID']?>_<?=$i?>"
							   type="radio"
							   name="star_rating_head_input_<?=$arResult['ID']?>"
							   value="<?=$i?>"
							   disabled<?=$i == round($arResult['RATE']['AVG']['RATE']) ? ' checked="checked"' : ''?> />
						<label class="star-rating__icon fa fa-star"
							   for="star_rating_head_input_<?=$arResult['ID']?>_<?=$i?>"></label>
						<?
					}
					?>
				</div>
			</div>
		</div>
		<?if(!$archiv):?>
			<div class="product-short-line__price">
				<div class="product-short-line__new"><?=$arResult["MIN_PRICE"]["PRINT_DISCOUNT_VALUE"]?></div>
				<?
				if ($arResult["MIN_PRICE"]["DISCOUNT_VALUE"] != $arResult["MIN_PRICE"]["VALUE"]) {
					?>
					<div class="product-short-line__old"><?=$arResult["MIN_PRICE"]["PRINT_VALUE"]?></div>
					<?
				}
				?>
			</div>
			<div class="product-short-line__control"><?
				if ($arResult["MIN_PRICE"]['CAN_BUY'] == 'Y') {
					?>
					<a class="btn btn-primary btn_cart"
					   data-element="<?=$arResult['ID']?>"
					   data-element-title="<?=$arResult['NAME']?>"
					   role="button"
					   href="javascript:void(0);"
					   data-rel="<?=$arResult['ADD_URL']?>&ajax_basket=Y"
					   data-action="ADD2BASKET"
					   data-after-title="<?= $arItem['CAN_BUY_BRAND'] ? 'В КОРЗИНЕ' : 'В РЕЗЕРВЕ'?>"
					   data-after-tooltip="Перейти в корзину">
						<?= $arResult['CAN_BUY_BRAND'] ? 'КУПИТЬ' : 'В РЕЗЕРВ' ?>
					</a>
					<?
				}
			?></div>
		<?endif;?>
	</div>
</div>
<? $this->EndViewTarget(); ?>