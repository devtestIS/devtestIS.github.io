<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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

if ($arParams['FILT_NO_WRAP'] != 'Y') {
	?><div class="card-line"><div class="row"><?
}
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
if (!empty($arResult['ITEMS'])){
	foreach ($arResult['ITEMS'] as $key => $arItem) {
		$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], $strElementEdit);
		$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], $strElementDelete, $arElementDeleteParams);
		$strMainID = $this->GetEditAreaId($arItem['ID']);
		$archiv = $arItem["ARCHIV"]?>
		<div class="col-md-12" <?= $archiv ? 'style="opacity: 0.5"' : ''?>>
		<div class="card-product-line" id="<?=$strMainID?>">
			<div class="hidden"><?=$arItem['PREVIEW_TEXT']?></div>
			<div class="card-product-line__img prs">
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
					<a href="<?=$arItem['DETAIL_PAGE_URL']?>">
						<img class="img-responsive"
							 src="<?=$arItem['PREVIEW_PICTURE']['SRC'] ?: SITE_TEMPLATE_PATH.'/images/empty_h185.png'?>"
							 alt="<?=$arItem['DETAIL_PICTURE']['ALT']?>"
							 title="<?=$arItem['DETAIL_PICTURE']['TITLE'] ?>"/>
					</a>
					<?if(!$archiv):?>
						<a class="star__icon send" data-favorite="<?=$arItem['ID']?>" title="Добавить<br>в&amp;nbsp;избранное" href="javascript:void(0)"></a>
					<?endif;?>
				</div>
			</div>
			<div class="card-product-line__content">
				<div class="card-product-line__label-wrap">
					<?if(!$archiv)
					{
						foreach ($arItem['LABELS'] as $key => $label) {
							if (!$label['VIEW'] || $key == 'AVAILABILITY') {
								continue;
							}
							?>
							<div class="card-product__label card-product__label_type_<?=$label['TYPE']?>"><?=$label['NAME']?></div>
							<?
							$countLabel--;
						}
					} ?>
				</div>
				<a class="card-product-line__title" href="<?=$arItem['DETAIL_PAGE_URL']?>">
					<span><?=$arItem['NAME']?></span>
				</a>
				<div class="card-product-line__features-container mbm">
					<div class="card-product-line__features">
						<?
						foreach ($arItem['SHOWCASE'] as $key => $value) {
							?>
							<div class="card-product-line__row">
								<div class="card-product-line__features-name"><?=trim($key)?></div>
								<div class="card-product-line__value"><span class="card-product-line__value-span"><?=trim($value)?></span></div>
							</div>
							<?
						}
						?>
					</div>
				</div>
			</div>
			<div class="card-product-line__border"></div>
			<div class="card-product-line__control">
				<div class="card-product-line__label card-product-line__label_type_<?= $arItem['LABELS']['AVAILABILITY']['VIEW'] && !$archiv ? 'availability' : 'not-available' ?>">
					<?if(!$archiv):?>
						<?= $arItem['LABELS']['AVAILABILITY']['VIEW'] ? 'В наличии' : 'Через 10 дней' ?>
					<?else:?>
						Снято с производства
					<?endif;?>
				</div>
					<div class="card-product-line__price<? if($arItem['MIN_PRICE']['DISCOUNT_VALUE'] != $arItem['MIN_PRICE']['VALUE'] && !$archiv ){ ?> card-product-line__price_new<? } ?>">
						<?if(!$archiv):?>
							<?=$arItem['MIN_PRICE']['PRINT_DISCOUNT_VALUE']?>
							<?
							if($arItem['MIN_PRICE']['DISCOUNT_VALUE'] != $arItem['MIN_PRICE']['VALUE']){
								?><div class="card-product-line__old-price"><?=$arItem['MIN_PRICE']['PRINT_VALUE']?></div><?
							}
							?>
						<?endif;?>
					</div>
				<div class="card-product-line__bnt-group">
					<?
					if($arItem['MIN_PRICE']["CAN_BUY"] == 'Y' && !$archiv) {
						?>
						<div class="card-product-line__btn">
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
							   data-after-tooltip="Перейти в корзину">
								<img class="img btn__icon-text"
								     src="<?=SITE_TEMPLATE_PATH?>/images/control/cart_white.png" alt=""/><?= $arItem['CAN_BUY_BRAND'] ? 'КУПИТЬ' : 'В РЕЗЕРВ' ?>
							</a>
						</div>
						<?
					}
					?>
					<div class="card-product-line__btn">
						<a class="btn btn-info btn_cart_added btn-block disabled"
						   data-toggle="tooltip"
						   title="Добавить в сравнение"
						   role="button"
						   href="javascript:void(0);"
						   data-rel="<?=$arItem['COMPARE_URL']?>&ajax_action=Y"
						   data-action="ADD2COMPARE"
						   data-after-text="не сравнивать"
                           data-after-tooltip="Убрать из сравнения"
                           data-after-action="REMOVE2COMPARE"
                           data-after-class="btn__icon-comparison_added"
                           data-after-rel="<?=str_replace('=ADD_TO_COMPARE_LIST&', '=DELETE_FROM_COMPARE_LIST&', $arItem['COMPARE_URL'])?>&ajax_action=Y">
							<div class="btn__icon-comparison btn__icon-text"></div><span class="text">сравнить</span>
						</a>
					</div>
				</div>
			</div>
		</div>
		</div>
		<?
	}
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
	?></div></div><?
}