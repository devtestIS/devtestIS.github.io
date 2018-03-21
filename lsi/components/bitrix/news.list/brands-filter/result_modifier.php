<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$arResult["SHORT_ITEMS"] = array();

$elTable = \CIBlockElement::getlist(
    array(),
    array(
        "IBLOCK_ID" => IBLOCK_ID_SERVICE_CENTER,
        'PROPERTY_CITY' => $arParams['CITY']
    ),
    false,
    false,
    array("ID", "PROPERTY_BRANDS")
);
$arBrands = array();
while ($arBrand = $elTable->fetch()) {
    $arBrands[$arBrand["PROPERTY_BRANDS_VALUE"]] = $arBrand["PROPERTY_BRANDS_VALUE"];
}
if ($arResult["ITEMS"]) {
    foreach ($arResult["ITEMS"] as $item) {
        if ($arBrands[$item["ID"]]) {
            $arResult["SHORT_ITEMS"][$item["ID"]] = $item["NAME"];
        }
    }
}
$this->__component->SetResultCacheKeys(array("SHORT_ITEMS"));
?>