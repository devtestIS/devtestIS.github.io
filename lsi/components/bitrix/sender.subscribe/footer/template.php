<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>

<div class="footer-title">Подпишитесь на новости и акции</div>

<form id="subscribeForm" class="subscription" method="post" action="<?=$arResult["FORM_ACTION"]?>">
	<?=bitrix_sessid_post()?>
	<input type="hidden" name="sender_subscription" value="add">

	<input class="subscription__input"
	       type="email"
	       name="SENDER_SUBSCRIBE_EMAIL"
	       value="<?=$arResult["EMAIL"]?>"
	       title="<?=GetMessage("subscr_form_email_title")?>"
	       placeholder="<?=htmlspecialcharsbx(GetMessage('subscr_form_email_title'))?>" />

	<?foreach($arResult["RUBRICS"] as $itemID => $itemValue):?>
		<input type="hidden" name="SENDER_SUBSCRIBE_RUB_ID[]" value="<?=$itemValue["ID"]?>">
	<?endforeach;?>
	<button class="subscription__btn" type="submit"><?=GetMessage("subscr_form_button")?></button>
</form>

<? if(isset($arResult['MESSAGE'])) {
	?>
	<div class="alert alert-<?=$arResult['MESSAGE']['TYPE']=='ERROR' ? 'danger' : 'success'?> mts">
		<?=$arResult['MESSAGE']['TEXT']?>
	</div>
	<?
} ?>