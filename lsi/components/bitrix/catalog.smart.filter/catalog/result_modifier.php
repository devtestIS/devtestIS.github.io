<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}
use Bitrix\Main\Localization\Loc;
Loc::loadMessages(__FILE__);

// Скрыть свойство ID
foreach ($arResult["ITEMS"] as $i => $item) {
    if ($item["PRICE"] && $item["ID"] && is_array($arParams['APPROVED_PROPERTIES']) && !in_array($item['CODE'],
            'PRICE')
    ) {
        unset($arResult["ITEMS"][$i]);
        continue;
    } elseif (is_array($arParams['APPROVED_PROPERTIES']) && !in_array($item['CODE'],
            $arParams['APPROVED_PROPERTIES'])
    ) {
        unset($arResult["ITEMS"][$i]);
        continue;
    }

    if ($arParams["IN_SEARCH"] == "Y") {

    }
    if ($item["CODE"] == "SECTION") {
        if ($arParams["IN_SEARCH"] == "Y") {
            $arResult["ITEMS"][$i]["NAME"] = Loc::getMessage("INTERVOLGA_CUSTOM.CATEGORIES");
        } else {
            unset($arResult["ITEMS"][$i]);
            continue;
        }
    } elseif ($item["CODE"] == "ID") {
        unset($arResult["ITEMS"][$i]);
        continue;
    } else {
        if ($arParams["IN_SEARCH"] == "Y" && $item["CODE"] != "BREND_" && !$item["PRICE"]) {
            unset($arResult["ITEMS"][$i]);
            continue;
        }
        \Bitrix\Main\Type\Collection::sortByColumn($item["VALUES"], "VALUE");
        $arResult["ITEMS"][$i]["VALUES"] = $item["VALUES"];
    }
}

foreach ($arResult["ITEMS"] as $i => $item) {
    if ($item["CODE"] != "SECTION") {
        $arResult["ITEMS"][$i]['EXT_DESC'] = \Intervolga\Custom\Product::getPropertyDescription($i, $arResult["SECTION"]['ID']);
    }
    if ($item["VALUES"]) {

        foreach ($item["VALUES"] as $v => $value) {
            if ($arParams["HIDE_UNUSED"] == "Y" && $value["DISABLED"]) {
                unset($arResult["ITEMS"][$i]["VALUES"][$v]);
            } elseif ($arParams["SMART_FILTER_HIDE_ZIRO"] == "Y" && isset($value["ELEMENT_COUNT"]) && intval($value["ELEMENT_COUNT"]) <= 0) {
                unset($arResult["ITEMS"][$i]["VALUES"][$v]);
            }
        }

        uasort(
            $arResult["ITEMS"][$i]["VALUES"],
            function ($a, $b) {
                if ($a['ELEMENT_COUNT'] == $b['ELEMENT_COUNT']) {
                    return 0;
                }

                return ($a['ELEMENT_COUNT'] > $b['ELEMENT_COUNT']) ? -1 : 1;
            }
        );
    }
}
if ($arParams["PRICE_RANGES"]) {
    foreach ($arResult["ITEMS"] as $i => $item) {
        if ($item["PRICE"] && $item["ID"]) {
            if ($priceRange = $arParams["PRICE_RANGES"][$item["ID"]]) {
                $arResult["ITEMS"][$i]["VALUES"]["MAX"]["VALUE"] = $priceRange["MAX"];
                $arResult["ITEMS"][$i]["VALUES"]["MIN"]["VALUE"] = $priceRange["MIN"];
            }
        }
    }
}

$cp = $this->__component;

function parseFilter($by)
{
    // Разделить фильтруемое поле на компоненты: оператор сравнения, вид поля (свойство, цена), ID.
    // Просто "поля" элемента инфоблока не поддерживаются.
    $matches = array();
    preg_match('/^([^a-zA-Z0-9]*)([a-zA-Z_]+)_([0-9]+)$/i', $by, $matches);
    $operator = $matches[1];
    $type = $matches[2];
    $id = $matches[3];
    return array($operator, $type, $id);
}

function fixClearUrl($deleteUrl)
{
    return str_replace('filter/clear/apply/', '', $deleteUrl);
}

// Цены.
$arPrices = array();
foreach ($arResult['ITEMS'] as $arItem) {
    if ($arItem['PRICE']) {
        $arPrices[$arItem['ID']] = array(
            'NAME' => $arItem['NAME'],
            'CODE' => $arItem['CODE']
        );
    }
}

// Сводка по примененным фильтрам со ссылками на удаление отдельных условий фильтра.

// Копипаст из компонента. Чтобы сделать ЧПУ фильтра для удаления условий.
$obIblockSection = new CIBlockSection();
$sectionList = $obIblockSection->GetList(array(), array(
    "=ID" => $cp->SECTION_ID,
    "IBLOCK_ID" => $cp->IBLOCK_ID,
), false, array("ID", "IBLOCK_ID", "SECTION_PAGE_URL"));
$sectionList->SetUrlTemplates($arParams["SEF_RULE"]);
$section = $sectionList->GetNext();

