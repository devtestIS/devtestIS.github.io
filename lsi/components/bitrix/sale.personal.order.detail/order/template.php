<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
	die();
}
if (!empty($arResult['ERRORS']['FATAL'])) {
	foreach ($arResult['ERRORS']['FATAL'] as $error){
		echo ShowError($error);
	}
	$component = $this->__component;
	if ($arParams['AUTH_FORM_IN_TEMPLATE'] && isset($arResult['ERRORS']['FATAL'][$component::E_NOT_AUTHORIZED])){
		$APPLICATION->AuthForm('', false, false, 'N', false);
	}
} else {
	if (!empty($arResult['ERRORS']['NONFATAL'])){
		foreach ($arResult['ERRORS']['NONFATAL'] as $error){
			echo ShowError($error);
		}
	}

	$this->SetViewTarget('after_title_html');
	?><a class="btn btn_print shop-top-line__btn" role="button" href="?print=yes" target="_blank">распечатать страницу</a><?
	$this->EndViewTarget();
	?>

	<div class="order-detailed">
		<div class="order-detailed__head">
			<div class="order-detailed__title">Состояние заказа</div>
			<div class="order-detailed__row">
				<div class="order-detailed__label">Статус:</div>
				<div class="order-detailed__status order-detailed__status_color_<?=strtolower($arResult["STATUS"]['ID'])?>">
					<?=$arResult["STATUS"]['NAME']?>
					<i>(<?=$arResult["DATE_STATUS_FORMATED"]?>)</i>
				</div>
			</div>
			<?foreach ($arResult['PAYMENT'] as $payment):?>
				<div class="order-detailed__row">
					<div class="order-detailed__label">Оплачен:</div>
				<span class="span">
					<?
					if ($payment["PAID"] == "Y"){
						$payInf = GetMessage('SPOD_YES').' (Сумма: '.$payment["PRICE_FORMATED"];
						if($payment['COMMENTS']){
							$payInf .= ', Комментарий: '.$payment['COMMENTS'];
						}
						$payInf .= ')';
						echo $payInf;
					} else {
						$payInf = GetMessage('SPOD_NO').' (Сумма: '.$payment["PRICE_FORMATED"];
						if($payment['COMMENTS']){
							$payInf .= ', Комментарий: '.$payment['COMMENTS'];
						}
						$payInf .= ')';
						echo $payInf;
					}
					?>
				</span>
				</div>
				<?if($payment["PAID"] != "Y" && $arResult["STATUS"]['ID'] == 'W'):?>
					<?if($payment["CAN_REPAY"]=="Y" && $payment["PAY_SYSTEM"]["PSA_NEW_WINDOW"] == "Y"):?>
						<a class="btn btn-primary" role="button" href="<?=$payment["PAY_SYSTEM"]["PSA_ACTION_FILE"]?>" target="_blank">ОПЛАТИТЬ</a>
					<?endif;?>
				<?endif;?>
			<?endforeach;?>
		</div>
		<div class="order-detailed__body">
			<div class="order-detailed__title">Состав заказа</div>
			<div class="pseudo-table pseudo-table_striped_even pseudo-table_bordered order-detailed__table" data-auto-title="true">
				<div class="pseudo-table__thead">
					<div class="pseudo-table__tr">
						<div class="pseudo-table__th pseudo-table__th_colspan"></div>
						<div class="pseudo-table__th hidden-xs hidden-sm" colspan="2"></div>
						<div class="pseudo-table__th">Цена</div>
						<div class="pseudo-table__th">Кол-во</div>
						<div class="pseudo-table__th">Сумма</div>
					</div>
				</div>
				<div class="pseudo-table__tbody">
					<?
					if (isset($arResult["BASKET"])) {
						$count = 1;
						foreach ($arResult["BASKET"] as $prod) {
							?>
							<div class="pseudo-table__tr">
								<div class="pseudo-table__td hidden-xs hidden-sm"><?=$count++?></div>
								<div class="pseudo-table__td text-left">
									<a class="link" href="<?=$prod["DETAIL_PAGE_URL"]?>"
									   target="_blank"><?=htmlspecialcharsEx($prod["NAME"])?></a>
								</div>
								<div class="pseudo-table__td"><?=$prod["PRICE_FORMATED"]?></div>
								<div class="pseudo-table__td">
									<?=$prod["QUANTITY"]?>
									<? if (strlen($prod['MEASURE_TEXT'])): ?>
										<?=$prod['MEASURE_TEXT']?>
									<? else: ?>
										<?=GetMessage('SPOD_DEFAULT_MEASURE')?>
									<? endif ?>
								</div>
								<div class="pseudo-table__td">
									<?=$prod["FORMATED_SUM"]?>
								</div>
							</div>
							<?
						}
					}
					?>
				</div>
				<div class="pseudo-table__tfoot">
					<div class="pseudo-table__tr">
						<div class="pseudo-table__td pseudo-table__td_colspan hidden-xs hidden-sm"></div>
						<div class="pseudo-table__td text-left">
							<div class="total-shipping">
								<div class="total-shipping__label">Доставка:</div><span class="span"><?=$arResult["PRICE_DELIVERY"] == 0 ? 'Бесплатно' : $arResult["PRICE_DELIVERY_FORMATED"]?></span></div>
						</div>
						<div class="pseudo-table__td pseudo-table__td_total text-right">Итого:</div>
						<div class="pseudo-table__td pseudo-table__td_nowrap"><?=$arResult["PRICE_FORMATED"]?></div>
						<div class="pseudo-table__td hidden-xs hidden-sm"></div>
					</div>
				</div>
			</div>
		</div>
		<div class="info-contact" data-height="equal" data-target=".info-contact__item">
			<div class="info-contact__data info-contact__item">
				<div class="info-contact__title">Контактные данные</div>
				<?
				if (isset($arResult["ORDER_PROPS"])){
					foreach ($arResult["ORDER_PROPS"] as $prop){
						if($prop['CODE']=='DELIVERY_ADDRESS' || $prop['CODE']=='DELIVERY_ADDRESS_STRING'){
							continue;
						}
						if($prop['CODE']=='PHONE'){
							$prop["VALUE"] = preg_replace(
								'/^(\+?7|8)([0-9]{3})([0-9]{3})([0-9]{2})([0-9]{2})$/',
								'+7($2)$3-$4-$5',
								preg_replace('[^0-9]', '', $prop["VALUE"])
							);
						}
						?>
						<div class="info-contact__label"><?=$prop['NAME']?>:</div>
						<div class="info-contact__value">
							<?
							if ($prop["TYPE"] == "CHECKBOX"){
								?>
								<?=GetMessage('SPOD_' . ($prop["VALUE"] == "Y" ? 'YES' : 'NO'))?>
								<?
							} else {
								?>
								<?=$prop["VALUE"]?>
								<?
							}
							?>
						</div>
					<?
					}
				}
				if (!empty($arResult["USER_DESCRIPTION"])){
					?>
					<div class="info-contact__label">Комментарии к заказу:</div>
					<div class="info-contact__value"></div>
					<div class="info-contact__review"><?=$arResult["USER_DESCRIPTION"]?></div>
					<?
				}
				?>
			</div>
			<div class="info-contact__methods info-contact__item">
				<div class="info-contact__title">Способ доставки</div>
				<?
				foreach ($arResult['SHIPMENT'] as $shipment) {
					?>
					<div class="info-contact__strong">
						<?= intval($shipment["DELIVERY_ID"]) ? $shipment["DELIVERY"]["NAME"] : GetMessage("SPOD_NONE")?>
					</div>
					<?
					if (isset($arResult["ORDER_PROPS"])){
						foreach ($arResult["ORDER_PROPS"] as $prop){
							if($prop['CODE']!='DELIVERY_ADDRESS_STRING'){
								continue;
							}
							?>
							<div class="info-contact__address-label">Адрес: </div>
							<div class="info-contact__address-value"><?=$prop["VALUE"]?></div>
							<?
						}
					}
					if($arResult["TRACKING_NUMBER"] && $arResult["DELIV_SERV"])
					{?>
						<div class="info-contact__strong">Отслеживание заказа</div>
						<div class="info-contact__label"><?= $arResult["DELIV_SERV"]["NAME"]?>:</div>
						<div class="info-contact__value"><?= $arResult["DELIV_SERV"]["TITLE"]?></div>
						<div class="info-contact__label">Трек-номер:</div>
						<div class="info-contact__value">№ <a href="<?= $arResult["DELIV_SERV"]["LINK"]?>"><?= $arResult["TRACKING_NUMBER"]?></a></div>
				<?}
				}
				?>
				<div class="info-contact__title">Способ оплаты</div>
				<div class="info-contact__strong">
					<?
					foreach ($arResult['PAYMENT'] as $payment){
						if (intval($payment["PAY_SYSTEM_ID"])){
							if ($payment['PAY_SYSTEM']) {
								echo $payment["PAY_SYSTEM"]["NAME"];
							} else {
								echo $payment["PAY_SYSTEM_NAME"];
							}
						}else{
							echo GetMessage("SPOD_NONE");
						}
						echo '<br>';
					}
					?>
				</div>
			</div>
		</div>
		<div class="order-detailed__footer">
			<a class="btn btn-link" role="button" href="<?=$arResult["URL_TO_LIST"]?>">В список заказов</a>
			<?
			if ($arResult["CANCELED"] != "Y" && $arResult["CAN_CANCEL"] == "Y"){
				?>
				<a class="btn btn-default pull-right" role="button" href="<?=$arResult["URL_TO_CANCEL"]?>">ОТМЕНИТЬ</a>
				<?
			}
			?>
		</div>
	</div>
	<?
}
?>