<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?
if(!empty($arResult['ERRORS']['FATAL'])) {
	foreach ($arResult['ERRORS']['FATAL'] as $error) {
		echo ShowError($error);
	}
	$component = $this->__component;
	if ($arParams['AUTH_FORM_IN_TEMPLATE'] && isset($arResult['ERRORS']['FATAL'][$component::E_NOT_AUTHORIZED])) {
		$APPLICATION->AuthForm('', false, false, 'N', false);
	}
}else{
	if(!empty($arResult['ERRORS']['NONFATAL'])) {
		foreach ($arResult['ERRORS']['NONFATAL'] as $error) {
			echo ShowError($error);
		}
	}

	if(!empty($arResult['ORDERS'])){
		foreach($arResult["ORDERS"] as $key => $order){
			?>
			<div class="order-item">
				<div class="order-item__head">
					<div class="order-item__title">
						Заказ <a href="<?=$order["ORDER"]["URL_TO_DETAIL"]?>">№ <?=$order["ORDER"]["ACCOUNT_NUMBER"]?></a>
						от <?=$order["ORDER"]["DATE_INSERT_FORMATED"];?>
						на сумму <?=$order["ORDER"]["FORMATED_PRICE"]?>
					</div>
					<div class="order-item__label order-item__label_status_<?=strtolower($order["ORDER"]["STATUS_ID"])?>"><?=$arResult["INFO"]["STATUS"][$order["ORDER"]["STATUS_ID"]]["NAME"]?></div>
				</div>
				<div class="order-item__body">
					<div class="order-item__row">
						<div class="order-item__col order-item__col_column_one"><strong>Оплата:</strong></div>
						<div class="order-item__col order-item__col_column_two">
							<?
							// PAY SYSTEM
							$paySystemList = array();
							foreach($order["PAYMENT"] as $payment) {
								$paySystemList[] = $arResult['INFO']['PAY_SYSTEM'][$payment['PAY_SYSTEM_ID']]['NAME'];
							}
							if(!empty($paySystemList)){
								echo implode(', ', $paySystemList);
							}
							?>
							<br />
							<?= $order["ORDER"]["PAYED"] == "Y" ? 'Оплачен' : 'Не оплачен' ?>
						</div>
						<div class="order-item__col order-item__col_column_three"><strong>Доставка:</strong></div>
						<div class="order-item__col order-item__col_column_four">
							<?
							// DELIVERY SYSTEM
							$deliveryServiceList = array();
							foreach ($order['SHIPMENT'] as $shipment) {
								$deliveryServiceList[] = $arResult['INFO']['DELIVERY'][$shipment['DELIVERY_ID']]['NAME'];
							}
							if(!empty($deliveryServiceList)){
								echo implode(', ', $deliveryServiceList);
							}
							?>
						</div>
					</div>
					<div class="order-item__row">
						<div class="order-item__col order-item__col_column_one"><strong>Состав:</strong></div>
						<div class="order-item__col order-item__col_column_table">
							<div class="pseudo-table pseudo-table_striped_even table-bordered">
								<div class="pseudo-table__tbody">
									<?
									$count = 1;
									foreach ($order["BASKET_ITEMS"] as $item){
										?>
										<div class="pseudo-table__tr">
											<div class="pseudo-table__td hidden-xs hidden-sm"><?=$count++?></div>
											<div class="pseudo-table__td text-left">
												<a class="link" href="<?=$item["DETAIL_PAGE_URL"]?>" target="_blank"><?=$item['NAME']?></a>
											</div>
											<div class="pseudo-table__td"><?=$item['QUANTITY']?> <?=(isset($item["MEASURE_NAME"]) ? $item["MEASURE_NAME"] : GetMessage('SPOL_SHT'))?></div>
										</div>
										<?
									}
									?>
								</div>
							</div>
						</div>
					</div>
					<div class="order-item__row">
						<div class="order-item__col order-item__col_column_more"><a href="<?=$order["ORDER"]["URL_TO_DETAIL"]?>">Подробнее о заказе</a></div>
						<div class="order-item__col order-item__col_column_group-control">
							<a class="btn btn-primary" role="button" href="<?=$order["ORDER"]["URL_TO_COPY"]?>">Повторить</a>
							<?
							if($order["ORDER"]["CANCELED"] != "Y" && $order["ORDER"]["CAN_CANCEL"] == 'Y') {
								?>
								<a class="btn btn-default" role="button"
								   href="<?=$order["ORDER"]["URL_TO_CANCEL"]?>">Отменить</a>
								<?
							}
							?>
						</div>
					</div>
				</div>
			</div>
			<?
		}
		if(strlen($arResult['NAV_STRING'])) {
			echo $arResult['NAV_STRING'];
		}
	}else{
		echo GetMessage('SPOL_NO_ORDERS');
	}
}
?>