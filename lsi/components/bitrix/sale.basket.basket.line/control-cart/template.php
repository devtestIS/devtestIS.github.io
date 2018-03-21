<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

global $BASKET_COUNT;
$BASKET_COUNT = $BASKET_COUNT ?: 0;
$BASKET_COUNT++;

$cartId = 'bx_basket' . $BASKET_COUNT;
$arParams['cartId'] = $cartId;
?>
    <script>
        var <?=$cartId?> =
        new BitrixSmallCart;
    </script>
    <div id="<?= $cartId ?>" class="<?= $cartStyle ?>"><?
        /** @var \Bitrix\Main\Page\FrameBuffered $frame */
        $frame = $this->createFrame($cartId, false)->begin();
        $arResult['CART_ID'] = $cartId;
        require(realpath(dirname(__FILE__)) . '/ajax_template.php');
        unset($arResult['CART_ID']);
        $frame->beginStub();
        $arResult['COMPOSITE_STUB'] = 'Y';
        require(realpath(dirname(__FILE__)) . '/top_template.php');
        unset($arResult['COMPOSITE_STUB']);
        $frame->end();
        ?></div>
    <script type="text/javascript">
        <?=$cartId?>.siteId = '<?=SITE_ID?>';
        <?=$cartId?>.cartId = '<?=$cartId?>';
        <?=$cartId?>.ajaxPath = '<?=$componentPath?>/ajax.php';
        <?=$cartId?>.templateName = '<?=$templateName?>';
        <?=$cartId?>.arParams =  <?=Bitrix\Main\Web\Json::encode($arParams)?>;
        <?=$cartId?>.closeMessage = '<?=GetMessage('TSB1_COLLAPSE')?>';
        <?=$cartId?>.openMessage = '<?=GetMessage('TSB1_EXPAND')?>';
        <?=$cartId?>.activate();
    </script>
<?
\Intervolga\Custom\SiteTools::beginModal('addedInBasket');
?>
    <div class="modal fade" id="addedInBasket" tabindex="-1">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal__title">Товар добавлен в корзину</div>
                    <div class="modal__close" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></div>
                </div>
                <div class="modal-body">
                    <div class="well mbm">Товар "<span id="addedInBasketElement"></span>" добавлен в вашу корзину покупок</div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 mbm">
                            <a class="btn btn-block btn-default" data-dismiss="modal" role="button" href="#">Продолжить покупки</a>
                        </div>
                        <div class="col-xs-12 col-sm-6 mbm">
                            <a class="btn btn-primary btn-block" href="<?= $arParams['PATH_TO_BASKET'] ?>">Оформить заказ</a>
                        </div>
                    </div>
                    <div id="addedInBasketContent"></div>
                    <div class="checkbox checkbox_custom">
                        <label>
                            <input class="checkbox__control"
                                   type="checkbox"
                                   name="hideModalAddedInBasket"
                                   value=""/>
                            <span class="checkbox__input"></span>
                            Не показывать это окно 1ч
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?
\Intervolga\Custom\SiteTools::endModal();