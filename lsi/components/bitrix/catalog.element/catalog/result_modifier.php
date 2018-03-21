<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

use Bitrix\Main\Config\Option;
use Intervolga\Custom\SiteTools;

\Bitrix\Main\Loader::includeModule('sale');

$arResult['CAN_BUY_BRAND'] = true;
if ($arResult['PROPERTIES']['BREND_']['VALUE_XML_ID']) {
	$arResult['CAN_BUY_BRAND'] = SiteTools::isBrandCanBuy($arResult['PROPERTIES']['BREND_']['VALUE_XML_ID']);
	$arResult['CAN_BUY_BRAND_TOOLTIP'] = SiteTools::makeBrandTooltip();
}

$arWaterMark = array(
    array(
        "name" => "watermark",
        "position" => "center",
        "type" => "image",
        "file" => $_SERVER["DOCUMENT_ROOT"] . "/local/templates/main/images/empty.png",
    )
);
$arResult['SLIDER'] = array();
if (is_array($arResult["DETAIL_PICTURE"])) {

    $arResult['SLIDER'][] = array(
        'REAL' => CFile::ResizeImageGet(
            $arResult["DETAIL_PICTURE"],
            array(
                'height' => $arResult["DETAIL_PICTURE"]["HEIGHT"],
                'width' => $arResult["DETAIL_PICTURE"]["WIDTH"]
            ),
            BX_RESIZE_IMAGE_PROPORTIONAL,
            true,
            $arWaterMark
        ),
        'BIG' => ResizeImageGetIV(
            $arResult["DETAIL_PICTURE"], array('height' => 380, 'width' => 476), BX_RESIZE_IMAGE_PROPORTIONAL
        ),
        'SMALL' => ResizeImageGetIV(
            $arResult["DETAIL_PICTURE"], array('height' => 82, 'width' => 82), BX_RESIZE_IMAGE_EXACT
        ),
        'TITLE' => $arResult["DETAIL_PICTURE"]["TITLE"],
        'ALT' => $arResult["DETAIL_PICTURE"]["ALT"]
    );
}
$arResult['CERTIFICATES'] = array();
if (is_array($arResult['PROPERTIES']['MORE_PHOTO']['VALUE'])) {
    foreach ($arResult['PROPERTIES']['MORE_PHOTO']['VALUE'] as $val) {
        $file = CFile::GetFileArray($val);

        if (preg_match('/.*(сертификат).*/iu', $file['ORIGINAL_NAME'])
            || preg_match('/.*(сертификат).*/iu', $file['DESCRIPTION'])
        ) {
            $arResult['CERTIFICATES'][] = array(
                'REAL' => $file,
                'SMALL' => ResizeImageGetIV($file, array('width' => 200), BX_RESIZE_IMAGE_PROPORTIONAL),
                'TITLE' => "Сертификат: " . $arResult["DETAIL_PICTURE"]["TITLE"],
                'ALT' => "Сертификат: " . $arResult["DETAIL_PICTURE"]["ALT"]
            );
        } else {
            $arResult['SLIDER'][] = array(
                'REAL' => ResizeImageGetIV(
                    $file,
                    array('height' => $file["HEIGHT"], 'width' => $file["WIDTH"]),
                    BX_RESIZE_IMAGE_PROPORTIONAL,
                    true,
                    $arWaterMark
                ),
                'BIG' => ResizeImageGetIV($file, array('height' => 380, 'width' => 476), BX_RESIZE_IMAGE_PROPORTIONAL),
                'SMALL' => ResizeImageGetIV($file, array('height' => 82, 'width' => 82), BX_RESIZE_IMAGE_EXACT),
                'TITLE' => $arResult["DETAIL_PICTURE"]["TITLE"],
                'ALT' => $arResult["DETAIL_PICTURE"]["ALT"]
            );
        }
    }
}

