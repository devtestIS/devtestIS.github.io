<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

foreach ($arResult["BASKET_ITEMS"] as &$item) {
    if ($item["DETAIL_PICTURE"]) {
        $item["DETAIL_PICTURE"] = CFile::GetFileArray($item["DETAIL_PICTURE"]);
        if ($item["DETAIL_PICTURE"]) {
            $item["DETAIL_PICTURE"] = ResizeImageGetIV(
                $item['DETAIL_PICTURE'],
                array('height' => 100, 'width' => 150),
                BX_RESIZE_IMAGE_PROPORTIONAL
            );
        }
    }
}
unset($item);

foreach ($arResult["ORDER_PROP"]["USER_PROPS_Y"] as $key => $prop) {
    if($prop["CODE"] == "DELIVERY_ADDRESS"){
        $arResult["ORDER_PROP"]["USER_PROPS_Y"][$key]['DEFAULT_VALUE'] = \Intervolga\Custom\City::getCurrent()['UF_LOCATION_CODE'];
    }
}

$request = \Bitrix\Main\Context::getCurrent()->getRequest();

$cityXmlId = false;
foreach ($arResult["JS_DATA"]["ORDER_PROP"]["properties"] as $key => $prop) {
    if($prop["CODE"] == "DELIVERY_ADDRESS"){
        $arResult["JS_DATA"]["ORDER_PROP"]["properties"][$key]['DEFAULT_VALUE'] = \Intervolga\Custom\City::getCurrent()['UF_LOCATION_CODE'];

        $locationCode = $request->get('order[ORDER_PROP_4]');
        if($locationCode) {
            $dm = \Intervolga\Custom\City::getDM();
            $city = $dm::getList(array('filter' => array('UF_LOCATION_CODE' => $locationCode)))->fetch();
            if($city){
                $cityXmlId = $city['UF_XML_ID'];
            }
        }
    }
}
$arResult['STORES_FOR_DELIVERY'] = \Intervolga\Custom\Product::getStores(false, $cityXmlId);
unset($arResult['STORES_FOR_DELIVERY']['CENTER']);

$arResult['BASE_DELIVERY_LOCATION'] = \Intervolga\Custom\Product::getBaseDeliveryLocation();

$selected = false;
$city = \Intervolga\Custom\City::getCurrent();
foreach ($arResult['BASE_DELIVERY_LOCATION'] as &$loc) {
    if ($loc['CODE'] == $city['UF_LOCATION_CODE']) {
        $loc['SELECTED'] = true;
        $selected = true;
        break;
    }
}
unset($loc);
if (!$selected) {
    foreach ($arResult['BASE_DELIVERY_LOCATION'] as &$loc) {
        $loc['SELECTED'] = true;
        break;
    }
    unset($loc);
}