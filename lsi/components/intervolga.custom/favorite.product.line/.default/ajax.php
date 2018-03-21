<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}
?>
<a class="btn btn-default control-cart__btn control-cart__btn_type_star<? if ($arResult['COUNT'] <= 0) { ?> disabled<? } ?>"
   role="button" <? if ($arResult['COUNT'] <= 0 || $arResult['IS_FAVORITE_PAGE']) { ?>onclick="return false;" <? } ?>
   href="<?=$arParams['FAVORITE_PAGE']?>">
    <span class="span hidden-xs hidden-sm hidden-md">Избранное </span>
    <?=$arResult['COUNT'] > 0 ? '<span class="btn__count">' . $arResult['COUNT'] . '</span>' : ''?>
</a>
<?if(!empty($arResult["ITEMS"])):?>
    <div class="popup-header">
        <div class="popup-header__inner">
            <div class="popup-header__body">
                <?foreach ($arResult["ITEMS"] as $arItem):?>
                    <div class="teaser-product">
                        <div class="teaser-product__image"><a href="<?= $arItem['DETAIL_PAGE_URL']?>"><img src="<?= $arItem["DETAIL_PICTURE"]["SRC"]?>" alt="<?= $arItem["NAME"]?>" title="<?= $arItem["NAME"]?>" /></a></div>
                        <div class="teaser-product__body"><a class="teaser-product__title" href="<?= $arItem['DETAIL_PAGE_URL']?>"><?= $arItem['NAME']?></a>
                            <div class="teaser-product__price"><span class="span"><?= $arItem["PRINT_DISCOUNT_PRICE"]?></span><?= $arItem["PRINT_DISCOUNT_PRICE"]!= $arItem["PRINT_PRICE"]? "<span class=\"span old\">".$arItem["PRINT_PRICE"]."</span>" : ""?></div>
                        </div>
                        <div class="teaser-product__close"><i data-favarite-remove="<?= $arItem["ID"]?>" class="fa fa-times-circle"></i></div>
                    </div>
                <?endforeach;?>
            </div>
            <div class="popup-header__footer">
                <div class="popup-header__total">
                    <span class="span">Итого: </span>
                    <b><?= $arResult["TOTAL_DISCOUNT_PRICE"]?></b>
                    <?= $arResult["TOTAL_PRICE"] != $arResult["TOTAL_DISCOUNT_PRICE"] ? "<span class='span old'>".$arResult["TOTAL_PRICE"]."</span>" : "" ?>
                </div>
                <a class="btn btn-primary btn-block" role="button" href="<?=$arParams['FAVORITE_PAGE']?>">Перейти в избранное</a>
            </div>
        </div>
    </div>
<?endif;?>