if ($arResult['PROPERTIES']['SSYLKA_']["VALUE"]) {
    $code = \Intervolga\Common\Iblock\YoutubeVideo::GetYouTubeCode($arResult['PROPERTIES']['SSYLKA_']["VALUE"]);
    $cover = null;
    if ($arResult['PROPERTIES']['YOUTUBE_COVER']["VALUE"]) {
        $cover = CFile::GetFileArray($arResult['PROPERTIES']['YOUTUBE_COVER']["VALUE"]);
        if (!$cover || $cover["DESCRIPTION"] != $code) {
            CFile::Delete($arResult['PROPERTIES']['YOUTUBE_COVER']["VALUE"]);
            $cover = null;
        }
    }
    if (!$cover) {
        $cover = \Intervolga\Common\Iblock\YoutubeVideo::DownloadYouTubePreviewImage($code);
        CIBlockElement::SetPropertyValueCode(
            $arResult['ID'],
            'YOUTUBE_COVER',
            $cover
        );
        $cover = CFile::GetFileArray($cover);
    }
    if ($cover) {
        $arResult['SLIDER'][] = array(
            'VIDEO' => array(
                'CODE' => $code,
                'EMBED_URL' => \Intervolga\Common\Iblock\YoutubeVideo::GetEmbedUrl($code)
            ),
            'REAL' => ResizeImageGetIV(
                $cover,
                array('height' => $file["HEIGHT"], 'width' => $file["WIDTH"]),
                BX_RESIZE_IMAGE_PROPORTIONAL,
                true,
                $arWaterMark
            ),
            'BIG' => ResizeImageGetIV($cover, array('height' => 380, 'width' => 476), BX_RESIZE_IMAGE_PROPORTIONAL),
            'SMALL' => ResizeImageGetIV($cover, array('height' => 82, 'width' => 82), BX_RESIZE_IMAGE_EXACT)
        );
    }
}

$arResult['INSTRUCTIONS'] = array();
if (is_array($arResult['PROPERTIES']['FILES']['VALUE'])) {
    foreach ($arResult['PROPERTIES']['FILES']['VALUE'] as $val) {
        $arResult['INSTRUCTIONS'][] = CFile::GetFileArray($val);
    }
}

$arResult['CURRENT_PRICE'] = \Intervolga\Custom\Product::getPrice($arResult["ID"], true);
if (in_array(USER_GROUP_ID_RETAIL, $GLOBALS['USER']->GetUserGroupArray())) {
    $arResult['CAN_BUY'] = false;
}

if (is_array($arResult["DETAIL_PICTURE"])) {
    $arResult['DETAIL_PICTURE_BUY'] = ResizeImageGetIV(
        $arResult["DETAIL_PICTURE"], array('height' => 185), BX_RESIZE_IMAGE_PROPORTIONAL
    );
}

$arResult['STORE'] = \Intervolga\Custom\Product::getStores($arResult['ID']);

$arResult['COUNT_IN_STORE'] = 0;
foreach ($arResult['STORE'] as $item) {
    $arResult['COUNT_IN_STORE'] += $item['COUNT'];
}

//$propIds = array_keys(CIBlockSectionPropertyLink::GetArray($arParams['IBLOCK_ID'], $arResult['IBLOCK_SECTION_ID']));
$showProperties = array();
foreach ($arResult['PROPERTIES'] as $code => $item) {
    if (in_array($code, \Intervolga\Custom\Product::getMarkerPropCodes())) {
        continue;
    }
    if (/*in_array($item['ID'], $propIds) && */
    $item['VALUE']
    ) {
        if (preg_match('/^\s*(.+?)\s*(\{\s*(.*?)\s*\})?\s*$/iu', $item['NAME'], $matches)) {
            $groupId = $arResult['PARAMETER_IN_GROUP'][$item['ID']] ?: '~~~';
            $propDesc = \Intervolga\Custom\Product::getPropertyDescription($item['ID'], $arResult['SECTION']['ID']);
            $showProperties[$item['XML_ID']] = array(
                'NAME' => $matches[1],
                'VALUE' => is_array($item['VALUE']) ? implode(', ', $item['VALUE']) : $item['VALUE'],
                'MEASURE' => $matches[3] ?: $propDesc['UNIT'],
                'HINT' => $propDesc['HINT']
            );
        }
    }
}

$arResult['PARAMETERS_GROUPS'] = \Intervolga\Custom\Product::getParametersGroups('ID', $arResult['XML_ID']);

foreach ($arResult['PARAMETERS_GROUPS'] as $group) {
    if ($group["NEPOKAZYVAT"] == "1") {
        continue;
    }

    $props = array();

    foreach ($group['PARAMETERS'] as $parameter) {
        if ($showProperties[$parameter["PROP_XML_ID"]]) {
            $showProperties[$parameter["PROP_XML_ID"]]['DIRECTORY'] = $parameter;
            $props[] = $showProperties[$parameter["PROP_XML_ID"]];
            unset($showProperties[$parameter["PROP_XML_ID"]]);
        }
    }

    if (!empty($props)) {
        $arResult['SHOW_PROPERTIES'][] = $group['NAME'];
        $arResult['SHOW_PROPERTIES'] = array_merge($arResult['SHOW_PROPERTIES'], $props);
    }
}

