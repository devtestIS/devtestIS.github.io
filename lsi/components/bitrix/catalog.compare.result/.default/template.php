<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<? if ($arResult["ITEMS"]): ?>
	<div class="equalizer hidden-xs hidden-sm">
		<div class="row">
			<div class="col-md-3 col-sm-2 ptm">
				<form action="" method="get">
				<select class="select select_chosen select_comparison" id="selectCompareSection" name="section">
					<?
					foreach ($arResult['SECTIONS'] as $section) {
						?><option value="<?=$section['CODE'] ?: $section['ID']?>"<?
						if($arResult['CURRENT_SECTION'] == $section['ID']){
							?> selected="selected"<?
						}
						?>><?=$section['NAME']?></option><?
					}
					?>
				</select>
				</form>
				<div class="comparison-list">
					<div class="comparison-list__head" data-eq="true">
						<a class="comparison-list__link <? if (!$arResult["DIFFERENT"]): ?>comparison-list__link_active<? endif ?>" href="<?=$arResult["URLS"]["ALL"]?>">Все параметры</a>
						<a class="comparison-list__link <? if ($arResult["DIFFERENT"]): ?>comparison-list__link_active<? endif ?>" href="<?=$arResult["URLS"]["DIFFERENT"]?>">Различающиеся</a>
					</div>
					<div class="comparison-list__item" data-eq="true">
						<span class="comparison-list__span">Цена</span>
					</div>
					<? foreach ($arResult["SHOW_PROPERTIES"] as $property): ?>
						<div class="comparison-list__item<? if(in_array($property['CODE'], $arParams['FAT_PROPERTIES'])) { echo ' comparison-list__item_big'; } ?>" data-eq="true">
							<span class="comparison-list__span">
								<? if ($property['HINT']) { ?>
									<ins tabindex="0"
									 role="button"
									 data-trigger="hover"
									 data-toggle="popover"
									 data-trigger="focus"
									 data-container="body"
									 data-content="<?=str_replace('"', '&quot;', $property['HINT'])?>">
								<? } ?>
								<?= $property["NAME"] ?><? if ($property["MEASURE"]): ?>, <?=$property["MEASURE"]?><? endif ?>
								<? if ($property['HINT']) { ?>
									</ins>
								<? } ?>
							</span>
						</div>
					<? endforeach ?>
				</div>
			</div>
			<div class="col-md-9 col-sm-10">
				<div class="slider-comparison">
					<? foreach ($arResult["ITEMS"] as $item): ?>
						<div class="slider-comparison__item">
                            <div class="star">
                                <div class="star-rating star-rating_disabled pvs phl">
                                    <?$round = $item['RATE']['AVG']['COUNT']?>
                                    <div class="star-rating__wrap" <?= $round > 0 ? "data-count='".$round."'" : "data-toggle=\"tooltip\" title=\"Оставить отзыв\""?>>
                                        <a href="<?= $item["DETAIL_PAGE_URL"]."reviews/"?>"></a>
                                        <?
                                        for ($i = 5; $i > 0; $i--) {
                                            ?>
                                            <input class="star-rating__input"
                                                   id="star_rating_input_<?=$item['ID']?>_<?=$i?>"
                                                   type="checkbox"
                                                   name="star_rating_input_<?=$item['ID']?>"
                                                   value="<?=$i?>"
                                                   disabled<?=$i == round($item['RATE']['AVG']['RATE']) ? ' checked="checked"' : ''?> />
                                            <label class="star-rating__icon fa fa-star"
                                                   for="star_rating_input_<?=$item['ID']?>_<?=$i?>"></label>
                                            <?
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="slider-comparison__wrap-img">
                                    <a href="<?= $item["DETAIL_PAGE_URL"] ?>">
                                        <img class="slider-comparison__img" src="<?= $item["PREVIEW_PICTURE"]["SRC"] ?>"/>
                                    </a>
                                </div>
                            </div>
							<a class="slider-comparison__remove" href="<?= $item["~DELETE_URL"] ?>">×</a>
							<div class="slider-comparison__control text-center">
								<?
								if($item["MIN_PRICE"]["CAN_BUY"] == "Y") {
									?>
									<a class="btn btn-primary disabled"
									   data-element="<?=$item['ID']?>"
									   data-element-title="<?=$item['NAME']?>"
									   data-element-url="<?=$item['DETAIL_PAGE_URL']?>"
									   data-toggle="tooltip"
									   title="<?= $item['CAN_BUY_BRAND'] ? 'Добавить в корзину' : $arResult['CAN_BUY_BRAND_TOOLTIP']?>"
									   role="button"
									   href="javascript:void(0);"
									   data-placement="bottom"
									   data-rel="<?=$item['DETAIL_PAGE_URL']?>?action=ADD2BASKET&id=<?=$item["ID"]?>&ajax_basket=Y"
									   data-action="ADD2BASKET"
									   data-after-title="<?= $arItem['CAN_BUY_BRAND'] ? 'В КОРЗИНЕ' : 'В РЕЗЕРВЕ'?>"
									   data-after-tooltip="Перейти в корзину">
										<?= $item['CAN_BUY_BRAND'] ? 'КУПИТЬ' : 'В РЕЗЕРВ' ?>
									</a>
									<?
								} else {
									?>
									<a class="btn btn-primary disabled" disabled="disable">В КОРЗИНУ</a>
									<?
								}
								?>
							</div>
							<div class="slider-comparison__title" data-eq="true">
								<?= $item["NAME"] ?>
							</div>
							<div class="slider-comparison__feature slider-comparison__feature_price" data-eq="true">
								<span class="slider-comparison__span">
									<? if ($item["MIN_PRICE"]): ?>
										<?= $item["MIN_PRICE"]["PRINT_DISCOUNT_VALUE"] ?>
									<? else: ?>
										-
									<? endif ?>
								</span>
							</div>
							<? foreach ($arResult["SHOW_PROPERTIES"] as $property): ?>
								<div class="slider-comparison__feature<? if(in_array($property['CODE'], $arParams['FAT_PROPERTIES'])) { echo ' slider-comparison__feature_big'; } ?>" data-eq="true">
									<span class="slider-comparison__span">
										<? if ($itemProperty = $item["DISPLAY_PROPERTIES"][$property["CODE"]]): ?>
											<? if (is_array($itemProperty["DISPLAY_VALUE"])): ?>
												<?= implode("/ ", $itemProperty["DISPLAY_VALUE"]) ?>
											<? else: ?>
												<?= $itemProperty["DISPLAY_VALUE"] ?>
											<? endif ?>
										<? else: ?>
											-
										<? endif ?>
									</span>
								</div>
							<? endforeach ?>
						</div>
					<? endforeach ?>
				</div>
			</div>
		</div>
	</div>
	<div class="comparison-small">
		<div class="comparison-small-list">
			<form action="" method="get">
				<select class="select select_control mbl form-control" id="selectCompareSectionSmall" name="section">
					<?
					foreach ($arResult['SECTIONS'] as $section) {
						?><option value="<?=$section['CODE'] ?: $section['ID']?>"<?
						if($arResult['CURRENT_SECTION'] == $section['ID']){
							?> selected="selected"<?
						}
						?>><?=$section['NAME']?></option><?
					}
					?>
				</select>
			</form>

			<div class="comparison-small-list__head">
				<a class="comparison-small-list__link <? if (!$arResult["DIFFERENT"]): ?>comparison-small-list__link_active<? endif ?>" href="<?=$arResult["URLS"]["ALL"]?>">Все параметры</a>
				<a class="comparison-small-list__link <? if ($arResult["DIFFERENT"]): ?>comparison-small-list__link_active<? endif ?>" href="<?=$arResult["URLS"]["DIFFERENT"]?>">Различающиеся</a>
			</div>
		</div>

		<? foreach ($arResult["ITEMS"] as $item): ?>
			<div class="comparison-small-item">
				<div class="star">
					<div class="star-rating star-rating_disabled">
						<?$round = $item['RATE']['AVG']['COUNT']?>
						<div class="star-rating__wrap" <?= $round > 0 ? "data-count='".$round."'" : "data-toggle=\"tooltip\" title=\"Оставить отзыв\""?>>
							<a href="<?= $item["DETAIL_PAGE_URL"]."reviews/"?>"></a>
							<?
							for ($i = 5; $i > 0; $i--) {
								?>
								<input class="star-rating__input"
								       id="star_rating_input_<?=$item['ID']?>_<?=$i?>"
								       type="checkbox"
								       name="star_rating_input_<?=$item['ID']?>"
								       value="<?=$i?>"
								       disabled<?=$i == round($item['RATE']['AVG']['RATE']) ? ' checked="checked"' : ''?> />
								<label class="star-rating__icon fa fa-star"
								       for="star_rating_input_<?=$item['ID']?>_<?=$i?>"></label>
								<?
							}
							?>
						</div>
					</div>
					<div class="comparison-small-item__wrap-img">
						<a href="<?=$item["DETAIL_PAGE_URL"]?>">
							<img class="img-responsive" src="<?= $item["PREVIEW_PICTURE"]["SRC"] ?>" alt=""/>
						</a>
					</div>
				</div>
				<div class="comparison-small-item__title">
					<?= $item["NAME"] ?></div>
				<div class="comparison-small-item__control">
					<div class="comparison-small-item__price">
						<? if ($item["MIN_PRICE"]): ?>
							<?= $item["MIN_PRICE"]["PRINT_DISCOUNT_VALUE"] ?>
						<? else: ?>
							-
						<? endif ?>
					</div>
					<?
					if ($item["MIN_PRICE"]["CAN_BUY"] == "Y") {
						?>
						<a class="btn btn-primary disabled"
						   data-element="<?=$item['ID']?>"
						   data-element-title="<?=$item['NAME']?>"
						   data-element-url="<?=$item['DETAIL_PAGE_URL']?>"
						   data-toggle="tooltip"
						   title="Добавить в корзину"
						   role="button"
						   href="javascript:void(0);"
						   data-rel="<?=$item['DETAIL_PAGE_URL']?>?action=ADD2BASKET&id=<?=$item["ID"]?>&ajax_basket=Y"
						   data-action="ADD2BASKET"
						   data-after-tooltip="Перейти в корзину">
							<img class="img" src="<?=SITE_TEMPLATE_PATH?>/images/control/cart_white.png"
							     alt=""/>
						</a>
						<?
					}
					?>
				</div>
				<a class="comparison-small-item__remove" href="<?= $item["~DELETE_URL"] ?>">×</a>
			</div>
		<? endforeach ?>

		<div class="comparison-small-list">
			<? foreach ($arResult["SHOW_PROPERTIES"] as $property): ?>
				<div class="comparison-small-list__title">
					<? if ($property['HINT']) { ?>
						<ins tabindex="0"
							 role="button"
							 data-trigger="hover"
							 data-toggle="popover"
							 data-trigger="focus"
							 data-container="body"
							 data-content="<?=str_replace('"', '&quot;', $property['HINT'])?>">
					<? } ?>
					<?= $property["NAME"] ?><? if ($property["MEASURE"]): ?>, <?=$property["MEASURE"]?><? endif ?>
					<? if ($property['HINT']) { ?>
						</ins>
					<? } ?>
				</div>
				<? foreach ($arResult["ITEMS"] as $item): ?>
					<div class="comparison-small-list__row">
						<div class="comparison-small-list__name"><?= $item["NAME"] ?></div>
						<div class="comparison-small-list__value">
							<span class="comparison-small-list__value-span">
								<? if ($itemProperty = $item["DISPLAY_PROPERTIES"][$property["CODE"]]): ?>
									<? if (is_array($itemProperty["DISPLAY_VALUE"])): ?>
										<?= implode("/ ", $itemProperty["DISPLAY_VALUE"]) ?>
									<? else: ?>
										<?= $itemProperty["DISPLAY_VALUE"] ?>
									<? endif ?>
								<? else: ?>
									-
								<? endif ?>
								<a class="comparison-small-list__remove" href="<?= $item["~DELETE_URL"] ?>">×</a>
							</span>
						</div>
					</div>
				<? endforeach ?>
			<? endforeach ?>
		</div>
	</div>
<? endif ?>