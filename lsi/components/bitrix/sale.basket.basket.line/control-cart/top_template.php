<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die(); ?>
<?if($arResult['COMPOSITE_STUB'] == 'Y'):?>
	<a class="btn btn-default control-cart__btn control-cart__btn_type_basket disabled" role="button" href="<?=$arParams['PATH_TO_BASKET']?>">
		<span class="span hidden-xs hidden-sm hidden-md"><?=GetMessage('TSB1_CART')?> </span>
	</a>
<?else:?>
	<a class="btn btn-default control-cart__btn control-cart__btn_type_basket <? if($arResult["DISABLE_USE_BASKET"] || $arResult['NUM_PRODUCTS'] <= 0) { ?>disabled<? } ?>" role="button" href="<?=$arParams['PATH_TO_BASKET']?>">
		<span class="span hidden-xs hidden-sm hidden-md"><?=GetMessage('TSB1_CART')?> </span>
		<? if($arResult['NUM_PRODUCTS'] > 0) { ?><span class="btn__count"><?=$arResult['NUM_PRODUCTS']?></span><? } ?>
	</a>
	<?if(!empty($arResult["CATEGORIES"]["READY"])):?>
	<div class="popup-header">
		<div class="popup-header__inner">
			<div class="popup-header__body">
				<?foreach ($arResult["CATEGORIES"]["READY"] as $arItem):?>
					<div class="teaser-product">
						<div class="teaser-product__image"><a href="<?= $arItem['DETAIL_PAGE_URL']?>"><img src="<?= $arItem["DETAIL_PICTURE"]["SRC"]?>" alt="<?= $arItem["NAME"]?>" title="<?= $arItem["NAME"]?>" /></a></div>
						<div class="teaser-product__body"><a class="teaser-product__title" href="<?= $arItem['DETAIL_PAGE_URL']?>"><?= $arItem['NAME']?></a>
							<div class="teaser-product__price"><span class="span"><?= $arItem["PRINT_DISCOUNT_PRICE"]?></span><?= $arItem["PRINT_DISCOUNT_PRICE"]!= $arItem["PRINT_PRICE"]? "<span class=\"span old\">".$arItem["PRINT_PRICE"]."</span>" : ""?></div>
						</div>
						<div class="teaser-product__close"><i data-del-id="<?= $arItem["ID"]?>" data-id="<?= $arItem["PRODUCT_ID"]?>" data-basket-remove-url="<?= $arParams['PATH_TO_BASKET']."index.php?basketAction=delete&id=".$arItem["ID"]?>" class="fa fa-times-circle"></i></div>
					</div>
				<?endforeach;?>
			</div>
			<div class="popup-header__footer">
				<div class="popup-header__total">
					<span class="span">Итого: </span>
					<b><?= $arResult["TOTAL_DISCOUNT_PRICE"]?></b>
					<?= $arResult["TOTAL_PRICE"] != $arResult["TOTAL_DISCOUNT_PRICE"] ? "<span class='span old'>".$arResult["TOTAL_PRICE"]."</span>" : "" ?>
				</div>
				<a class="btn btn-primary btn-block" role="button" href="<?=$arParams['PATH_TO_BASKET']?>">Перейти в корзину</a></div>
		</div>
	</div>
	<?endif;?>
	<script>
		<?if($arResult["CART_ID"]):?>
			if(jQuery.inArray(<?= $arResult["CART_ID"]?>, bx_basket) == -1)
			{
				bx_basket.push(<?=$arResult["CART_ID"]?>);
				for (var i = 0; i < bx_basket.length; i++) {
					bx_basket[i].refreshCart({});
				}
			}
		<?endif;?>
		function initAdd2Basket() {
			<?
			if(is_array($arResult["CATEGORIES"]["READY"])) {
				foreach ($arResult["CATEGORIES"]["READY"] as $item) {
					?>
					$('[data-action="ADD2BASKET"][data-no-mark!="true"][data-rel$="action=ADD2BASKET&id=<?=$item["PRODUCT_ID"]?>&ajax_basket=Y"]').each(function () {
						switchAdd2BasketButton(this, false);
						$(this).removeClass('disabled');
					});
					<?
				}
			}
			?>
			$('[data-action="ADD2BASKET"][data-rel]').removeClass('disabled');
		}
		$(initAdd2Basket);
	</script>
<?endif;?>