/*
if(!empty($showProperties)){
	$arResult['SHOW_PROPERTIES'][] = "Другие характеристики";
	$arResult['SHOW_PROPERTIES'] = array_merge($arResult['SHOW_PROPERTIES'], array_values($showProperties));
}
*/

/*$arResult['SHOW_PROPERTIES'] = array();

if(!empty($showProperties['~~~'])){
	$arResult['SHOW_PROPERTIES'] = array_merge($arResult['SHOW_PROPERTIES'], $showProperties['~~~']);
}

$arResult['PARAMETERS_GROUPS'] = \Intervolga\Custom\Product::getParametersGroups();
foreach ($arResult['PARAMETERS_GROUPS'] as $key => $group){
	if(!empty($showProperties[$key])){
		$arResult['SHOW_PROPERTIES'][] = $group['NAME'];
		$arResult['SHOW_PROPERTIES'] = array_merge($arResult['SHOW_PROPERTIES'], $showProperties[$key]);
	}
}*/

$arResult['LABELS'] = array(
    'SEASON' => array(
        'VIEW' => $arResult['PROPERTIES']['TOVAR_SEZONA_']['VALUE_XML_ID'] == 'true',
        'NAME' => 'Товар сезона',
        'TYPE' => 'season'
    ),
    'ACTION' => array(
        'VIEW' => $arResult['PROPERTIES']['AKTSIYA_']['VALUE_XML_ID'] == 'true',
        'NAME' => 'Акция',
        'TYPE' => 'action'
    ),
    'SALE' => array(
        'VIEW' => $arResult['PROPERTIES']['RASPRODAZHA_']['VALUE_XML_ID'] == 'true',
        'NAME' => 'Распродажа',
        'TYPE' => 'sale'
    ),
    'NEW' => array(
        'VIEW' => $arResult['PROPERTIES']['NOVINKA_']['VALUE_XML_ID'] == 'true',
        'NAME' => 'Новинка',
        'TYPE' => 'new'
    ),
    'OUR_CHOICE' => array(
        'VIEW' => $arResult['PROPERTIES']['NASH_VYBOR_']['VALUE_XML_ID'] == 'true',
        'NAME' => 'Наш выбор',
        'TYPE' => 'our-choice'
    ),
	'HIT' => array(
        'VIEW' => $arResult['PROPERTIES']['KHIT_PRODAZH_']['VALUE_XML_ID'] == 'true',
        'NAME' => 'Хит продаж',
        'TYPE' => 'hit'
    ),
    'GUARANTEE' => array(
        'VIEW' => false,
        'NAME' => 'Гарантия ' + ' год',
        'TYPE' => 'guarantee'
    )
);

$arResult['RATE'] = \Intervolga\Custom\Product::getRate($arResult['ID']);

$arResult['DELIVERY_PRICE'] = \Intervolga\Custom\Product::calcPriceDeliveryFor($arResult['ID']);
if ($arResult['DELIVERY_PRICE'] == 0) {
    $arResult['DELIVERY_PRICE'] = 'бесплатно';
} elseif ($arResult['DELIVERY_PRICE'] > 0) {
    $arResult['DELIVERY_PRICE'] = \CCurrencyLang::CurrencyFormat(
        $arResult['DELIVERY_PRICE'],
        $arResult["CONVERT_CURRENCY"]["CURRENCY_ID"],
        true
    );
} else {
    $arResult['DELIVERY_PRICE'] = 'уточняйте у менеджеров';
}

$arResult['PAYMENT_VARIANT'] = array();
$hlblock = \Bitrix\Highloadblock\HighloadBlockTable::getById(HLBLOCK_ID_PAYMENT_VARIANT)->fetch();
$entity = \Bitrix\Highloadblock\HighloadBlockTable::compileEntity($hlblock);
$entityClass = $entity->getDataClass();
$db = $entityClass::getList();
while ($el = $db->Fetch()) {
    $el['UF_CITY'] = explode(';', $el['UF_CITY']);
    if (
    (!in_array('all', $el['UF_CITY']) && !in_array(\Intervolga\Custom\City::getCurrentID(), $el['UF_CITY']))
    || (!$arResult['CAN_BUY_BRAND'] && $el['UF_BRAND_CAN_BUY'])) {
        continue;
    }
    $arResult['PAYMENT_VARIANT'][] = $el;
}

