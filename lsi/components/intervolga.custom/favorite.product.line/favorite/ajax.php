<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

if ($arResult['COUNT'] > 0) {
    ?>
    <a class="comparison-btn comparison-btn_next"
       href="<?=$arParams['FAVORITE_PAGE']?>"<? if ($arResult['COUNT'] <= 0 || $arResult['IS_FAVORITE_PAGE']) { ?> onclick="return false;" <? } ?>>
        <i class="fa comparison-btn__img fa-star-o"></i>(<?=$arResult['COUNT']?>)
    </a>
    <?
}