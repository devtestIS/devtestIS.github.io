<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}
?>
<div id="<?=$arResult['COMPONENT_ID']?>">
    <? $frame = $this->createFrame()->begin(); ?>
    <? include "ajax.php"; ?>
    <? $frame->beginStub(); ?>
    <a class="btn btn-default control-cart__btn control-cart__btn_type_star disabled"
       role="button" onclick="return false;"
       href="<?=$arParams['FAVORITE_PAGE']?>">
        <span class="span hidden-xs hidden-sm hidden-md">Избранное </span>
    </a>
    <? $frame->end(); ?>
</div>

<script>$(function(){ favoriteLists.push('<?=$arResult['COMPONENT_ID']?>'); });</script>
<script>var isFavoritePage = <?= $arResult['IS_FAVORITE_PAGE'] ? 'true' : 'false'?>;</script>
