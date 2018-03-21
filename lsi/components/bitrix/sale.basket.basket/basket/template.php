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
/** @var CBitrixBasketComponent $component */

$curPage = $APPLICATION->GetCurPage() . '?' . $arParams["ACTION_VARIABLE"] . '=';
$arUrls = array(
	"delete" => $curPage . "delete&id=#ID#",
	"delay" => $curPage . "delay&id=#ID#",
	"add" => $curPage . "add&id=#ID#",
);
unset($curPage);

if (strlen($arResult["ERROR_MESSAGE"]) <= 0) {
	if($arResult['COUNT_CAN_BUY']) {
		?>
		<div id="warning_message">
			<?
			if (!empty($arResult["WARNING_MESSAGE"]) && is_array($arResult["WARNING_MESSAGE"])) {
				foreach ($arResult["WARNING_MESSAGE"] as $v) {
					ShowError($v);
				}
			}
			?>
		</div>
		<?

		if (!empty($arResult["ERROR_MESSAGE"])) {
			ShowError($arResult["ERROR_MESSAGE"]);
		}

		$normalCount = count($arResult["ITEMS"]["AnDelCanBuy"]);
		$normalHidden = ($normalCount == 0) ? 'style="display:none;"' : '';

		$delayCount = count($arResult["ITEMS"]["DelDelCanBuy"]);
		$delayHidden = ($delayCount == 0) ? 'style="display:none;"' : '';

		$subscribeCount = count($arResult["ITEMS"]["ProdSubscribe"]);
		$subscribeHidden = ($subscribeCount == 0) ? 'style="display:none;"' : '';

		$naCount = count($arResult["ITEMS"]["nAnCanBuy"]);
		$naHidden = ($naCount == 0) ? 'style="display:none;"' : '';

		?>
		<form method="post" action="<?=POST_FORM_ACTION_URI?>" name="basket_form" id="basket_order_form"
		      class="list-orders">

			<?
			$ratio = isset($arItem["MEASURE_RATIO"]) ? $arItem["MEASURE_RATIO"] : 0;
			$useFloatQuantity = ($arParams["QUANTITY_FLOAT"] == "Y") ? true : false;
			$useFloatQuantityJS = ($useFloatQuantity ? "true" : "false");
			foreach ($arResult["GRID"]["ROWS"] as $k => $item) {
				if ($item["DELAY"] == "N" && $item["CAN_BUY"] == "Y") {
					?>
					<div class="list-orders__item list-orders__item_product" data-item-id="<?=$item["ID"]?>">
						<a class="list-orders__img" href="<?=$item["DETAIL_PAGE_URL"]?>" target="_blank">
							<img class="img-responsive" src="<?=$item['DETAIL_PICTURE']['src']?>"
							     alt="<?=$item["NAME"]?>"/>
						</a>
						<div class="list-orders__content">
							<a class="list-orders__title" href="<?=$item["DETAIL_PAGE_URL"]?>" target="_blank"><?=$item["NAME"]?></a>
							<div class="list-orders__id">Код товара: <span><?=$item['TRAITS']["Код"]?></span></div>
							<div data-store-inf></div>
						</div>
						<div class="list-orders__control">
							<div class="list-orders__price"><?=$item["PRICE_FORMATED"]?></div>
							<? if ($item["FULL_PRICE"] != $item["PRICE"]) { ?>
								<div class="list-orders__old-price"><?=$item["FULL_PRICE_FORMATED"]?></div>
							<? } ?>
							<div class="list-orders__number">
								<div class="cart-control">
									<a class="cart-control__minus"
									   href="javascript:void(0)"
									   rel="nofollow"></a>
									<input class="cart-control__input"
									       disabled
									       data-min="1"
									       data-max="10"
									       type="text"
									       id="QUANTITY_INPUT_<?=$item["ID"]?>"
									       name="QUANTITY_INPUT_<?=$item["ID"]?>"
									       value="<?=$item["QUANTITY"]?>"
									       onchange="updateQuantity('QUANTITY_INPUT_<?=$item["ID"]?>', '<?=$item["ID"]?>', <?=$ratio?>, <?=$useFloatQuantityJS?>);"/>
									<input type="hidden" id="QUANTITY_<?=$item['ID']?>" name="QUANTITY_<?=$item['ID']?>"
									       value="<?=$item["QUANTITY"]?>"/>
									<a class="cart-control__plus"
									   href="javascript:void(0)"
									   rel="nofollow"></a>
								</div>
							</div>
						</div>
						<div data-href-remove="<?=str_replace("#ID#", $item["ID"], $arUrls["delete"])?>"
						     class="list-orders__remove"></div>
					</div>
					<?
				}
			}

			$arHeaders = array();
			foreach ($arResult["GRID"]["HEADERS"] as $id => $arHeader) {
				$arHeaders[] = $arHeader["id"];
			}
			?>

			<input type="hidden" id="column_headers" value="<?=CUtil::JSEscape(implode($arHeaders, ","))?>"/>
			<input type="hidden" id="offers_props"
			       value="<?=CUtil::JSEscape(implode($arParams["OFFERS_PROPS"], ","))?>"/>
			<input type="hidden" id="action_var" value="<?=CUtil::JSEscape($arParams["ACTION_VARIABLE"])?>"/>
			<input type="hidden" id="quantity_float" value="<?=$arParams["QUANTITY_FLOAT"]?>"/>
			<input type="hidden" id="count_discount_4_all_quantity"
			       value="<?=($arParams["COUNT_DISCOUNT_4_ALL_QUANTITY"] == "Y") ? "Y" : "N"?>"/>
			<input type="hidden" id="price_vat_show_value"
			       value="<?=($arParams["PRICE_VAT_SHOW_VALUE"] == "Y") ? "Y" : "N"?>"/>
			<input type="hidden" id="hide_coupon" value="<?=($arParams["HIDE_COUPON"] == "Y") ? "Y" : "N"?>"/>
			<input type="hidden" id="use_prepayment" value="<?=($arParams["USE_PREPAYMENT"] == "Y") ? "Y" : "N"?>"/>
			<input type="hidden" id="auto_calculation" value="<?=($arParams["AUTO_CALCULATION"] == "N") ? "N" : "Y"?>"/>

			<input type="hidden" name="BasketOrder" value="BasketOrder"/>
			<!-- <input type="hidden" name="ajax_post" id="ajax_post" value="Y"> -->

			<div class="list-orders__item" id="basket_order_form_sum">
				<div class="list-orders__shipping" id="delivery_price">
					Доставка: <span></span>
				</div>
				<div class="list-orders__total">
					<div class="list-orders__total-label">Итого:</div>
					<div class="list-orders__total-price">
						<div class="list-orders__price"><?=$arResult["allSum_FORMATED"]?></div>
						<?
						if ($arResult["DISCOUNT_PRICE_ALL"]) {
							?>
							<div class="list-orders__old-price"><?=$arResult["PRICE_WITHOUT_DISCOUNT"]?></div>
							<?
						}
						?>
					</div>
				</div>
			</div>
		</form>
		<?
	}

	if(!$arResult['COUNT_CAN_BUY'] && !$_REQUEST['ORDER_ID']) {
		ShowError('В вашей корзине ещё нет товаров');
	}
} else {
	ShowError($arResult["ERROR_MESSAGE"]);
}
?>
<div id="order-warning-zone" class="alert alert-warning" style="display: none;"></div>
<div class="pvl"></div>