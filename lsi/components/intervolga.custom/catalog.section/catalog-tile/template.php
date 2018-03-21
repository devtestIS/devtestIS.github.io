<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
	die();
}
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
?>
<?
if (!empty($arResult['ITEMS'])) {
	if ($arParams['FILT_TITLE']) {
		?>
		<div class="title-line">
			<div class="title-line__title"><?=$arParams['FILT_TITLE']?></div>
			<?
			if ($arParams['FILT_LINK']) {
				?>
				<a class="title-line__link" href="<?=$arParams['FILT_LINK']?>"><?=$arParams['FILT_LINK_TITLE']
						?: 'Посмотреть все'?></a>
				<?
			}
			?>
		</div>
		<?
	}
	?>
	<? if ($arParams['FILT_NO_WRAP'] != 'Y') { ?><div class="row" data-height="equal" data-target=".card-product__features"><? } ?>
	<?
	if (($arParams['DISPLAY_BOTTOM_PAGER'] || $arParams['DISPLAY_TOP_PAGER']) && $arParams['AJAX_ACTION'] != 'nextPage') {
		if ($arResult["NAV_RESULT"]->NavPageNomer > 1) {
			echo $arResult['NAV_STRING_BEFORE'];
			/*$url = \Intervolga\Custom\SiteTools::nfGetCurPageParam(
				'PAGEN_' . $arResult["NAV_RESULT"]->NavNum . '=' . ($arResult["NAV_RESULT"]->NavPageNomer - 1),
				array('PAGEN_' . $arResult["NAV_RESULT"]->NavNum)
			);
			?>
            <div class="mbl">
                <a class="btn btn-lg btn-default"
                   role="button"
                   href="<?=$url?>"
                   data-action="prevPage"
                   data-loading-text="Загрузка..."
                >
                    Предыдущая страница
                </a>
            </div>
            <?*/
		}
	}
	foreach ($arResult['ITEMS'] as $key => $arItem) {
		$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], $strElementEdit);
		$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], $strElementDelete, $arElementDeleteParams);
		$strMainID = $this->GetEditAreaId($arItem['ID']);
		$archiv = $arItem["ARCHIV"]?>
		<div class="<?=$arParams['FILT_ELEMENT_CSS_CLASS_IN_ROW'] ?: 'col-lg-3 col-sm-6'?>" <?= $archiv ? 'style="opacity: 0.5"' : ''?>>
			<div class="card-product <?=$arParams['FILT_ELEMENT_CSS_CLASS'] ?: ''?>" id="<?=$strMainID?>">
				<div class="card-product__label-line">
					<?if(!$archiv):?>
						<? $countLabel = intval($arParams['VIEW_LABEL_COUNT'] ?: -1);
						foreach ($arItem['LABELS'] as $key => $label) {
							if ($countLabel == 0) {
								break;
							}
							if (!$label['VIEW'] || $key == 'AVAILABILITY') {
								continue;
							}
							?>
							<div class="card-product__label card-product__label_type_<?=$label['TYPE']?>"><?=$label['NAME']?></div>
							<?
							$countLabel--;
						}
						endif;
						if(in_array('AVAILABILITY', $arParams['VIEW_LABEL'])) {
							?>
							<div class="card-product__label card-product__label_type_<?=$arItem['LABELS']['AVAILABILITY']['VIEW'] && !$archiv
									? 'availability' : 'not-available'?>">
								<?if(!$archiv):?>
									<?= $arItem['LABELS']['AVAILABILITY']['VIEW'] ? 'В наличии' : 'Через 10 дней' ?>
								<?else:?>
									Снято с производства
								<?endif;?>
							</div>
							<?
						}
						?>
				</div>
				<a class="card-product__title" href="<?=$arItem['DETAIL_PAGE_URL']?>" data-dotdotdot="true"><span><?=$arItem['NAME']?></span></a>
				<div class="star">
                    <div class="star-rating mbs star-rating">
	                    <?$round = $arItem['RATE']['AVG']['COUNT']?>
	                    <div class="star-rating__wrap" <?= $round > 0 ? "data-count='".$round."'" : "data-toggle=\"tooltip\" title=\"Оставить отзыв\""?>>
		                    <a href="<?= $arItem["DETAIL_PAGE_URL"]."reviews/"?>" tabindex="0"></a>
		                    <?
		                    for ($i = 5; $i > 0; $i--) {
			                    ?>
			                    <input class="star-rating__input"
			                           id="star_rating_input_<?=$arItem['ID']?>_<?=$i?>"
			                           type="checkbox"
			                           name="star_rating_input_<?=$arItem['ID']?>"
			                           value="<?=$i?>"
			                           disabled<?=$i == round($arItem['RATE']['AVG']['RATE']) ? ' checked="checked"' : ''?> />
			                    <label class="star-rating__icon fa fa-star"
			                           for="star_rating_input_<?=$arItem['ID']?>_<?=$i?>"></label>
			                    <?
		                    }
		                    ?>
	                    </div>
                    </div>
					<a class="card-product__img" href="<?=$arItem['DETAIL_PAGE_URL']?>">
						<img class="img-responsive"
							 src="<?=$arItem['PREVIEW_PICTURE']['SRC'] ?: SITE_TEMPLATE_PATH . '/images/empty_h185.png'?>"
							 alt="<?=$arItem['DETAIL_PICTURE']['ALT']?>"
							 title="<?=$arItem['DETAIL_PICTURE']['TITLE']?>"/>
					</a>
					<?if(!$archiv):?>
						<a class="star__icon send" data-favorite="<?=$arItem['ID']?>" title="Добавить<br>в&amp;nbsp;избранное" href="javascript:void(0)"></a>
					<?endif;?>
				</div>
				<?
				if ($arParams['FILT_VIEW_FEATURES'] == 'Y') {
					?>
					<div class="card-product__features">
						<?
						foreach ($arItem['SHOWCASE'] as $key => $value) {
							?>
							<div class="card-product__row">
								<div class="card-product__features-name"><?=trim($key)?></div>
								<div class="card-product__value"><span class="card-product__value-span"><?=trim($value)?></span></div>
							</div>
							<?
						}
						?>
					</div>
					<?
				}
				?>
				<div class="card-product__bottom">
					<?if(!$archiv):?>
						<? $withOldPrice = $arItem['MIN_PRICE']['DISCOUNT_VALUE'] != $arItem['MIN_PRICE']['VALUE']; ?>
						<div class="card-product__price<? if ($withOldPrice) { ?> card-product__price_new<? } ?><? if (mb_strlen(
									'' . $arItem['MIN_PRICE']['DISCOUNT_VALUE']
								) > $arParams['TEMPLATE_MAX_COUNT_IN_NORMAL_NUMBER']
							) { ?> card-product__price_big<? } ?>">
							<?=$arItem['MIN_PRICE']['PRINT_DISCOUNT_VALUE']?>
							<?
							if ($withOldPrice) {
								?>
								<div class="card-product__old-price"><?=$arItem['MIN_PRICE']['PRINT_VALUE']?></div><?
							}
							?>
						</div>
					<?endif;?>
					<div class="card-product__to-cart">
						<?
						if ($arParams["DISPLAY_COMPARE"]) {
							?>
							<div class="card-product__control <?= $archiv ? 'text-left' : ''?>">
								<?
								if ($arItem['MIN_PRICE']["CAN_BUY"] == 'Y' && !$archiv) {
									?>
									<a class="btn btn-primary disabled"
									   data-element="<?=$arItem['ID']?>"
									   data-element-title="<?=$arItem['NAME']?>"
									   data-element-url="<?=$arItem['DETAIL_PAGE_URL']?>"
									   data-toggle="tooltip"
									   title="<?= $arItem['CAN_BUY_BRAND'] ? 'Добавить в корзину' : $arResult['CAN_BUY_BRAND_TOOLTIP']?>"
									   role="button"
									   href="javascript:void(0);"
									   data-rel="<?=$arItem['ADD_URL']?>&ajax_basket=Y"
									   data-action="ADD2BASKET"
									   data-after-tooltip="Перейти в корзину">
										<img class="img" src="<?=SITE_TEMPLATE_PATH?>/images/control/cart_white.png"
										     alt=""/>
									</a>
									<?
								}
								?>
								<a class="btn btn-info btn_cart_added card-product__comparison disabled"
								   data-toggle="tooltip"
								   title="Добавить в сравнение"
								   role="button"
								   href="javascript:void(0);"
								   data-rel="<?=$arItem['COMPARE_URL']?>&ajax_action=Y"
								   data-action="ADD2COMPARE"
                                   data-after-tooltip="Убрать из сравнения"
                                   data-after-action="REMOVE2COMPARE"
                                   data-after-class="btn__icon-comparison_added"
                                   data-after-rel="<?=str_replace(
	                                   '=ADD_TO_COMPARE_LIST&', '=DELETE_FROM_COMPARE_LIST&', $arItem['COMPARE_URL']
                                   )?>&ajax_action=Y">
									<div class="btn__icon-comparison"></div>
								</a>
							</div>
							<?
						} elseif ($arItem['MIN_PRICE']["CAN_BUY"] == 'Y') {
							?>
							<a class="btn btn-primary btn-block disabled"
							   data-element="<?=$arItem['ID']?>"
							   data-element-title="<?=$arItem['NAME']?>"
							   data-element-url="<?=$arItem['DETAIL_PAGE_URL']?>"
							   data-toggle="tooltip"
							   title="<?= $arItem['CAN_BUY_BRAND'] ? 'Добавить в корзину' : $arResult['CAN_BUY_BRAND_TOOLTIP']?>"
							   role="button"
							   href="javascript:void(0);"
							   data-rel="<?=$arItem['ADD_URL']?>&ajax_basket=Y"
							   data-action="ADD2BASKET"
							   data-after-title="<?= $arItem['CAN_BUY_BRAND'] ? 'В КОРЗИНЕ' : 'В РЕЗЕРВЕ'?>"
							   data-after-tooltip="Перейти в корзину"
							>
								<?= $arItem['CAN_BUY_BRAND'] ? 'КУПИТЬ' : 'В РЕЗЕРВ' ?>
							</a>
							<?
						}
						?>
					</div>
				</div>
			</div>
		</div>
		<?
	}

	if (($arParams['DISPLAY_BOTTOM_PAGER'] || $arParams['DISPLAY_TOP_PAGER']) && $arParams['AJAX_ACTION'] != 'prevPage') {
		if ($arResult["NAV_RESULT"]->NavPageNomer <= $arResult["NAV_RESULT"]->NavPageCount) {
			echo $arResult['NAV_STRING_AFTER'];
			/*$url = \Intervolga\Custom\SiteTools::nfGetCurPageParam(
				'PAGEN_' . $arResult["NAV_RESULT"]->NavNum . '=' . ($arResult["NAV_RESULT"]->NavPageNomer + 1),
				array('PAGEN_' . $arResult["NAV_RESULT"]->NavNum)
			);
			?>
            <div class="">
                <a class="btn btn-lg btn-default"
                   role="button"
                   href="<?=$url?>"
                   data-action="nextPage"
                   data-loading-text="Загрузка..."
                >
                    Показать ещё
                </a>
            </div>
            <?*/
		}
	}

	if ($arParams['FILT_NO_WRAP'] != 'Y') {
		?></div><?
	}
}