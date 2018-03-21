<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
	die();
}

$this->setFrameMode(true);
$placeholder = Bitrix\Main\Config\Option::get("grain.customsettings", "SEARCH_PLACEHOLDER");
?>
<div class="relative">
	<form class="search search_header" action="<?=$arResult["FORM_ACTION"]?>">
		<input class="search__input" type="text" name="q" value="<?=$arResult["QUERY"]?>"
		       maxlength="50" autocomplete="off" placeholder="<?= $placeholder?>" id="titleSearchInput"/>
		<button class="search__btn fa fa-search" type="submit"></button>
	</form>
</div>
<?$this->SetViewTarget("search_mobile");?>
	<div class="collapse" id="search-mob">
		<form class="search search_mob" action="<?=$arResult["FORM_ACTION"]?>">
			<input class="search__input" type="text" name="q" value="<?=$arResult["QUERY"]?>"
			        maxlength="50" autocomplete="off" placeholder="<?= $placeholder?>" id="titleSearchInputLow"/>
			<button class="search__btn fa fa-search" type="submit"></button>
		</form>
	</div>
<?$this->EndViewTarget();?>

