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

<div class="information">
	<div class="article">
		<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arResult["DETAIL_PICTURE"])):?>
			<img
				class="img-responsive"
				src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>"
				alt="<?=$arResult["DETAIL_PICTURE"]["ALT"]?>"
				title="<?=$arResult["DETAIL_PICTURE"]["TITLE"]?>"
			/>
		<?endif?>
		<div class="pal">
			<?if(strlen($arResult["DETAIL_TEXT"])>0) {
				echo $arResult["DETAIL_TEXT"];
			}else{
				echo $arResult["PREVIEW_TEXT"];
			}?>
			<div class="mtm article-date-adaptive">
				<?if($arParams['DISPLAY_DATE']=='Y' && (!empty($arResult["DATE_ACTIVE_FROM_FORMATED"]) || !empty($arResult["DATE_ACTIVE_TO_FORMATED"]))):?>
				<div class="pull-right">
					<div class="pull-left prm">Период действия: </div>
					<div class="clearfix visible-xs visible-sm"></div>
					<div class="article-date mtn"><?= !empty($arResult["DATE_ACTIVE_FROM_FORMATED"])?"от ".$arResult["DATE_ACTIVE_FROM_FORMATED"] : ""?> <?= !empty($arResult["DATE_ACTIVE_TO_FORMATED"])?"до ".$arResult["DATE_ACTIVE_TO_FORMATED"] : ""?></div>
				</div>
				<?endif;?>
				<div class="clearfix visible-xs visible-sm pbm"></div><a href="<?= $arResult["LIST_PAGE_URL"]?>">К списку акций</a>
			</div>
		</div>
		<div class="text-center pbm">
			<div>Поделиться с друзьями:</div>
			<div class="ya-share2" data-services="vkontakte,facebook,gplus,twitter"></div>
		</div>
	</div>
</div>
