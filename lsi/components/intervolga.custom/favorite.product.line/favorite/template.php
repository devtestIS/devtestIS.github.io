<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

$frame = $this->createFrame()->begin('');
?>
<div id="<?=$arResult['COMPONENT_ID']?>">
    <? include "ajax.php"; ?>
</div>

<script>$(function(){ favoriteLists.push('<?=$arResult['COMPONENT_ID']?>'); });</script>
<? $frame->end();