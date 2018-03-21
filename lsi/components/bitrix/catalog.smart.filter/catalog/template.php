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
?>
<a class="btn btn-primary visible-xs-block mbl collapsed" href="#smart-filter" data-text="<i class=&quot;fa fa-filter&quot; aria-hidden=&quot;true&quot;></i> Скрыть фильтр" data-toggle="collapse" role="button"><i class="fa fa-filter" aria-hidden="true"></i> Показать фильтр</a>
<div class="collapse collapse_smart-filter" id="smart-filter">
    <div class="smart-filter">
        <form name="<? echo $arResult["FILTER_NAME"] . "_form" ?>" action="<? echo $arResult["FILTER_URL"] ?>"
              method="get" class="smartfilter">
            <?
            foreach ($arResult["HIDDEN"] as $arItem) {
                ?>
                <input type="hidden" name="<? echo $arItem["CONTROL_NAME"] ?>" id="<? echo $arItem["CONTROL_ID"] ?>"
                       value="<? echo $arItem["HTML_VALUE"] ?>"/>
                <?
            }
            ?>
            <div class="smart-filter__title">Поиск по характеристикам</div>
            <?
            ob_start();
            foreach ($arResult["ITEMS"] as $key => $arItem) {
                if (!isset($arItem["PRICE"])) {
                    continue;
                }
                if ($arItem["VALUES"]["MIN"]["VALUE"] == $arItem["VALUES"]["MAX"]["VALUE"]) {
                    continue;
                }
                ?>
                <div class="smart-filter__block">
                    <div class="smart-filter__subtitle">Цена товара (р)</div>
                    <?
                    $isFloat = '';
                    if(abs(floor($arItem["VALUES"]["MAX"]["VALUE"]) - floor($arItem["VALUES"]["MIN"]["VALUE"])) <= 10) {
                        $isFloat = ' filter-slider_float';
                    }
                    ?>
                    <div class="filter-slider<?=$isFloat?>">
                        <div class="filter-slider__slider"></div>
                        <input class="filter-slider__input-min"
                               data-price-min="<?=$arItem["VALUES"]["MIN"]["VALUE"]?>"
                               placeholder="<?=$arItem["VALUES"]["MIN"]["HTML_VALUE"] ?: $arItem["VALUES"]["MIN"]["VALUE"]?>"
                               value="<?=$arItem["VALUES"]["MIN"]["HTML_VALUE"]?>"
                               type="text"
                               name="<?=$arItem["VALUES"]["MIN"]["CONTROL_NAME"]?>"/>
                        <div class="filter-slider__label">—</div>
                        <input class="filter-slider__input-max"
                               data-price-max="<?=$arItem["VALUES"]["MAX"]["VALUE"]?>"
                               placeholder="<?=$arItem["VALUES"]["MAX"]["HTML_VALUE"] ?: $arItem["VALUES"]["MAX"]["VALUE"]?>"
                               value="<?=$arItem["VALUES"]["MAX"]["HTML_VALUE"]?>"
                               type="text"
                               name="<?=$arItem["VALUES"]["MAX"]["CONTROL_NAME"]?>"/>
                    </div>
                </div>
                <?
            }
            $priceFilterHtml = ob_get_clean();
            if ($arParams["IN_SEARCH"] != "Y") {
                echo $priceFilterHtml;
            }
            ob_start();
            foreach ($arResult["ITEMS"] as $key => $arItem) {
                if (!in_array($arItem["CODE"], \Intervolga\Custom\Product::getMarkerPropCodes())) {
                    continue;
                }
                $name = $arItem["NAME"];
                if (preg_match('/^\s*(.+?)\s*(\{\s*(.*?)\s*\})?\s*$/', $name, $matches)) {
                    $name = $matches[1];
                }

                foreach ($arItem["VALUES"] as $val => $ar) {
                    if (strtolower($ar['VALUE']) != 'да' && $ar['VALUE'] != 'Y') {
                        continue;
                    }
                    ?>
                    <li class="ul__li">
                        <div class="checkbox checkbox_custom">
                            <label>
                                <input class="checkbox__control"
                                       type="checkbox"
                                       id="<?=$ar["CONTROL_ID"]?>"
                                       name="<?=$ar["CONTROL_NAME"]?>"
                                    <?=$ar["CHECKED"] ? 'checked="checked"' : ''?>
                                       value="<?=$ar["HTML_VALUE"]?>"/>
                                <span class="checkbox__input"></span><?=$name?>
                                <span class="checkbox__info">
                                    (<span data-role="count_<?=$ar["CONTROL_ID"]?>"><?=intval($ar["ELEMENT_COUNT"])?></span>)
                                </span>
                            </label>
                        </div>
                    </li>
                    <?
                }
            }
            $content = ob_get_clean();
            if ($content) {
                ?>
                <div class="smart-filter__block">
                    <div class="smart-filter__subtitle">Маркер</div>
                    <ul class="ul list-unstyled">
                        <?=$content?>
                    </ul>
                </div>
                <?
            }
            foreach ($arResult["ITEMS"] as $key => $arItem) {
                if (
                    empty($arItem["VALUES"])
                    || isset($arItem["PRICE"])
                    || in_array($arItem["CODE"], \Intervolga\Custom\Product::getMarkerPropCodes())
                ) {
                    continue;
                }
                if (($arItem["DISPLAY_TYPE"] == "A" || $arItem["DISPLAY_TYPE"] == "B")
                    && $arItem["VALUES"]["MIN"]["VALUE"] == $arItem["VALUES"]["MAX"]["VALUE"]) {
                    continue;
                }
                $name = $arItem["NAME"];
                $measure = '';
                if($arItem['EXT_DESC']) {
                    $name = $arItem['EXT_DESC']['NAME'];
                    $measure = $arItem['EXT_DESC']['UNIT'];
                } else {
                    if (preg_match('/^\s*(.+?)\s*(\{\s*(.*?)\s*\})?\s*$/', $name, $matches)) {
                        $name = $matches[1];
                        $measure = $matches[3];
                    }
                }
                ?>
                <div class="smart-filter__block">
                    <div class="smart-filter__subtitle">
                        <?=$name?>
                        <?
                        switch ($arItem["DISPLAY_TYPE"]) {
                            case "A"://NUMBERS_WITH_SLIDER
                            case "B"://NUMBERS
                                echo '(' . $measure . ')';
                                break;
                        }
                        ?>
                        <?
                        if ($arItem['EXT_DESC']['HINT'] || $arItem["FILTER_HINT"]) {
                            ?>
                            <div class="smart-filter__question">
                            <i class="fa-question-circle-o fa"
                               data-html="true"
                               data-toggle="popover-question"
                               data-content="<?=str_replace('"', '&quot;', $arItem['EXT_DESC']['HINT'] ?: $arItem["FILTER_HINT"])?>"></i>
                            </div><?
                        }
                        ?>
                    </div>
                    <?
                    switch ($arItem["DISPLAY_TYPE"]) {
                        case "A"://NUMBERS_WITH_SLIDER
                        case "B"://NUMBERS
                            $isFloat = '';
                            if(
                            (abs(floor($arItem["VALUES"]["MAX"]["VALUE"]) - floor($arItem["VALUES"]["MIN"]["VALUE"])) <= 10)
                            || (floatval($arItem["VALUES"]["MAX"]["VALUE"]) != intval($arItem["VALUES"]["MAX"]["VALUE"]))
                            || (floatval($arItem["VALUES"]["MIN"]["VALUE"]) != intval($arItem["VALUES"]["MIN"]["VALUE"]))
                            ) {
                                $isFloat = ' filter-slider_float';
                            }
                            ?>
                            <div class="filter-slider<?=$isFloat?>">
                                <div class="filter-slider__slider"></div>
                                <input class="filter-slider__input-min"
                                       data-price-min="<?=$arItem["VALUES"]["MIN"]["VALUE"]?>"
                                       placeholder="<?=$arItem["VALUES"]["MIN"]["HTML_VALUE"] ?: $arItem["VALUES"]["MIN"]["VALUE"]?>"
                                       value="<?=$arItem["VALUES"]["MIN"]["HTML_VALUE"]?>"
                                       type="text"
                                       name="<?=$arItem["VALUES"]["MIN"]["CONTROL_NAME"]?>"/>
                                <div class="filter-slider__label">—</div>
                                <input class="filter-slider__input-max"
                                       data-price-max="<?=$arItem["VALUES"]["MAX"]["VALUE"]?>"
                                       placeholder="<?=$arItem["VALUES"]["MAX"]["HTML_VALUE"] ?: $arItem["VALUES"]["MAX"]["VALUE"]?>"
                                       value="<?=$arItem["VALUES"]["MAX"]["HTML_VALUE"]?>"
                                       type="text"
                                       name="<?=$arItem["VALUES"]["MAX"]["CONTROL_NAME"]?>"/>
                            </div>
                            <?
                            break;
                        /*case "G"://CHECKBOXES_WITH_PICTURES
                            break;
                        case "H"://CHECKBOXES_WITH_PICTURES_AND_LABELS
                            break;
                        case "P"://DROPDOWN
                            break;
                        case "R"://DROPDOWN_WITH_PICTURES_AND_LABELS
                            break;
                        case "K"://RADIO_BUTTONS
                            break;
                        case "U"://CALENDAR
                            break;*/
                        default://CHECKBOXES
                            ?>
                            <ul class="ul list-unstyled options-hide" data-options-hide="true">
                                <?
                                foreach ($arItem["VALUES"] as $val => $ar) {
                                    ?>
                                    <li class="ul__li">
                                        <div class="checkbox checkbox_custom">
                                            <label>
                                                <input class="checkbox__control"
                                                       type="checkbox"
                                                       id="<?=$ar["CONTROL_ID"]?>"
                                                       name="<?=$ar["CONTROL_NAME"]?>"
                                                    <?=$ar["CHECKED"] ? 'checked="checked"' : ''?>
                                                       value="<?=$ar["HTML_VALUE"]?>"/>
                                                <span class="checkbox__input"></span><?=$ar["VALUE"]?><? if ($measure) {
                                                    echo ' ' . $measure;
                                                } ?>
                                                <span class="checkbox__info">(<?=intval($ar["ELEMENT_COUNT"])?>)</span>
                                            </label>
                                        </div>
                                    </li>
                                    <?
                                }
                                ?>
                            </ul>
                            <?
                    }
                    ?>
                </div>
                <?
            }
            if ($arParams["IN_SEARCH"] == "Y") {
                echo $priceFilterHtml;
            }
            ?>
            <div class="smart-filter__popover popover right">
                <div class="arrow"></div>
                <div class="popover-content">
                    <a href="javascript:void(0)"
                            class="btn btn-primary"
                            data-bem-repaced="btn_color_primary"
                            role="button"
                            id="set_filter"
                            name="set_filter"
                            value="<?=GetMessage("CT_BCSF_SET_FILTER")?>">
                        Показать<span class="btn__count smart-filter__count"></span>
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    function ajaxPopoverSmartFilter(callContext, method, target) {
        var formData = {
            'ajax': 'y'
        };
        var form = $('[name="<?= $arResult["FILTER_NAME"] . "_form" ?>"]');
        var srcData = $('[name="<?= $arResult["FILTER_NAME"] . "_form" ?>"]').serializeArray();
        for (var i = 0; i < srcData.length; i++) {
            formData[srcData[i]['name']] = srcData[i]['value'];
        }

        BX.ajax.loadJSON(
            "",
            formData,
            function (result) {
                var urlFilter = result['JS_FILTER_PARAMS']['SEF_SET_FILTER_URL']
                    ? result['JS_FILTER_PARAMS']['SEF_SET_FILTER_URL']
                    : result['FILTER_URL'].split('&amp;').join('&');
                form.attr('action', urlFilter);
                $('a#set_filter').attr('href', urlFilter);
                method.call(callContext, target, '(' + result['ELEMENT_COUNT'] + ')');
            },
            function () {
                method.call(callContext, target, "");
            }
        );
    }
    ;
</script>