<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
use Bitrix\Main\Localization\Loc;
/**
 * @var array $arParams
 * @var array $arResult
 * @var $APPLICATION CMain
 */
$APPLICATION->SetTitle(Loc::getMessage("SOA_ORDER_COMPLETE"));
?>

<? if (!empty($arResult["ORDER"])): ?>
	<div class="checkout-info">
		<p>
			<?=Loc::getMessage("SOA_ORDER_SUC", array(
				"#ORDER_DATE#" => $arResult["ORDER"]["DATE_INSERT"],
				"#ORDER_ID#" => $arResult["ORDER"]["ACCOUNT_NUMBER"]
			))?>
		</p>
		<p>
			<?
			$result = \Bitrix\Sale\Internals\StatusTable::getList(array(
				'select' => array('ID', "NAME" => 'Bitrix\Sale\Internals\StatusLangTable:STATUS.NAME'),
				'filter' => array(
					'=ID' => $arResult["ORDER"]["STATUS_ID"],
					'=TYPE' => \Bitrix\Sale\OrderStatus::TYPE
				),
			))->fetch();
			?>
			Статус заказа: <?=$result["NAME"]?>
		</p>
		<p>
			Способ оплаты: <?=$arResult["PAY_SYSTEM"]["NAME"]?>
		</p>
	<?
	if ($arResult["ORDER"]["IS_ALLOW_PAY"] === 'Y')
	{
		if (!empty($arResult["PAYMENT"]))
		{
			foreach ($arResult["PAYMENT"] as $payment)
			{
				if ($payment["PAID"] != 'Y')
				{
					if (!empty($arResult['PAY_SYSTEM_LIST'])
					&& array_key_exists($payment["PAY_SYSTEM_ID"], $arResult['PAY_SYSTEM_LIST'])
					)
					{
						$arPaySystem = $arResult['PAY_SYSTEM_LIST'][$payment["PAY_SYSTEM_ID"]];

						if (empty($arPaySystem["ERROR"]))
						{?>
							<? if ($arResult["ORDER"]["STATUS_ID"] == "W"): ?>
								<?
								$orderAccountNumber = urlencode(urlencode($arResult["ORDER"]["ACCOUNT_NUMBER"]));
								$paymentAccountNumber = $payment["ID"];
								?>
								<script>
									window.open('<?=$arParams["PATH_TO_PAYMENT"]?>?ORDER_ID=<?=$orderAccountNumber?>&PAYMENT_ID=<?=$paymentAccountNumber?>');
								</script>
								<?=Loc::getMessage("SOA_PAY_LINK", array("#LINK#" => $arParams["PATH_TO_PAYMENT"]."?ORDER_ID=".$orderAccountNumber."&PAYMENT_ID=".$paymentAccountNumber))?>
							<? endif ?>
						<?}
					}
				}
			}
		}
	}?>
		<p>
			<br />
			<?$APPLICATION->IncludeComponent(
				"bitrix:main.include",
				"",
				Array(
					"AREA_FILE_SHOW" => "file",
					"AREA_FILE_SUFFIX" => "inc",
					"EDIT_TEMPLATE" => "",
					"PATH" => SITE_TEMPLATE_PATH . '/include/order_confirm.php'
				)
			);?>
		</p>
	</div>
	<div class="row">
		<div class="col-md-3">
			<a href="/" class="btn btn-default btn-block">Главная</a>
		</div>
		<div class="col-md-3">
			<a href="/personal/orders/<?=$arResult["ORDER"]["ACCOUNT_NUMBER"]?>/" class="btn btn-default btn-block">Заказ №<?=$arResult["ORDER"]["ACCOUNT_NUMBER"]?></a>
		</div>
		<div class="col-md-3">
			<a href="/personal/orders/" class="btn btn-default btn-block">Мои заказы</a>
		</div>
		<div class="col-md-3">
			<a href="/personal/" class="btn btn-default btn-block">Личный кабинет</a>
		</div>
	</div>
	<br />
<? else: ?>
	<div class="checkout-info">
		<div class="h4"><?=Loc::getMessage("SOA_ERROR_ORDER")?></div>
		<p>
			<?=Loc::getMessage("SOA_ERROR_ORDER_LOST", array("#ORDER_ID#" => $arResult["ACCOUNT_NUMBER"]))?>
			<?=Loc::getMessage("SOA_ERROR_ORDER_LOST1")?>
		</p>
	</div>
<? endif ?>

<?
if($arResult['ORDER_ID'] && \Bitrix\Main\Loader::includeModule('intervolga.custom')):?>
<?$orderData = \Intervolga\Custom\Product::getProtocolForOrder($arResult['ORDER']);?>
    <script>
        BX.ready(function () {
            window.dataLayer = dataLayer || [];
            window.dataLayer.push({
                'ecommerce' : {
                    'purchase' : {
                        'actionField': {
                            'id': '<?=$orderData["ecommerce"]["purchase"]["actionField"]["id"]?>',
                            'affiliation': '<?=$orderData["ecommerce"]["purchase"]["actionField"]["affiliation"]?>',
                            'revenue': '<?=$orderData["ecommerce"]["purchase"]["actionField"]["revenue"]?>',
                            'tax': '<?=$orderData["ecommerce"]["purchase"]["actionField"]["tax"]?>',
                            'shipping': '<?=$orderData["ecommerce"]["purchase"]["actionField"]["shipping"]?>',
                            'coupon': '<?=$orderData["ecommerce"]["purchase"]["actionField"]["coupon"]?>',
                        },
                        'products': [
                            <?foreach ($orderData['ecommerce']['purchase']['products'] as $product):?>
                            {
                                'name': '<?=$product["name"]?>',
                                'id': '<?=$product["id"]?>',
                                'price': '<?=$product["price"]?>',
                                'brand': '<?=$product["brand"]?>',
                                'category': '<?=$product["category"]?>',
                                'variant': '<?=$product["variant"]?>',
                                'quantity': '<?=$product["quantity"]?>',
                                'coupon': '<?=$product["coupon"]?>'
                            },
                            <?endforeach;?>
                        ]
                    }
                }
            });
        });
    </script>
<?endif;?>