$arResult['DELIVERY_TO_REGION'] = array();
$hlblock = \Bitrix\Highloadblock\HighloadBlockTable::getById(HLBLOCK_ID_DELIVERY_TO_REGION)->fetch();
$entity = \Bitrix\Highloadblock\HighloadBlockTable::compileEntity($hlblock);
$entityClass = $entity->getDataClass();
$db = $entityClass::getList();
while ($el = $db->Fetch()) {
    $arResult['DELIVERY_TO_REGION'][] = $el;
}

$db_res = CPrice::GetList(
    array(),
    array(
        "PRODUCT_ID" => $arResult['ID'],
        "CATALOG_GROUP_ID" => PRICE_TYPE_OLD
    )
);
if ($ar_res = $db_res->Fetch()) {
    if (floatval($ar_res['PRICE']) > floatval($arResult['MIN_PRICE']['VALUE'])) {
        $arResult['MIN_PRICE']['VALUE'] = $ar_res['PRICE'];
    }
}

$arResult['MIN_PRICE']['PRINT_VALUE'] = \CCurrencyLang::CurrencyFormat(
    round($arResult['MIN_PRICE']['VALUE']),
    $arResult['MIN_PRICE']["CURRENCY"],
    true
);
$arResult['MIN_PRICE']['PRINT_DISCOUNT_VALUE'] = \CCurrencyLang::CurrencyFormat(
    round($arResult['MIN_PRICE']['DISCOUNT_VALUE']),
    $arResult['MIN_PRICE']["CURRENCY"],
    true
);

$arResult['SERVICE_CENTERS'] = array();
if ($arResult['PROPERTIES']['BREND_']['VALUE_ENUM']) {
    if ($brand = CIBlockElement::GetList(array(), array('XML_ID' => $arResult['PROPERTIES']['BREND_']['VALUE_XML_ID'], 'IBLOCK_ID' => IBLOCK_ID_BRAND))->GetNext()) {
        $db = CIBlockElement::GetList(
            array(),
            array(
                'IBLOCK_ID' => IBLOCK_ID_SERVICE_CENTER,
                'PROPERTY_BRANDS' => $brand['ID'],
                "PROPERTY_CITY" => \Intervolga\Custom\City::getCurrentXmlID()
            )
        );
        while ($el = $db->GetNextElement()) {
            $center = $el->GetFields();
            $center['PROPERTIES'] = $el->GetProperties();
            $arResult['SERVICE_CENTERS'][] = $center;
        }
    }
}

global $CACHE_MANAGER;
$CACHE_MANAGER->RegisterTag("hlblock_id_" . HLBLOCK_ID_REVIEW);

if (\Bitrix\Main\Loader::includeModule('sale')) {
    $arResult['HAVE_BUYWITH'] = \Bitrix\Sale\Product2ProductTable::getCount(array('PRODUCT_ID' => $arResult['ID'])) > 0;
}

$PAGE_TITLE = $arResult["META_TAGS"]["TITLE"];
$META_TITLE = $arResult["META_TAGS"]["BROWSER_TITLE"];

foreach ($arParams['SUB_PAGES'] as $code => $page) {

    $baseProps = array(
        'SUB_PAGE_TITLE' => $arResult["META_TAGS"]["TITLE"],
        'SUB_META_TITLE' => $arResult["META_TAGS"]["BROWSER_TITLE"],
        'SUB_META_DESCRIPTION' => $arResult["META_TAGS"]["DESCRIPTION"],
        'SUB_META_KEYWORDS' => $arResult["META_TAGS"]["KEYWORDS"]
    );
    $seoProps = \Intervolga\Custom\SiteTools::prepareSeoProps($arResult["ID"], $code, $baseProps);
    $arParams['SUB_PAGES'][$code]['TITLE'] = $seoProps['SUB_PAGE_TITLE'];
    $arParams['SUB_PAGES'][$code]['BROWSER_TITLE'] = $seoProps['SUB_META_TITLE'];
}

$this->__component->SetResultCacheKeys(array('MIN_PRICE', 'DETAIL_PICTURE_BUY', 'RATE'));