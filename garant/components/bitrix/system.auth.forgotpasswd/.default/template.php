<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<div class="bx-system-auth-forgotpasswd col-md-12">

<?echo ShowMessage($arParams["~AUTH_RESULT"], "info");?>

<form name="bform" method="post" action="<?=$arResult["AUTH_URL"]?>" target="_top" class="form-horizontal">
    <?if (strlen($arResult["BACKURL"]) > 0):?>
        <input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
    <?endif;?>

	<input type="hidden" name="AUTH_FORM" value="Y">
	<input type="hidden" name="TYPE" value="SEND_PWD">

	<p><?=GetMessage("AUTH_FORGOT_PASSWORD_1")?></p>

    <div class="form-group">
        <label class="control-label col-md-3" for="inputLogin"><?=GetMessage("AUTH_LOGIN")?></label>
        <div class="col-md-9">
            <input type="text" class="form-control" id="inputLogin" placeholder="<?=GetMessage("AUTH_LOGIN")?>" name="USER_LOGIN" maxlength="50" value="<?=$arResult["LAST_LOGIN"]?>">
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-12">
            <button type="submit" name="send_account_info" class="btn btn-primary pull-right"><?=GetMessage("AUTH_SEND")?></button>
        </div>
    </div>
</form>

</div>