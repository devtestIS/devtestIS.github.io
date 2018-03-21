<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$offerLinkID = null;
foreach ($arResult["PROPERTY_LIST_FULL"] as $id => $arProperty) {
    if ($arProperty['CODE'] == 'OFFER_LINK') {
        $offerLinkID = $id;
    }
}

foreach ($arResult["PROPERTY_LIST"] as $index => $propertyID) {
    if($arResult["PROPERTY_LIST_FULL"][$propertyID]["GetPublicEditHTML"]) {
        $arResult["PROPERTY_LIST_FULL"][$propertyID]["PROPERTY_TYPE"] = "USER_TYPE";
    }

    if ($arResult["PROPERTY_LIST_FULL"][$propertyID]["PROPERTY_TYPE"] == "S"
        && $arResult["PROPERTY_LIST_FULL"][$propertyID]["ROW_COUNT"] > "1") {

        $arResult["PROPERTY_LIST_FULL"][$propertyID]["PROPERTY_TYPE"] = "T";
    }

    if (($propertyID == "TAGS") && CModule::IncludeModule('search')) {
        $arResult["PROPERTY_LIST_FULL"][$propertyID]["PROPERTY_TYPE"] = "TAGS";
    }

    if (isset($arResult["PROPERTY_LIST_FULL"][$propertyID]["USER_TYPE"]) &&
        $arResult["PROPERTY_LIST_FULL"][$propertyID]["USER_TYPE"] == "DateTime") {

        $arResult["PROPERTY_LIST_FULL"][$propertyID]["PROPERTY_TYPE"] = "DATETIME";
    }

    if ($propertyID == $offerLinkID)
    {
        $arResult["PROPERTY_LIST"][$index] = array();
        $arResult["PROPERTY_LIST"][$index]['ID'] = $propertyID;

        if ($propertyID == $offerLinkID) {
            $arResult["PROPERTY_LIST"][$index]['CODE'] = 'OFFER_LINK';
        }
    }
}
?>