$arAppliedFilters = array();
foreach ($GLOBALS[$arParams['FILTER_NAME']] as $by => $arCondition) {
    list($operator, $type, $id) = parseFilter($by);

    $operatorLiteral = null;

    // Название поля.
    if ($type == 'PROPERTY') {
        $name = $arResult['ITEMS'][$id]['NAME'];
    } elseif ($type == 'CATALOG_PRICE') {
        $name = $arPrices[$id]['NAME']; // В малом бизнесе только одна цена.
    } else {
        $name = null;
    }

    $arOriginalItems = $arResult['ITEMS'];

    // Отображаемое условие.
    $arDisplayCondition = array();
    switch ($operator) {

        case '=':
            foreach ($arCondition as $condition) {
                unset($arResult['ITEMS'][$id]['VALUES'][$condition]);

                $deleteUrl = $cp->makeSmartUrl($section["DETAIL_PAGE_URL"], true);
                $deleteUrl = fixClearUrl($deleteUrl);

                $arDisplayCondition[] = array(
                    'VALUE' => $condition,
                    'DELETE_URL' => $deleteUrl
                );
                $arResult['ITEMS'] = $arOriginalItems;
            }
            break;

        case '>':
        case '>=':
            $operatorLiteral = 'От';
        case '<':
        case '<=':
            if ($operatorLiteral == null) {
                $operatorLiteral = 'До';
            }
            // $arCondition здесь строка.
            $condition = $arCondition;
            if ($type == 'CATALOG_PRICE') {
                unset($arResult['ITEMS'][$arPrices[$id]['CODE']]);
            } else {
                unset($arResult['ITEMS'][$id]);
            }
            $arDisplayCondition[] = array(
                'VALUE' => $operatorLiteral . ' ' . $condition,
                'DELETE_URL' => fixClearUrl($cp->makeSmartUrl($section["DETAIL_PAGE_URL"], true))
            );
            $arResult['ITEMS'] = $arOriginalItems;
            break;

        case '><':
            if ($type == 'CATALOG_PRICE') {
                unset($arResult['ITEMS'][$arPrices[$id]['CODE']]);
            } else {
                unset($arResult['ITEMS'][$id]);
            }
            $arDisplayCondition[] = array(
                'VALUE' => 'От ' . $arCondition[0] . ' До ' . $arCondition[1],
                'DELETE_URL' => fixClearUrl($cp->makeSmartUrl($section["DETAIL_PAGE_URL"], true))
            );
            $arResult['ITEMS'] = $arOriginalItems;
            break;
    }

    $arAppliedFilters[] = array(
        'OPERATOR' => htmlspecialcharsbx($operator),
        'TYPE' => $type,
        'ID' => $id,
        'NAME' => $name,
        'CONDITION' => $arCondition,
        'DISPLAY_CONDITION' => $arDisplayCondition,
    );
}

// Если настройки совпадают с одним из быстрых фильтров, то нужно подменить ссылку на показ элементов.

// Возможные быстрые фильтры в данной группе.
$obSection = new CIBlockSection();
$dbQuickFilters = $obIblockSection->GetList(
    array('SORT' => 'ASC'),
    array(
        'IBLOCK_ID' => $arParams['IBLOCK_ID'],
        'LEFT_MARGIN' => $arResult['SECTION']['LEFT_MARGIN'],
        'RIGHT_MARGIN' => $arResult['SECTION']['RIGHT_MARGIN'],
        '!UF_FILTER_URL' => false
    ),
    false,
    array('*', 'UF_FILTER_URL')
);
$arQuickFilters = array();
while ($arQuickFilter = $dbQuickFilters->GetNext()) {
    $arQuickFilters[$arQuickFilter['ID']] = array(
        'ID' => $arQuickFilter['ID'],
        'SECTION_ID' => $arQuickFilter['IBLOCK_SECTION_ID'],
        'FILTER_URL' => $arQuickFilter['UF_FILTER_URL'],
        'SECTION_PAGE_URL' => $arQuickFilter['SECTION_PAGE_URL'],
        'FILTER' => $cp->convertUrlToCheck(urldecode($arQuickFilter['UF_FILTER_URL']))
    );
}

// Найти совпадение текущего фильтра с одним из быстрых.
$arCurrentFilter = $cp->convertUrlToCheck(urldecode($arResult['FILTER_URL']));
$arEqualQuickFilter = null;
foreach ($arQuickFilters as $arQuickFilterData) {
    $arQuickFilter = $arQuickFilterData['FILTER'];
    $isSameSection = ($arResult["SECTION"]["ID"] == $arQuickFilterData["ID"]);
    $isChildSection = ($arResult["SECTION"]["ID"] == $arQuickFilterData["SECTION_ID"]);
    //dump(array($arCurrentFilter, $arQuickFilter, $isChildSection, $isSameSection, $arQuickFilterData));die;
    if (($arCurrentFilter == $arQuickFilter) && ($isChildSection || $isSameSection)) {
        $arEqualQuickFilter = $arQuickFilterData;
    } elseif (empty($arCurrentFilter) && $isChildSection) {
        $sec = CIBlockSection::GetList(
            array(),
            array('ID' => $arQuickFilterData['SECTION_ID']),
            false,
            array("ID","IBLOCK_ID","IBLOCK_TYPE_ID","IBLOCK_SECTION_ID","CODE","SECTION_ID","NAME","SECTION_PAGE_URL")
        )->GetNext();
        $arEqualQuickFilter = array('SECTION_PAGE_URL' => $sec['SECTION_PAGE_URL']);
    }
}

if (!empty($arEqualQuickFilter)) {
    $url = $arEqualQuickFilter['SECTION_PAGE_URL'];
    $arResult['JS_FILTER_PARAMS']['SEF_SET_FILTER_URL'] = $url;
    $arResult['FILTER_URL'] = $url;
    $arResult['FILTER_AJAX_URL'] = $url;
    $arResult['SEF_SET_FILTER_URL'] = $url;
    $arResult['FORM_ACTION'] = $url;
}

$arResult['APPLIED_FILTERS'] = $arAppliedFilters;
$cp->SetResultCacheKeys(array('APPLIED_FILTERS'));