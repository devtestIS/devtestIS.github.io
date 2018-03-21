<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

use Bitrix\Main\Localization\Loc;
use Bitrix\Main\Entity;
Loc::loadMessages(__FILE__);

// we dont trust input params, so validation is required
$legalColors = array(
	'green' => true,
	'yellow' => true,
	'red' => true,
	'gray' => true
);
// default colors in case parameters unset
$defaultColors = array(
	'N' => 'green',
	'P' => 'yellow',
	'F' => 'gray',
	'PSEUDO_CANCELLED' => 'red'
);

foreach ($arParams as $key => $val)
	if(strpos($key, "STATUS_COLOR_") !== false && !$legalColors[$val])
		unset($arParams[$key]);

// to make orders follow in right status order
if(is_array($arResult['INFO']) && !empty($arResult['INFO']))
{
	foreach($arResult['INFO']['STATUS'] as $id => $stat)
	{
		$arResult['INFO']['STATUS'][$id]["COLOR"] = $arParams['STATUS_COLOR_'.$id] ? $arParams['STATUS_COLOR_'.$id] : (isset($defaultColors[$id]) ? $defaultColors[$id] : 'gray');
		$arResult["ORDER_BY_STATUS"][$id] = array();
	}
}
$arResult["ORDER_BY_STATUS"]["PSEUDO_CANCELLED"] = array();

$arResult["INFO"]["STATUS"]["PSEUDO_CANCELLED"] = array(
	"NAME" => Loc::getMessage('SPOL_PSEUDO_CANCELLED'),
	"COLOR" => $arParams['STATUS_COLOR_PSEUDO_CANCELLED'] ? $arParams['STATUS_COLOR_PSEUDO_CANCELLED'] : (isset($defaultColors['PSEUDO_CANCELLED']) ? $defaultColors['PSEUDO_CANCELLED'] : 'gray')
);

$IDS = array();

if(is_array($arResult["ORDERS"]) && !empty($arResult["ORDERS"]))
{
	foreach ($arResult["ORDERS"] as $index => $order)
	{
		$IDS[] = $order["ORDER"]["ID"];
		$order['HAS_DELIVERY'] = intval($order["ORDER"]["DELIVERY_ID"]) || strpos($order["ORDER"]["DELIVERY_ID"], ":") !== false;

		$stat = $order['ORDER']['CANCELED'] == 'Y' ? 'PSEUDO_CANCELLED' : $order["ORDER"]["STATUS_ID"];
		$color = $arParams['STATUS_COLOR_'.$stat];
		$order['STATUS_COLOR_CLASS'] = empty($color) ? 'gray' : $color;

		$arResult["ORDER_BY_STATUS"][$stat][] = $order;
		$arResult["ORDERS"][$order["ORDER"]["ID"]] = $order;
		unset($arResult["ORDERS"][$index]);
	}
}
if(!empty($IDS))
{
	$res = \Bitrix\Sale\Internals\OrderPropsValueTable::getList(
		array(
			"select" => array(
				"NAME",
				"TITLE" => "PROP.NAME",
				"LINK" => "PROP.DESCRIPTION",
				"ORDER_ID"
			),
			"filter" => array(
				"=ORDER_ID" => $IDS,
				"=CODE" => "DELIVERY_SERVICE",
				"!VALUE" => 0
			),
			"runtime" => array(
				new Entity\ReferenceField(
					"PROP",
					"\Bitrix\Sale\Internals\OrderPropsVariantTable",
					array(
						"=this.ORDER_PROPS_ID" => "ref.ORDER_PROPS_ID",
						"=this.VALUE" => "ref.VALUE"
					)
				)
			)
		)
	);
	while ($arDelServ = $res->fetch())
	{
		$arResult["ORDERS"][$arDelServ["ORDER_ID"]]["ORDER"]["DELIV_SERV"] = $arDelServ;
	}
}