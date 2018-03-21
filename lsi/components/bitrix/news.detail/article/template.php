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

if($arParams["DISPLAY_DATE"] == 'Y'){
	$this->SetViewTarget('article_date');
	?><div class="article-date"><?=$arResult["DISPLAY_ACTIVE_FROM"]?></div><?
	$this->EndViewTarget();
}
?>

<div class="article pal">
	<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arResult["DETAIL_PICTURE"])):?>
		<img
			class="img-responsive mbl"
			src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>"
			alt="<?=$arResult["DETAIL_PICTURE"]["ALT"]?>"
			title="<?=$arResult["DETAIL_PICTURE"]["TITLE"]?>"
		/>
	<?endif?>

	<?
	if(strlen($arResult["DETAIL_TEXT"])>0) {
		echo $arResult["DETAIL_TEXT"];
	}else{
		echo $arResult["PREVIEW_TEXT"];
	}
	?>
</div>
<div class="text-center pbm">
	<div>Поделиться с друзьями:</div>
	<div class="ya-share2" data-services="vkontakte,facebook,gplus,twitter"></div>
</div>