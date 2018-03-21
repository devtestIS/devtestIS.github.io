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
/** @var CBitrixComponent $component */

$this->setFrameMode(true);

if (!$arResult["VARIABLES"]["SECTION_ID"]) {
    $sec = CIBlockSection::GetList(
        array(),
        array(
            'CODE' => $arResult["VARIABLES"]["SECTION_CODE"]
        )
    )->Fetch();
    if ($sec) {
        $arResult["VARIABLES"]["SECTION_ID"] = $sec['ID'];
    }
}

$currentSection = array(
    'ID' =>  $arResult["VARIABLES"]["SECTION_ID"],
    'CODE' => $arResult["VARIABLES"]["SECTION_CODE"]
);
if($currentSection["ID"]) {
    global $USER_FIELD_MANAGER;
    $currentSection = CIBlockSection::GetList(
        array('ELEMENT_CNT' => 'DESC'),
        array(
            'ID' => $arResult["VARIABLES"]["SECTION_ID"],
            'IBLOCK_ID' => $arParams['IBLOCK_ID']
        ),
        false,
        array('ID', 'NAME', 'IBLOCK_SECTION_ID', 'UF_FILTER_URL', 'UF_RECOMMENDATION', 'UF_COUNT_VIEWED', 'UF_ARTICLES')
    )->fetch();

    $bs = new CIBlockSection;
    $ret = $USER_FIELD_MANAGER->Update('IBLOCK_12_SECTION', $currentSection["ID"], array("UF_COUNT_VIEWED" => $currentSection['UF_COUNT_VIEWED'] + 1));
}

if (!empty($currentSection['UF_FILTER_URL'])) {
    $arResult["VARIABLES"]["SMART_FILTER_PATH"] = urldecode($currentSection['UF_FILTER_URL']);
    $arResult['VARIABLES']['SECTION_ID'] = $currentSection['IBLOCK_SECTION_ID'];
}

$currentUrl = preg_replace('/\?.*$/', '', $_SERVER['REQUEST_URI']);
$subSections = CIBlockSection::GetList(
    array('ELEMENT_CNT' => 'DESC'),
    array(
        'ACTIVE' => 'Y',
        'SECTION_ID' => $currentSection["ID"],
        'IBLOCK_ID' => $arParams['IBLOCK_ID']
    ),
    false,
    array('ID', 'NAME', 'IBLOCK_SECTION_ID', 'UF_FILTER_URL', 'SECTION_PAGE_URL')
);
while ($arSection = $subSections->GetNext()) {
    if($arSection['UF_FILTER_URL'] && ($arSection['UF_FILTER_URL'] == $currentUrl || urldecode($arSection['UF_FILTER_URL']) == $currentUrl)) {
        LocalRedirect($arSection['SECTION_PAGE_URL']);
    }
}


$firstSubSection = CIBlockSection::GetList(
    array('ELEMENT_CNT' => 'DESC'),
    array(
        'ACTIVE' => 'Y',
        'IBLOCK_ID' => $arParams['IBLOCK_ID'],
        'SECTION_ID' => $arResult["VARIABLES"]["SECTION_ID"],
        'CNT_ACTIVE' => 'Y',
        'ELEMENT_SUBSECTIONS' => 'N',
        'UF_FILTER_URL' => false
    ),
    true,
    array('ID', 'NAME', 'ELEMENT_CNT')
)->fetch();

