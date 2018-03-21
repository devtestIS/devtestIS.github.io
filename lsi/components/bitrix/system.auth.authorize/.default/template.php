<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
	die();
}
define('WRAP_INFORMATION', 'Y');
?>
<?
if($_REQUEST['change_password'] == 'Y'){
	?>
	<div class="alert alert-success"><?=\Bitrix\Main\Localization\Loc::getMessage('LSI_CONFIRM_CHANGE_PASSWORD')?></div>
	<?
}

ShowMessage($arParams["~AUTH_RESULT"], 'alert alert-info');
ShowMessage($arResult['ERROR_MESSAGE'], 'alert alert-danger');
?>

<div class="pal b-space">

<form name="form_auth" method="post" target="_top" action="<?=$arResult["AUTH_URL"]?>">
	<div class="form-group clearfix">
		<p><?=GetMessage("LSI_AUTH_PLEASE_AUTH")?></p>
	</div>

	<input type="hidden" name="AUTH_FORM" value="Y"/>
	<input type="hidden" name="TYPE" value="AUTH"/>
	<? if (strlen($arResult["BACKURL"]) > 0): ?>
		<input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>"/>
	<? endif ?>
	<? foreach ($arResult["POST"] as $key => $value): ?>
		<input type="hidden" name="<?=$key?>" value="<?=$value?>"/>
	<? endforeach ?>

	<div class="form-group clearfix">
		<label for="USER_LOGIN" class="col-sm-2 control-label"><?=GetMessage("LSI_AUTH_LOGIN")?>:<sup
				class="text-danger">*</sup></label>
		<div class="col-sm-10">
			<input type="email"
			       class="form-control"
			       name="USER_LOGIN"
			       placeholder="<?=GetMessage("LSI_AUTH_LOGIN")?>"
			       value="<?=htmlentities($_REQUEST['USER_LOGIN']) ?: $arResult["LAST_LOGIN"]?>"
			       required="required">
		</div>
	</div>

	<div class="form-group clearfix">
		<label for="USER_PASSWORD" class="col-sm-2 control-label"><?=GetMessage("LSI_AUTH_PASSWORD")?>:<sup
				class="text-danger">*</sup></label>
		<div class="col-sm-10">
			<input type="password"
			       class="form-control"
			       name="USER_PASSWORD"
			       placeholder="<?=GetMessage("LSI_AUTH_PASSWORD")?>"
			       autocomplete="off"
			       required="required">
		</div>
	</div>

	<? if ($arResult["CAPTCHA_CODE"]): ?>
		<div class="form-group clearfix">
			<label for="captcha_word" class="col-sm-2 control-label"><?=GetMessage("LSI_AUTH_CAPTCHA_PROMT")?><sup
					class="text-danger">*</sup></label>
			<div class="col-sm-4">
				<input type="hidden" name="captcha_sid" value="<?=$arResult["CAPTCHA_CODE"]?>"/>
				<div
					style="background-color: #fff; border: 1px solid #ccc; border-radius: 3px; height: 36px; overflow: hidden;">
					<img class="img-responsive center-block" style="max-height: 100%;"
					     src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult["CAPTCHA_CODE"]?>" alt="CAPTCHA"/>
				</div>
			</div>
			<div class="col-sm-6">
				<input type="text"
				       class="form-control"
				       id="captcha_word"
				       name="captcha_word"
				       placeholder="<?=GetMessage("LSI_AUTH_CAPTCHA_PROMT")?>"
				       autocomplete="off"
				       required="required">
			</div>
		</div>
	<? endif; ?>
	<? if ($arResult["STORE_PASSWORD"] == "Y"): ?>
		<div class="form-group clearfix">
			<div class="col-sm-10 col-sm-offset-2">
				<label for="USER_REMEMBER">
					<input type="checkbox"
					       id="USER_REMEMBER"
					       name="USER_REMEMBER"
					       value="Y">
					&nbsp;<?=GetMessage("LSI_AUTH_REMEMBER_ME")?>
				</label>
			</div>
		</div>
	<? endif ?>

	<div class="form-group clearfix">
		<div class="col-sm-offset-2 col-sm-10">
			<div class="row">
				<div class="col-md-4">
					<input class="btn btn-primary btn-block" type="submit" name="Login" value="<?=GetMessage("LSI_AUTH_AUTHORIZE")?>"/>
				</div>
				<div class="col-md-4">
					<a class="btn btn-link btn-block" href="<?=$arResult["AUTH_FORGOT_PASSWORD_URL"]?>" rel="nofollow"><?=GetMessage("AUTH_FORGOT_PASSWORD_2")?></a>
				</div>
				<div class="col-md-4">
					<a class="btn btn-default btn-block" href="<?=$arResult["AUTH_REGISTER_URL"]?>" rel="nofollow"><?=GetMessage("LSI_AUTH_REGISTER")?></a>
				</div>
			</div>
		</div>
	</div>

</form>
	
</div>