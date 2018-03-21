<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?
if(strlen($arResult["ERROR_MESSAGE"])<=0) {
	?>
	<form method="post" action="<?=POST_FORM_ACTION_URI?>">

		<input type="hidden" name="CANCEL" value="Y">
		<?=bitrix_sessid_post()?>
		<input type="hidden" name="ID" value="<?=$arResult["ID"]?>">

		<?=GetMessage("SALE_CANCEL_ORDER1")?>

		<a href="<?=$arResult["URL_TO_DETAIL"]?>"><?=GetMessage("SALE_CANCEL_ORDER2")?>
			№<?=$arResult["ACCOUNT_NUMBER"]?></a>?
		<b><?=GetMessage("SALE_CANCEL_ORDER3")?></b><br/><br/>
		<?=GetMessage("SALE_CANCEL_ORDER4")?>:<br/>

		<textarea name="REASON_CANCELED" class="textarea form-control"></textarea><br/><br/>
		<input type="submit" name="action" value="<?=GetMessage("SALE_CANCEL_ORDER_BTN")?>" class="btn btn-primary" />

	</form>
	<?
} else {
	echo ShowError($arResult["ERROR_MESSAGE"]);
}
?>
