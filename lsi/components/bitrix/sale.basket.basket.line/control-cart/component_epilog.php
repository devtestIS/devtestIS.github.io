<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['action'] == 'getBuyWith'){
    global $APPLICATION;
    $APPLICATION->RestartBuffer();

    $addedInBasketIds = array(-1);

    $ElementID = intval($_POST['element']);

    if($ElementID <= 0){
        echo '$ElementID';
        die;
    }

    $element = CIBlockElement::GetList(array(), array('ID' => $ElementID, 'ACTIVE' => 'Y'))->Fetch();

    if(!$element){
        die;
    }

    if (count($addedInBasketIds) < 3 && \Bitrix\Main\Loader::includeModule('sale')) {
        $db = \Bitrix\Sale\Product2ProductTable::getList(array(
            'filter' => array(
                'PRODUCT_ID' => $ElementID,
            ),
            'runtime' => array(
                new \Bitrix\Main\Entity\ExpressionField('ELEMENT_ID',
                    'IF(PRODUCT_ID != ' . $ElementID . ', PRODUCT_ID, PARENT_PRODUCT_ID)'),
                new \Bitrix\Main\Entity\ExpressionField('SUM_CNT', 'SUM(CNT)')
            ),
            'select' => array(
                'ELEMENT_ID',
                'SUM_CNT'
            ),
            'group' => array('ELEMENT_ID'),
            'order' => array(
                'SUM_CNT' => 'DESC'
            ),
        ));
        while ($item = $db->fetch()) {
            $addedInBasketIds[] = $item["ELEMENT_ID"];
        }
        $db = CIBlockElement::GetList(
            array(),
            array(
                "ACTIVE" => "Y",
                "IBLOCK_TYPE" => $element["IBLOCK_TYPE"],
                "IBLOCK_ID" => $element["IBLOCK_ID"],
                'PROPERTY_PUBLIKATSIYA__VALUE' => 'Да',
                'ID' => $addedInBasketIds
            ),
            false,
            false,
            array('ID')
        );
        $addedInBasketIdsHave = array();
        while ($el = $db->Fetch()) {
            $addedInBasketIdsHave[] = $el['ID'];
        }
        $addedInBasketIds = array_intersect($addedInBasketIds, $addedInBasketIdsHave);
    }
    if (count($addedInBasketIds) < 3 && \Bitrix\Main\Loader::includeModule('iblock')) {
        $db = CIBlockElement::GetList(
            array(),
            array(
                "ACTIVE" => "Y",
                "IBLOCK_TYPE" => $element["IBLOCK_TYPE"],
                "IBLOCK_ID" => $element["IBLOCK_ID"],
                'PROPERTY_PUBLIKATSIYA__VALUE' => 'Да',
                'PROPERTY_AKTSIYA__VALUE' => 'Да'
            ),
            false,
            false,
            array('ID')
        );
        while ($el = $db->Fetch()) {
            if(!in_array($el['ID'], $addedInBasketIds)) {
                $addedInBasketIds[] = $el['ID'];
            }
        }
    }

    if (empty($addedInBasketIds)) {
        die;
    }
    $addedInBasketIds = array_slice($addedInBasketIds, 0, 3);
    ?>
    <div class="h3 pbx mtl">С этим товаром покупают</div>
    <?
    $GLOBALS['ADDED_IN_BASKET'] = array('ID' => $addedInBasketIds);
    $APPLICATION->IncludeComponent(
        "intervolga.custom:catalog.section",
        "catalog-tile",
        array(
            "IBLOCK_TYPE" => $element["IBLOCK_TYPE"],
            "IBLOCK_ID" => $element["IBLOCK_ID"],
            "ELEMENT_SORT_FIELD" => $arParams["ELEMENT_SORT_FIELD"],
            "ELEMENT_SORT_ORDER" => $arParams["ELEMENT_SORT_ORDER"],
            "ELEMENT_SORT_FIELD2" => $arParams["ELEMENT_SORT_FIELD2"],
            "ELEMENT_SORT_ORDER2" => $arParams["ELEMENT_SORT_ORDER2"],
            "PROPERTY_CODE" => $arParams["LIST_PROPERTY_CODE"],
            "META_KEYWORDS" => $arParams["LIST_META_KEYWORDS"],
            "META_DESCRIPTION" => $arParams["LIST_META_DESCRIPTION"],
            "BROWSER_TITLE" => $arParams["LIST_BROWSER_TITLE"],
            "SET_LAST_MODIFIED" => $arParams["SET_LAST_MODIFIED"],
            "INCLUDE_SUBSECTIONS" => 'Y',
            "BASKET_URL" => $arParams["BASKET_URL"],
            "ACTION_VARIABLE" => $arParams["ACTION_VARIABLE"],
            "PRODUCT_ID_VARIABLE" => $arParams["PRODUCT_ID_VARIABLE"],
            "SECTION_ID_VARIABLE" => $arParams["SECTION_ID_VARIABLE"],
            "PRODUCT_QUANTITY_VARIABLE" => $arParams["PRODUCT_QUANTITY_VARIABLE"],
            "PRODUCT_PROPS_VARIABLE" => $arParams["PRODUCT_PROPS_VARIABLE"],
            "FILTER_NAME" => 'ADDED_IN_BASKET',
            "CACHE_TYPE" => $arParams["CACHE_TYPE"],
            "CACHE_TIME" => $arParams["CACHE_TIME"],
            "CACHE_FILTER" => $arParams["CACHE_FILTER"],
            "CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
            "SET_TITLE" => $arParams["SET_TITLE"],
            "MESSAGE_404" => $arParams["MESSAGE_404"],
            "SET_STATUS_404" => $arParams["SET_STATUS_404"],
            "SHOW_404" => $arParams["SHOW_404"],
            "FILE_404" => $arParams["FILE_404"],
            "DISPLAY_COMPARE" => $arParams["USE_COMPARE"],
            "PAGE_ELEMENT_COUNT" => 3,
            "LINE_ELEMENT_COUNT" => $arParams["LINE_ELEMENT_COUNT"],
            "PRICE_CODE" => $arParams["PRICE_CODE"],
            "USE_PRICE_COUNT" => $arParams["USE_PRICE_COUNT"],
            "SHOW_PRICE_COUNT" => $arParams["SHOW_PRICE_COUNT"],

            "PRICE_VAT_INCLUDE" => $arParams["PRICE_VAT_INCLUDE"],
            "USE_PRODUCT_QUANTITY" => $arParams['USE_PRODUCT_QUANTITY'],
            "ADD_PROPERTIES_TO_BASKET" => (isset($arParams["ADD_PROPERTIES_TO_BASKET"])
                ? $arParams["ADD_PROPERTIES_TO_BASKET"] : ''),
            "PARTIAL_PRODUCT_PROPERTIES" => (isset($arParams["PARTIAL_PRODUCT_PROPERTIES"])
                ? $arParams["PARTIAL_PRODUCT_PROPERTIES"] : ''),
            "PRODUCT_PROPERTIES" => $arParams["PRODUCT_PROPERTIES"],

            "DISPLAY_TOP_PAGER" => 'N',
            "DISPLAY_BOTTOM_PAGER" => 'N',
            "PAGER_TITLE" => $arParams["PAGER_TITLE"],
            "PAGER_SHOW_ALWAYS" => $arParams["PAGER_SHOW_ALWAYS"],
            "PAGER_TEMPLATE_BEFORE" => $arParams["PAGER_TEMPLATE_BEFORE"] ?: $arParams["PAGER_TEMPLATE"],
            "PAGER_TEMPLATE_AFTER" => $arParams["PAGER_TEMPLATE_AFTER"] ?: $arParams["PAGER_TEMPLATE"],
            "PAGER_DESC_NUMBERING" => $arParams["PAGER_DESC_NUMBERING"],
            "PAGER_DESC_NUMBERING_CACHE_TIME" => $arParams["PAGER_DESC_NUMBERING_CACHE_TIME"],
            "PAGER_SHOW_ALL" => $arParams["PAGER_SHOW_ALL"],
            "PAGER_BASE_LINK_ENABLE" => $arParams["PAGER_BASE_LINK_ENABLE"],
            "PAGER_BASE_LINK" => $arParams["PAGER_BASE_LINK"],
            "PAGER_PARAMS_NAME" => $arParams["PAGER_PARAMS_NAME"],

            "OFFERS_CART_PROPERTIES" => $arParams["OFFERS_CART_PROPERTIES"],
            "OFFERS_FIELD_CODE" => $arParams["LIST_OFFERS_FIELD_CODE"],
            "OFFERS_PROPERTY_CODE" => $arParams["LIST_OFFERS_PROPERTY_CODE"],
            "OFFERS_SORT_FIELD" => $arParams["OFFERS_SORT_FIELD"],
            "OFFERS_SORT_ORDER" => $arParams["OFFERS_SORT_ORDER"],
            "OFFERS_SORT_FIELD2" => $arParams["OFFERS_SORT_FIELD2"],
            "OFFERS_SORT_ORDER2" => $arParams["OFFERS_SORT_ORDER2"],
            "OFFERS_LIMIT" => $arParams["LIST_OFFERS_LIMIT"],

            //"SECTION_ID" => $arResult["VARIABLES"]["SECTION_ID"],
            //"SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
            "SECTION_URL" => $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["section"],
            "DETAIL_URL" => $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["element"],
            "USE_MAIN_ELEMENT_SECTION" => $arParams["USE_MAIN_ELEMENT_SECTION"],
            'CONVERT_CURRENCY' => $arParams['CONVERT_CURRENCY'],
            'CURRENCY_ID' => $arParams['CURRENCY_ID'],
            'HIDE_NOT_AVAILABLE' => $arParams["HIDE_NOT_AVAILABLE"],

            'LABEL_PROP' => $arParams['LABEL_PROP'],
            'ADD_PICT_PROP' => $arParams['ADD_PICT_PROP'],
            'PRODUCT_DISPLAY_MODE' => $arParams['PRODUCT_DISPLAY_MODE'],

            'OFFER_ADD_PICT_PROP' => $arParams['OFFER_ADD_PICT_PROP'],
            'OFFER_TREE_PROPS' => $arParams['OFFER_TREE_PROPS'],
            'PRODUCT_SUBSCRIPTION' => $arParams['PRODUCT_SUBSCRIPTION'],
            'SHOW_DISCOUNT_PERCENT' => $arParams['SHOW_DISCOUNT_PERCENT'],
            'SHOW_OLD_PRICE' => $arParams['SHOW_OLD_PRICE'],
            'MESS_BTN_BUY' => $arParams['MESS_BTN_BUY'],
            'MESS_BTN_ADD_TO_BASKET' => $arParams['MESS_BTN_ADD_TO_BASKET'],
            'MESS_BTN_SUBSCRIBE' => $arParams['MESS_BTN_SUBSCRIBE'],
            'MESS_BTN_DETAIL' => $arParams['MESS_BTN_DETAIL'],
            'MESS_NOT_AVAILABLE' => $arParams['MESS_NOT_AVAILABLE'],

            'TEMPLATE_THEME' => (isset($arParams['TEMPLATE_THEME']) ? $arParams['TEMPLATE_THEME'] : ''),
            "ADD_SECTIONS_CHAIN" => "Y",
            'ADD_TO_BASKET_ACTION' => $basketAction,
            'SHOW_CLOSE_POPUP' => isset($arParams['COMMON_SHOW_CLOSE_POPUP'])
                ? $arParams['COMMON_SHOW_CLOSE_POPUP']
                : '',
            'COMPARE_PATH' => $arResult['FOLDER'] . $arResult['URL_TEMPLATES']['compare'],
            'BACKGROUND_IMAGE' => (isset($arParams['SECTION_BACKGROUND_IMAGE'])
                ? $arParams['SECTION_BACKGROUND_IMAGE']
                : ''),
            'DISABLE_INIT_JS_IN_COMPONENT' => (isset($arParams['DISABLE_INIT_JS_IN_COMPONENT'])
                ? $arParams['DISABLE_INIT_JS_IN_COMPONENT'] : ''),

            'FILT_ELEMENT_CSS_CLASS_IN_ROW' => 'col-lg-4 col-md-6',
            'FILT_ELEMENT_CSS_CLASS' => 'card-product_no-shadow',
            'FILT_VIEW_FEATURES' => 'N',
            'FILT_NO_WRAP' => $_POST['ajax'],
            'AJAX_ACTION' => $_POST['action'],
            "VIEW_LABEL_COUNT" => 1,
            "VIEW_LABEL" => array(
                'ACTION',
                "AVAILABILITY"
            ),

            'SHOW_ALL_WO_SECTION' => 'Y',
            'BY_LINK' => 'Y',

            'TEMPLATE_MAX_COUNT_IN_NORMAL_NUMBER' => 5,
            'ORDER_BY_FILTER_ID' => 'Y'
        ),
        $component
    );
    die;
}