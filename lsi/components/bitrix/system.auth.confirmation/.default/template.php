<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?
if($_REQUEST['send'] === 'yes'){
	?>
	<div class="alert alert-info">Сылка для подтверждения регистрации была отправлена вам на почту</div>
	<?
}else{
	?>
	<?//here you can place your own messages
		switch($arResult["MESSAGE_CODE"])
		{
		case "E01":
			?><div class="alert alert-danger"><?=$arResult["MESSAGE_TEXT"]?></div><? //When user not found
			break;
		case "E02":
			?><div class="alert alert-success"><?=$arResult["MESSAGE_TEXT"]?></div><? //User was successfully authorized after confirmation
			break;
		case "E03":
			?><div class="alert alert-info"><?=$arResult["MESSAGE_TEXT"]?></div><? //User already confirm his registration
			break;
		case "E04":
			?><div class="alert alert-danger"><?=$arResult["MESSAGE_TEXT"]?></div><? //Missed confirmation code
			break;
		case "E05":
			?><div class="alert alert-danger"><?=$arResult["MESSAGE_TEXT"]?></div><? //Confirmation code provided does not match stored one
			break;
		case "E06":
			?><div class="alert alert-success"><?=$arResult["MESSAGE_TEXT"]?></div><? //Confirmation was successfull
			break;
		case "E07":
			?><div class="alert alert-danger"><?=$arResult["MESSAGE_TEXT"]?></div><? //Some error occured during confirmation
			break;
		}
	?>
	<?if($arResult["SHOW_FORM"]):?>
		<form class="b-space" method="post" action="<?=$arResult["FORM_ACTION"]?>">
			<div class="form-group clearfix">
				<label for="REGISTER_CONFIRM_PASSWORD" class="col-sm-3 control-label"><?=GetMessage("CT_BSAC_LOGIN")?><sup class="text-danger">*</sup></label>
				<div class="col-sm-9">
					<input type="text"
					       class="form-control"
					       name="<?=$arParams["LOGIN"]?>"
					       placeholder="<?=GetMessage("CT_BSAC_LOGIN")?>"
					       value="<?= (strlen($arResult["LOGIN"]) > 0? $arResult["LOGIN"]: $arResult["USER"]["LOGIN"])?>"
					       required="required">
				</div>
			</div>

			<div class="form-group clearfix">
				<label for="REGISTER_CONFIRM_PASSWORD" class="col-sm-3 control-label"><?=GetMessage("CT_BSAC_CONFIRM_CODE")?><sup class="text-danger">*</sup></label>
				<div class="col-sm-9">
					<input type="text"
					       class="form-control"
					       name="<?=$arParams["CONFIRM_CODE"]?>"
					       placeholder="<?=GetMessage("CT_BSAC_CONFIRM_CODE")?>"
					       value="<?= $arResult["CONFIRM_CODE"]?>"
					       required="required">
				</div>
			</div>

			<div class="form-group clearfix">
				<div class="col-sm-offset-3 col-sm-9">
					<input class="btn btn-primary" type="submit" value="<?=GetMessage("CT_BSAC_CONFIRM")?>"/>
				</div>
			</div>

			<input type="hidden" name="<?echo $arParams["USER_ID"]?>" value="<?echo $arResult["USER_ID"]?>" />
		</form>
	<?elseif(!$USER->IsAuthorized()):?>
		<?$APPLICATION->IncludeComponent("bitrix:system.auth.authorize", "", array());?>
	<?endif?>
	<?
}
?>