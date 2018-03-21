<?
/**
 * @global CMain $APPLICATION
 * @param array $arParams
 * @param array $arResult
 */
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
	die();
}
?>
<?
if($arResult["strProfileError"]){
	?><div class="alert alert-danger"><?=$arResult["strProfileError"]?></div><?
}
?>
<?
if ($arResult['DATA_SAVED'] == 'Y') {
	?><div class="alert alert-success"><?=GetMessage('PROFILE_DATA_SAVED')?></div><?
}
?>
<form method="post" name="formEditProfile" action="<?=$arResult["FORM_TARGET"]?>" enctype="multipart/form-data">
	<?=$arResult["BX_SESSION_CHECK"]?>
	<input type="hidden" name="lang" value="<?=LANG?>"/>
	<input type="hidden" name="ID" value=<?=$arResult["ID"]?>/>
	<input type="hidden" name="LOGIN" value="<?=$arResult["arUser"]["LOGIN"]?>"/>

	<div class="errors"></div>

	<div class="form-group clearfix">
		<label for="NAME" class="col-md-3 control-label"><?=GetMessage('NAME')?></label>
		<div class="col-md-9">
			<input type="text"
			       class="form-control"
			       name="NAME"
			       placeholder="<?=GetMessage('NAME')?>"
			       value="<?=$arResult["arUser"]["NAME"]?>">
		</div>
	</div>

	<div class="form-group clearfix">
		<label for="LAST_NAME" class="col-md-3 control-label"><?=GetMessage('LAST_NAME')?></label>
		<div class="col-md-9">
			<input type="text"
			       class="form-control"
			       name="LAST_NAME"
			       placeholder="<?=GetMessage('LAST_NAME')?>"
			       value="<?=$arResult["arUser"]["LAST_NAME"]?>">
		</div>
	</div>

	<div class="form-group clearfix">
		<label for="NEW_PASSWORD" class="col-md-3 control-label"><?=GetMessage('NEW_PASSWORD_REQ')?></label>
		<div class="col-md-9">
			<input type="password"
			       class="form-control"
			       id="NEW_PASSWORD"
			       name="NEW_PASSWORD"
			       placeholder="<?=GetMessage('NEW_PASSWORD_REQ')?>"
			       maxlength="12"
			       data-minlength="<?=$arResult["GROUP_POLICY"]["PASSWORD_LENGTH"]?>"
			       data-error="<?=$arResult["GROUP_POLICY"]["PASSWORD_REQUIREMENTS"]?>"
			       autocomplete="off">
		</div>
	</div>

	<div class="form-group clearfix">
		<label for="NEW_PASSWORD_CONFIRM" class="col-md-3 control-label"><?=GetMessage('NEW_PASSWORD_CONFIRM')?></label>
		<div class="col-md-9">
			<input type="password"
			       class="form-control"
			       id="NEW_PASSWORD_CONFIRM"
			       name="NEW_PASSWORD_CONFIRM"
			       placeholder="<?=GetMessage('NEW_PASSWORD_CONFIRM')?>"
			       autocomplete="off">
		</div>
	</div>

	<div class="form-group clearfix">
		<div class="col-md-offset-3 col-md-9">
			<input class="btn btn-primary"
			       type="submit"
			       name="save"
			       value="<?=(($arResult["ID"] > 0) ? GetMessage("MAIN_SAVE") : GetMessage("MAIN_ADD"))?>"/>
		</div>
	</div>

	<div class="form-group clearfix">
		<div class="col-md-offset-3 col-md-9">
			<p><?= $arResult["GROUP_POLICY"]["PASSWORD_REQUIREMENTS"]; ?></p>
		</div>
	</div>
</form>

