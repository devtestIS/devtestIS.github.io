<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
	die();
}

define('WRAP_INFORMATION', 'Y');
?>
<div class="pal b-space">
	<?ShowMessage($arParams["~AUTH_RESULT"], "alert alert-info");?>
<form name="bform" method="post" target="_top" action="<?=$arResult["AUTH_URL"]?>">
	<?
	if (strlen($arResult["BACKURL"]) > 0) {
		?>
		<input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>"/>
		<?
	}
	?>
	<input type="hidden" name="AUTH_FORM" value="Y">
	<input type="hidden" name="TYPE" value="SEND_PWD">
	<p>
		<?=GetMessage("AUTH_FORGOT_PASSWORD_1")?>
	</p>


	<div class="form-group clearfix">
		<label for="USER_EMAIL" class="col-sm-2 control-label"><?=GetMessage("AUTH_EMAIL")?><sup
				class="text-danger">*</sup></label>
		<div class="col-sm-10">
			<input type="email"
			       class="form-control"
			       name="USER_EMAIL"
			       value=""
			       required="required">
		</div>
	</div>

	<div class="form-group clearfix">
		<div class="col-sm-offset-2 col-sm-10">
			<div class="row">
				<div class="col-md-4">
					<input class="btn btn-primary btn-block" type="submit" name="send_account_info" value="<?=GetMessage("AUTH_SEND")?>"/>
				</div>
				<div class="col-md-4 col-md-offset-4">
					<a class="btn btn-default btn-block" href="<?=$arResult["AUTH_AUTH_URL"]?>" rel="nofollow"><?=GetMessage("AUTH_AUTH")?></a>
				</div>
			</div>
		</div>
	</div>
</form>
</div>