<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$context = Bitrix\Main\Application::getInstance()->getContext();
if (strlen($context->getRequest()->get('ORDER_ID')) > 0):
	include($context->getServer()->getDocumentRoot().$templateFolder."/confirm.php");
elseif ($arParams["DISABLE_BASKET_REDIRECT"] == 'Y' && $arResult["SHOW_EMPTY_BASKET"]):
	//
else:
	?>
	<div class="checkout">
		<?
		if (count($arResult["ERROR"])) {
			foreach ($arResult["ERROR"] as $error) {
				?>
				<div class="alert alert-danger"><?=$error?></div>
				<?
			}
		}
		?>
		<form action="" method="POST" name="ORDER_FORM" id="bx-soa-order-form"
		      enctype="multipart/form-data">
			<?=bitrix_sessid_post()?>
			<?
			if (strlen($arResult["PREPAY_ADIT_FIELDS"]) > 0) {
				echo $arResult["PREPAY_ADIT_FIELDS"];
			}
			?>
			<input type="hidden" name="action" value="saveOrderAjax">
			<input type="hidden" name="location_type" value="code">
			<input type="hidden" name="BUYER_STORE" id="BUYER_STORE" value="<?=$arResult["BUYER_STORE"]?>">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2">
					<div class="checkout-title">Тип плательщика</div>
					<?
					foreach ($arResult["PERSON_TYPE"] as $v) {
						?>
						<div class="radio radio_custom radio_inline">
							<label for="PERSON_TYPE_<?=$v["ID"]?>">
								<input class="radio__control"
								       type="radio"
								       name="PERSON_TYPE"
								       id="PERSON_TYPE_<?=$v["ID"]?>"
									<? if ($v["CHECKED"] == "Y") {
										echo " checked=\"checked\"";
									} ?>
									   value="<?=$v["ID"]?>"/><span class="radio__input"></span><?=$v["NAME"]?>
							</label>
						</div>
						<?
					}
					?>
					<input type="hidden" name="PERSON_TYPE_OLD" value="<?=$arResult["USER_VALS"]["PERSON_TYPE_ID"]?>"/>
					<div class="checkout-line" id="order_form_profiles" style="display: none;">
						<div class="checkout-line__label">Выберите профиль</div>
						<input type="hidden" value="<?=$arResult["USER_VALS"]["PROFILE_ID"] > 0 ? 'Y' : 'N'?>" id="profile_change" name="profile_change">
						<div class="checkout-line__input">
							<select class="select select_chosen" name="PROFILE_ID">
								<?
								if($arResult["USER_VALS"]["PROFILE_ID"] > 0) {
									?>
									<option value="<?=$arResult["USER_VALS"]["PROFILE_ID"]?>" selected="selected"></option>
									<?
								}
								?>
							</select>
						</div>
					</div>
					<div class="checkout-title">
						Контактные данные
						<a class="checkout-title__collapse-link"
						   id="order_form_contact_info_collapse_link"
						   style="display: none;"
						   role="button"
						   data-toggle="collapse"
						   href="#order_form_contact_info_collapse"
						   aria-expanded="false"
						   aria-controls="order_form_contact_info_collapse">Развернуть</a>
					</div>
					<div id="order_form_contact_info_collapse" class="collapse in">
						<div id="order_form_contact_info">
							<?
							foreach ($arResult["JS_DATA"]["ORDER_PROP"]["properties"] as $prop) {
								$val = $prop["VALUE"][0] ?: $prop["DEFAULT_VALUE"];
								?><input type="hidden" name="ORDER_PROP_<?=$prop["ID"]?>" value="<?=$val?>" /><?
							}
							?>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="checkout-title">Доставка</div>
					<?
					foreach($arResult['BASE_DELIVERY_LOCATION'] as $location){
						if(!$location['SELECTED']) {
							continue;
						}
						?>
						<div class="radio radio_custom radio_inline">
							<label>
								<input class="radio__control"
								       type="radio" name="DELIVERY_ADDRESS_0"
								       value="<?=$location['CODE']?>"
								       data-change-local="Y"
								       <? if($location['SELECTED']) { echo ' checked="checked"'; } ?> />
								<span class="radio__input"></span><div id="deliv_name"><?=$location['NAME']?></div>
							</label>
						</div>
						<?
					}
					?>
					<a class="link-dashed" href="#select-city-order" data-toggle="modal">Другой</a>
					<?Intervolga\Custom\SiteTools::beginModal('CityModalOrder') ?>
						<div class="modal fade" id="select-city-order" tabindex="-1">
							<div class="modal-dialog modal-lg" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<div class="modal__title">Выбирите ваш город</div>
										<div class="modal__close" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></div>
									</div>
									<div class="modal-body">
										<div class="columns-radio">
											<?
											foreach($arResult['BASE_DELIVERY_LOCATION'] as $location){
												?>
												<div class="pvx">
													<div class="radio radio_custom">
														<label><input  <? if($location['SELECTED']) { echo ' checked="checked"'; } ?>  class="radio__control"  type="radio" name="CITY_ORDER" value="<?=$location['CODE']?>" data-name="<?=$location['NAME']?>"/><span class="radio__input"></span><?=$location['NAME']?></label>
													</div>
												</div>
												<?
											}
											?>
										</div>
									</div>
									<div class="modal-footer"><button class="btn btn-primary" data-modal-ok>Применить</button></div>
								</div>
							</div>
						</div>
					<?Intervolga\Custom\SiteTools::endModal() ?>
					<div class="checkout-title">Способы доставки</div>
					<div id="order_form_delivery">
					</div>
					<div class="checkout-address" id="delivery_address_map">
						<div class="checkout-address__info">
							<div class="checkout-address__text">Самовывоз осуществляется по адресу:</div>
							<div id="deliveryPickupList">
								<?
								$checked = true;
								foreach ($arResult['STORES_FOR_DELIVERY'] as $store){
									?>
									<div class="radio radio_custom">
										<label>
											<input class="radio__control"
												   type="radio"
												   name="DELIVERY_ADDRESS_1"
												   value="<?=$store['CODE']?>"
												   data-change-local="Y"
												   data-location-lat="<?=$store['LOCATION'][0]?>"
												   data-location-lon="<?=$store['LOCATION'][1]?>"
												   data-location-name="<?=$store['NAME']?>"
												   <?= ($checked ? ' checked="checked"' : '') ?>
											/><span class="radio__input"></span><?=$store['NAME']?>
										</label>
									</div>
									<?
									$checked = false;
								}
								?>
							</div>
						</div>
						<div class="checkout-address__map">
							<div class="contacts-map contacts-map_touch-lock" id="delivery_map" width="100%" height="290px">
								<div class="contacts-map__mess"
								     data-toggle-text="Отключить масштабирование/перемещение для карты <i class=&quot;fa fa-unlock&quot; aria-hidden=&quot;true&quot;></i>">
									Включить масштабирование/перемещение для карты <i class="fa fa-lock" aria-hidden="true"></i></div>
							</div>
						</div>
					</div>
					<div id="delivery_address_input" style="display: none;">
						<div class="checkout-line">
							<div class="checkout-line__label required">Адрес доставки</div>
							<div class="checkout-line__input">
								<input class="input form-control" type="text" name="ORDER_PROP_" value="" data-original-name="DELIVERY_ADDRESS_STRING" placeholder="Пример: Уфа, Новоженова, 88" />
							</div>
						</div>
					</div>
					<div class="checkout-title">Способы оплаты</div>
					<div id="order_form_pay_system">
					</div>
					<div class="checkout-title">Комментарий</div>
					<textarea class="textarea mbl form-control" name="ORDER_DESCRIPTION" rows="7"></textarea>
	
					<div id="errors"></div>
	
					<a class="checkout-catalog" href="/catalog/">Каталог товаров</a>
					<button id="make_order" type="button" class="btn btn-primary btn-lg" role="button" data-loading-text="Оформление...">ОФОРМИТЬ ЗАКАЗ</button>
				</div>
			</div>
		</form>
	</div>
	
	<?
	$signer = new \Bitrix\Main\Security\Sign\Signer;
	$signedParams = $signer->sign(base64_encode(serialize($arParams)), 'sale.order.ajax');
	$messages = \Bitrix\Main\Localization\Loc::loadLanguageFile(__FILE__);
	?>
	
	<script type="text/javascript">
		BX.message(<?=CUtil::PhpToJSObject($messages)?>);
		BX.Sale.OrderAjaxComponent.init({
			result: <?=CUtil::PhpToJSObject($arResult['JS_DATA'])?>,
			locations: <?=CUtil::PhpToJSObject($arResult['LOCATIONS'])?>,
			params: <?=CUtil::PhpToJSObject($arParams)?>,
			signedParamsString: '<?=CUtil::JSEscape($signedParams)?>',
			siteID: '<?=CUtil::JSEscape(SITE_ID)?>',
			ajaxUrl: '<?=CUtil::JSEscape($this->__component->GetPath() . '/ajax.php')?>',
			templateFolder: '<?=CUtil::JSEscape($templateFolder)?>'
		});
	</script>
	<?
endif;