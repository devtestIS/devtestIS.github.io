<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?
ShowMessage($arParams["~AUTH_RESULT"], 'alert alert-info');

if($arParams["AUTH_RESULT"]["TYPE"] == 'OK'){
	LocalRedirect($arResult["AUTH_AUTH_URL"]."&change_password=Y");
}else {
	?>
	<div class="errors"></div>
	<form class="b-space" method="post" action="<?=$arResult["AUTH_FORM"]?>" name="lsiconfform">
		<? if (strlen($arResult["BACKURL"]) > 0): ?>
			<input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>"/>
		<? endif ?>
		<input type="hidden" name="AUTH_FORM" value="Y">
		<input type="hidden" name="TYPE" value="CHANGE_PWD">

		<div class="form-group clearfix">
			<label for="USER_EMAIL" class="col-sm-3 control-label"><?=GetMessage("AUTH_LOGIN")?><sup
					class="text-danger">*</sup></label>
			<div class="col-sm-9">
				<input type="email"
				       class="form-control"
				       name="USER_EMAIL"
				       value="<?=$arResult["LAST_LOGIN"]?>"
				       required="required">
			</div>
		</div>

		<div class="form-group clearfix">
			<label for="USER_CHECKWORD" class="col-sm-3 control-label"><?=GetMessage("AUTH_CHECKWORD")?><sup
					class="text-danger">*</sup></label>
			<div class="col-sm-9">
				<input type="text"
				       class="form-control"
				       name="USER_CHECKWORD"
				       value="<?=$arResult["USER_CHECKWORD"]?>"
				       required="required">
			</div>
		</div>

		<div class="form-group clearfix">
			<label for="USER_PASSWORD" class="col-sm-3 control-label"><?=GetMessage("AUTH_NEW_PASSWORD_REQ")?><sup
					class="text-danger">*</sup></label>
			<div class="col-sm-9">
				<input type="password"
				       class="form-control"
				       name="USER_PASSWORD"
				       required="required"
				       placeholder="<?=GetMessage("AUTH_NEW_PASSWORD_REQ")?> (от 6 до 12 символов)"
				       autocomplete="off"
				       minlength="<?=$arResult["GROUP_POLICY"]["PASSWORD_LENGTH"]?>"
				       maxlength="12">
			</div>
		</div>

		<div class="form-group clearfix">
			<label for="USER_CONFIRM_PASSWORD" class="col-sm-3 control-label"><?=GetMessage(
					"AUTH_NEW_PASSWORD_CONFIRM"
				)?><sup class="text-danger">*</sup></label>
			<div class="col-sm-9">
				<input type="password"
				       class="form-control"
				       name="USER_CONFIRM_PASSWORD"
				       required="required"
				       placeholder="<?=GetMessage("AUTH_NEW_PASSWORD_CONFIRM")?> (от 6 до 12 символов)"
				       autocomplete="off"
				       minlength="<?=$arResult["GROUP_POLICY"]["PASSWORD_LENGTH"]?>"
				       maxlength="12">
			</div>
		</div>

		<div class="form-group clearfix">
			<div class="col-sm-offset-3 col-sm-9">
				<div class="row">
					<div class="col-md-4">
						<input class="btn btn-primary btn-block" type="submit" name="change_pwd"
						       value="<?=GetMessage("AUTH_CHANGE")?>"/>
					</div>
					<div class="col-md-4 col-md-offset-4">
						<a class="btn btn-default btn-block" href="<?=$arResult["AUTH_AUTH_URL"]?>"
						   rel="nofollow"><?=GetMessage("AUTH_AUTH")?></a>
					</div>
				</div>
			</div>
		</div>

		<div class="form-group clearfix">
			<div class="col-sm-9 col-sm-offset-3">
				<p>
					<?/*=$arResult["GROUP_POLICY"]["PASSWORD_REQUIREMENTS"];*/?>
					Пароль должен быть не менее 6 и не более 12 символов длиной.
				</p>
				<p><sup class="text-danger">*</sup> <?=GetMessage("AUTH_REQ")?></p>
			</div>
		</div>

	</form>
	<?
	if (!CMain::IsHTTPS() && COption::GetOptionString('main', 'use_encrypted_auth', 'N') == 'Y') {
		$sec = new CRsaSecurity();
		if (($arKeys = $sec->LoadKeys())) {
			$sec->SetKeys($arKeys);
			$formid = 'lsiregform';

			if (!isset($_SESSION['__STORED_RSA_RAND'])) {
				$_SESSION['__STORED_RSA_RAND'] = $this->GetNewRsaRand();
			}

			$arSafeParams = array('USER_PASSWORD', 'USER_CONFIRM_PASSWORD');

			$arData = array(
				"formid" => $formid,
				"key" => $arKeys,
				"rsa_rand" => $_SESSION['__STORED_RSA_RAND'],
				"params" => $arSafeParams,
			);
			?>
			<script type="text/javascript">
				function rsa_encode_lsiregform() {
					rsasec_form(<?=CUtil::PhpToJSObject($arData)?>);
				}
			</script>
			<?
		}
	}
}