if ($firstSubSection) {
    define('WRAP_CATALOG', 'Y');
    $APPLICATION->IncludeComponent(
        "bitrix:catalog.section.list",
        "catalog",
        array(
            "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
            "IBLOCK_ID" => $arParams["IBLOCK_ID"],
            'SECTION_CODE' => $arResult["VARIABLES"]["SECTION_CODE"],
            'SECTION_ID' => $arResult["VARIABLES"]["SECTION_ID"],
            "CACHE_TYPE" => $arParams["CACHE_TYPE"],
            "CACHE_TIME" => $arParams["CACHE_TIME"],
            "CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
            "COUNT_ELEMENTS" => $arParams["SECTION_COUNT_ELEMENTS"],
            "TOP_DEPTH" => $arParams["SECTION_TOP_DEPTH"],
            "SECTION_URL" => $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["section"],
            "VIEW_MODE" => $arParams["SECTIONS_VIEW_MODE"],
            "SHOW_PARENT_NAME" => $arParams["SECTIONS_SHOW_PARENT_NAME"],
            "HIDE_SECTION_NAME" => (isset($arParams["SECTIONS_HIDE_SECTION_NAME"])
                ? $arParams["SECTIONS_HIDE_SECTION_NAME"] : "N"),
            "ADD_SECTIONS_CHAIN" => "N"
        ),
        $component,
        array("HIDE_ICONS" => "Y")
    );
} else {
    ?>
    <div class="row">
        <div class="col-lg-3 col-md-4 col-sm-5">
            <?$APPLICATION->ShowViewContent('fast_filters');?>
            <? $APPLICATION->IncludeComponent(
                "intervolga.custom:catalog.smart.filter",
                "catalog",
                array(
                    "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
                    "IBLOCK_ID" => $arParams["IBLOCK_ID"],
                    "SECTION_ID" => $arResult["VARIABLES"]["SECTION_ID"],
                    "FILTER_NAME" => $arParams["FILTER_NAME"],
                    "PRICE_CODE" => $arParams["PRICE_CODE"],
                    "CACHE_TYPE" => $arParams["CACHE_TYPE"],
                    "CACHE_TIME" => $arParams["CACHE_TIME"],
                    "CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
                    "SAVE_IN_SESSION" => "N",
                    "FILTER_VIEW_MODE" => $arParams["FILTER_VIEW_MODE"],
                    "XML_EXPORT" => "Y",
                    "SECTION_TITLE" => "NAME",
                    "SECTION_DESCRIPTION" => "DESCRIPTION",
                    'HIDE_NOT_AVAILABLE' => $arParams["HIDE_NOT_AVAILABLE"],
                    "TEMPLATE_THEME" => $arParams["TEMPLATE_THEME"],
                    'CONVERT_CURRENCY' => $arParams['CONVERT_CURRENCY'],
                    'CURRENCY_ID' => $arParams['CURRENCY_ID'],
                    "SEF_MODE" => $arParams["SEF_MODE"],
                    "SEF_RULE" => $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["smart_filter"],
                    "SECTION_URL" => $arResult["FOLDER"] . str_replace(
                            array_map(function($el) { return "#$el#"; }, array_keys($arResult["VARIABLES"])),
                            array_values($arResult["VARIABLES"]),
                            $arResult["URL_TEMPLATES"]["section"]
                        ),
                    "SMART_FILTER_PATH" => $arResult["VARIABLES"]["SMART_FILTER_PATH"],
                    "PAGER_PARAMS_NAME" => $arParams["PAGER_PARAMS_NAME"],
                    "INSTANT_RELOAD" => $arParams["INSTANT_RELOAD"],
                    "SMART_FILTER_HIDE_ZIRO" => $arParams["SMART_FILTER_HIDE_ZIRO"],
                    "PRE_FILTER_NAME" => $arParams["PRE_FILTER_NAME"] ?: "catalogSmartFilter"
                ),
                $component,
                array('HIDE_ICONS' => 'Y')
            ); ?>
        </div>
        <div class="col-lg-9 col-md-8 col-sm-7">
            <? $resultSort = $APPLICATION->IncludeComponent(
                "intervolga.custom:catalog.sort",
                "catalog",
                array(
                    "PRICE_CODE" => $arParams["PRICE_CODE"],
                    "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
                    "IBLOCK_ID" => $arParams["IBLOCK_ID"],
                    'SECTION_CODE' => $arResult["VARIABLES"]["SECTION_CODE"],
                    'SECTION_ID' => $arResult["VARIABLES"]["SECTION_ID"],
                    'CURRENT_SECTION_ID' => $currentSection['ID']
                ),
                $component,
                array('HIDE_ICONS' => 'Y')
            ); ?>
            <? if ($_POST['ajax'] == 'Y') {
                $GLOBALS['APPLICATION']->RestartBuffer();
            } ?>
            <? $intSectionID = $APPLICATION->IncludeComponent(
                "intervolga.custom:catalog.section",
                $resultSort['VIEW_MODE'] == 'line' ? "catalog-line" : "catalog-tile",
                array(
                    "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
                    "IBLOCK_ID" => $arParams["IBLOCK_ID"],
                    "ELEMENT_SORT_FIELD2" => $resultSort['FIELD'] ?: $arParams["ELEMENT_SORT_FIELD"],
                    "ELEMENT_SORT_ORDER2" => $resultSort['DIRECTION'] ?: $arParams["ELEMENT_SORT_ORDER"],
                    "ELEMENT_SORT_FIELD" => 'PROPERTY_SNYATO_S_PROIZVODSTVA_',
                    "ELEMENT_SORT_ORDER" => 'DESC',
                    "PROPERTY_CODE" => $arParams["LIST_PROPERTY_CODE"],
                    "SET_LAST_MODIFIED" => $arParams["SET_LAST_MODIFIED"],
                    "INCLUDE_SUBSECTIONS" => $arParams["INCLUDE_SUBSECTIONS"],
                    "BASKET_URL" => $arParams["BASKET_URL"],
                    "ACTION_VARIABLE" => $arParams["ACTION_VARIABLE"],
                    "PRODUCT_ID_VARIABLE" => $arParams["PRODUCT_ID_VARIABLE"],
                    "SECTION_ID_VARIABLE" => $arParams["SECTION_ID_VARIABLE"],
                    "PRODUCT_QUANTITY_VARIABLE" => $arParams["PRODUCT_QUANTITY_VARIABLE"],
                    "PRODUCT_PROPS_VARIABLE" => $arParams["PRODUCT_PROPS_VARIABLE"],
                    "FILTER_NAME" => $arParams["FILTER_NAME"],
                    "CACHE_TYPE" => $arParams["CACHE_TYPE"],
                    "CACHE_TIME" => $arParams["CACHE_TIME"],
                    "CACHE_FILTER" => $arParams["CACHE_FILTER"],
                    "CACHE_GROUPS" => $arParams["CACHE_GROUPS"],

                    "MESSAGE_404" => $arParams["MESSAGE_404"],
                    "SET_STATUS_404" => $arParams["SET_STATUS_404"],
                    "SHOW_404" => $arParams["SHOW_404"],
                    "FILE_404" => $arParams["FILE_404"],

                    "DISPLAY_COMPARE" => $arParams["USE_COMPARE"],
                    "PAGE_ELEMENT_COUNT" => $arParams["PAGE_ELEMENT_COUNT"],
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

                    "DISPLAY_TOP_PAGER" => $arParams["DISPLAY_TOP_PAGER"],
                    "DISPLAY_BOTTOM_PAGER" => $arParams["DISPLAY_BOTTOM_PAGER"],
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

                    "SECTION_ID" => $arResult["VARIABLES"]["SECTION_ID"],
                    "SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
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
                    "ADD_SECTIONS_CHAIN" => "N",
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
                    'FILT_VIEW_FEATURES' => 'Y',
                    'FILT_NO_WRAP' => $_POST['ajax'],
                    'AJAX_ACTION' => $_POST['action'],
                    "VIEW_LABEL_COUNT" => $viewAsLine ? -1 : 1,
                    "VIEW_LABEL" => array(
                        'SEASON',
                        'ACTION',
                        'NEW',
                        'OUR_CHOICE',
                        'AVAILABILITY'
                    )
                ),
                $component
            ); ?>
            <? $GLOBALS["CATALOG_CURRENT_SECTION_ID"] = $intSectionID; ?>
            <? if ($_POST['ajax'] == 'Y') {
                die;
            } ?>
        </div>
    </div>

    <?
    $articles = false;
    if($currentSection) {
        $articles = $currentSection['UF_ARTICLES'];
    }
    if($articles) {
        $GLOBALS['filterArticlesRecommendation'] = array(
            'ID' => $articles
        );
        $APPLICATION->IncludeComponent(
            "bitrix:news.list",
            "article-in-section",
            Array(
                "ACTIVE_DATE_FORMAT" => "d.m.Y",
                "ADD_SECTIONS_CHAIN" => "N",
                "AJAX_MODE" => "N",
                "AJAX_OPTION_ADDITIONAL" => "",
                "AJAX_OPTION_HISTORY" => "N",
                "AJAX_OPTION_JUMP" => "N",
                "AJAX_OPTION_STYLE" => "N",
                "CACHE_FILTER" => "Y",
                "CACHE_GROUPS" => "Y",
                "CACHE_TIME" => "36000000",
                "CACHE_TYPE" => "A",
                "CHECK_DATES" => "Y",
                "DETAIL_URL" => "",
                "DISPLAY_BOTTOM_PAGER" => "N",
                "DISPLAY_DATE" => "Y",
                "DISPLAY_NAME" => "Y",
                "DISPLAY_PICTURE" => "Y",
                "DISPLAY_PREVIEW_TEXT" => "Y",
                "DISPLAY_TOP_PAGER" => "N",
                "FIELD_CODE" => array("NAME", "SORT", "PREVIEW_PICTURE", ""),
                "FILTER_NAME" => "filterArticlesRecommendation",
                "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                "IBLOCK_ID" => HLBLOCK_ID_ARTICLES,
                "IBLOCK_TYPE" => HLBLOCK_TYPE_CONTENT,
                "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                "INCLUDE_SUBSECTIONS" => "Y",
                "MESSAGE_404" => "",
                "NEWS_COUNT" => "99",
                "PAGER_BASE_LINK_ENABLE" => "N",
                "PAGER_DESC_NUMBERING" => "N",
                "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                "PAGER_SHOW_ALL" => "N",
                "PAGER_SHOW_ALWAYS" => "N",
                "PAGER_TEMPLATE" => ".default",
                "PAGER_TITLE" => "Новости",
                "PARENT_SECTION" => "",
                "PARENT_SECTION_CODE" => "",

                "RESIZE_TYPE" => BX_RESIZE_IMAGE_PROPORTIONAL,
                "WIDTH" => "80",
                "HEIGHT" => "100",

                "PREVIEW_TRUNCATE_LEN" => "",
                "PROPERTY_CODE" => array("SRC", ""),
                "RESIZE_PREVIEW_PICT" => "Y",
                "SET_BROWSER_TITLE" => "N",
                "SET_LAST_MODIFIED" => "N",
                "SET_META_DESCRIPTION" => "N",
                "SET_META_KEYWORDS" => "N",
                "SET_STATUS_404" => "N",
                "SET_TITLE" => "N",
                "SHOW_404" => "N",
                "SORT_BY1" => "SORT",
                "SORT_BY2" => "active_from",
                "SORT_ORDER1" => "ASC",
                "SORT_ORDER2" => "DESC"
            )
        );
    }
    ?>

    <?
    $recommendation = false;
    if($currentSection) {
        $recommendation = $currentSection['UF_RECOMMENDATION'];
    }

    if($recommendation) {
        $GLOBALS['filterSectionRecommendation'] = array(
            'ID' => $recommendation
        );
        $GLOBALS['sortSectionRecommendation'] = array(
            'sort' => 'ASC'
        );
        $this->SetViewTarget('catalogRecommendation');
        $APPLICATION->IncludeComponent(
            "intervolga.custom:catalog.section.list",
            "recommendation",
            array(
                "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
                "IBLOCK_ID" => $arParams["IBLOCK_ID"],
                "CACHE_TYPE" => $arParams["CACHE_TYPE"],
                "CACHE_TIME" => $arParams["CACHE_TIME"],
                "CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
                "COUNT_ELEMENTS" => $arParams["COUNT_ELEMENTS"],
                "TOP_DEPTH" => 0,
                "SECTION_URL" => $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["section"],
                "VIEW_MODE" => $arParams["SECTIONS_VIEW_MODE"],
                "SHOW_PARENT_NAME" => $arParams["SECTIONS_SHOW_PARENT_NAME"],
                "HIDE_SECTION_NAME" => (isset($arParams["SECTIONS_HIDE_SECTION_NAME"])
                    ? $arParams["SECTIONS_HIDE_SECTION_NAME"] : "N"),
                "ADD_SECTIONS_CHAIN" => 'N',
                "COUNT_SECTIONS" => 6,
                'FILTER_NAME' => 'filterSectionRecommendation',
                'SORT_NAME' => 'sortSectionRecommendation',
            ),
            $component
        );
        $this->EndViewTarget();
    }
}

