<?
if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();
/**
 * Bitrix vars
 *
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponentTemplate $this
 * @global CMain $APPLICATION
 * @global CUser $USER
 */
?>
<form action="<?=POST_FORM_ACTION_URI?>#<?=$arResult["ANCHOR"]?>" method="POST" class="form-horizontal" id="<?=$arResult["ANCHOR"]?>">
	<?if(!empty($arResult["ERROR_MESSAGE"]))
	{
		foreach($arResult["ERROR_MESSAGE"] as $v)
		{
			ShowError($v);
		}
	}
	if(strlen($arResult["OK_MESSAGE"]) > 0)
	{
		ShowMessage(Array("TYPE"=>"OK", "MESSAGE"=>$arResult["OK_MESSAGE"]));
	}
	?>
	<?=bitrix_sessid_post()?>
	<? if ($arResult["FIELDS"]): ?>
		<? foreach ($arResult["FIELDS"] as $arField):?>
			<div class="form-group">
				<label class="control-label col-md-3 <?if($arField["REQUIRED"] == "Y"):?>required<?endif?>" for="<?=$arField["CODE"]?>">
					<?=$arField["LABEL"]?>
				</label>
				<div class="col-md-9">
					<? if ($arField["TYPE"] == "TEXTAREA"): ?>
						<textarea name="<?=$arField["CODE"]?>" id="<?=$arField["CODE"]?>" class="form-control" placeholder="<?=$arField["LABEL"]?>" rows="5" cols="40"
							><?=$arField["VALUE"] ? $arField["VALUE"] : $arField["DEFAULT"]?></textarea>
					<? else: ?>
						<input id="<?=$arField["CODE"]?>" type="text" name="<?=$arField["CODE"]?>" value="<?=$arField["VALUE"] ? $arField["VALUE"] : $arField["DEFAULT"]?>" class="form-control" placeholder="<?=$arField["LABEL"]?>">
					<?endif ?>
				</div>
			</div>
		<? endforeach ?>
	<? endif ?>

	<?if($arParams["USE_CAPTCHA"] == "Y"):?>
		<div class="form-group">
			<label class="control-label col-md-3 required" for="inputCaptcha">
				<?=GetMessage("MFT_CAPTCHA_CODE")?>
			</label>
			<div class="col-md-9">
				<p><img src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult["capCode"]?>" width="180" height="40" alt="CAPTCHA"></p>
				<input type="text" id="inputCaptcha" class="form-control" placeholder="<?=GetMessage("MFT_CAPTCHA_CODE")?>" name="captcha_word" size="30" maxlength="50" value="">
				<input type="hidden" name="captcha_sid" value="<?=$arResult["capCode"]?>">
			</div>
		</div>

		<div class="mf-captcha">
		</div>
	<?endif;?>

	<input type="hidden" name="PARAMS_HASH" value="<?=$arResult["PARAMS_HASH"]?>">
	<div class="form-group">
		<div class="col-md-9 col-md-offset-3">
			<button type="submit" name="submit" value="submit" class="btn btn-primary"><?=GetMessage("MFT_SUBMIT")?></button>
		</div>
	</div>
</form>