ob_start();
$intSectionID = $APPLICATION->IncludeComponent(
    "bitrix:catalog.section",
    "catalog-clear",
    array(
        "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
        "IBLOCK_ID" => $arParams["IBLOCK_ID"],
        "ELEMENT_SORT_FIELD" => $resultSort['FIELD'] ?: $arParams["ELEMENT_SORT_FIELD"],
        "ELEMENT_SORT_ORDER" => $resultSort['DIRECTION'] ?: $arParams["ELEMENT_SORT_ORDER"],
        "ELEMENT_SORT_FIELD2" => $arParams["ELEMENT_SORT_FIELD2"],
        "ELEMENT_SORT_ORDER2" => $arParams["ELEMENT_SORT_ORDER2"],
        "PROPERTY_CODE" => $arParams["LIST_PROPERTY_CODE"],
        "META_KEYWORDS" => $arParams["LIST_META_KEYWORDS"],
        "META_DESCRIPTION" => $arParams["LIST_META_DESCRIPTION"],
        "BROWSER_TITLE" => $arParams["LIST_BROWSER_TITLE"],
        "SET_LAST_MODIFIED" => $arParams["SET_LAST_MODIFIED"],
        "INCLUDE_SUBSECTIONS" => $arParams["INCLUDE_SUBSECTIONS"],
        "BASKET_URL" => $arParams["BASKET_URL"],
        "ACTION_VARIABLE" => $arParams["ACTION_VARIABLE"],
        "PRODUCT_ID_VARIABLE" => $arParams["PRODUCT_ID_VARIABLE"],
        "SECTION_ID_VARIABLE" => $arParams["SECTION_ID_VARIABLE"],
        "PRODUCT_QUANTITY_VARIABLE" => $arParams["PRODUCT_QUANTITY_VARIABLE"],
        "PRODUCT_PROPS_VARIABLE" => $arParams["PRODUCT_PROPS_VARIABLE"],
        "FILTER_NAME" => $arParams["FILTER_NAME"],
        "CACHE_TYPE" => $arParams["CACHE_TYPE"],
        "CACHE_TIME" => $arParams["CACHE_TIME"],
        "CACHE_FILTER" => $arParams["CACHE_FILTER"],
        "CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
        "SET_TITLE" => $arParams["SET_TITLE"],

        "MESSAGE_404" => "",
        "SET_STATUS_404" => "N",
        "SHOW_404" => "N",
        "FILE_404" => "",

        "DISPLAY_COMPARE" => $arParams["USE_COMPARE"],
        "PAGE_ELEMENT_COUNT" => $arParams["PAGE_ELEMENT_COUNT"],
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

        "DISPLAY_TOP_PAGER" => $arParams["DISPLAY_TOP_PAGER"],
        "DISPLAY_BOTTOM_PAGER" => $arParams["DISPLAY_BOTTOM_PAGER"],
        "PAGER_TITLE" => $arParams["PAGER_TITLE"],
        "PAGER_SHOW_ALWAYS" => $arParams["PAGER_SHOW_ALWAYS"],
        "PAGER_TEMPLATE" => $arParams["PAGER_TEMPLATE"],
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

        "SECTION_ID" => $currentSection["ID"],
        "SECTION_CODE" => $currentSection["CODE"],
        "SECTION_URL" => $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["section"],
        "DETAIL_URL" => $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["element"],
        "USE_MAIN_ELEMENT_SECTION" => $arParams["USE_MAIN_ELEMENT_SECTION"],
        'CONVERT_CURRENCY' => $arParams['CONVERT_CURRENCY'],
        'CURRENCY_ID' => $arParams['CURRENCY_ID'],
        'HIDE_NOT_AVAILABLE' => $arParams["HIDE_NOT_AVAILABLE"],

        "ADD_SECTIONS_CHAIN" => "Y",
        "CITY" => $arParams['CITY'] ?: \Intervolga\Custom\City::getCurrentXmlID(),

        'SECTION_USER_FIELDS' => array('UF_*')
    ),
    $component,
    array("HIDE_ICONS" => "Y")
);
ob_get_clean();
?>