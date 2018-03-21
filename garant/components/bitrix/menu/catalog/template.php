<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
<div class="col-md-3 col-sm-4 col-xs-12">
	<div class="collapse-button collapse-button_offers" data-target="#sidebar"></div>
		<div class="clearfix"></div>
		<div class="collapse collapse_sidebar" id="sidebar">
			<div class="sidebar">
				<div class="sidebar__container">
				<?
				foreach($arResult as $arItem):
					if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1)
						continue;
					?>
					<?if($arItem["SELECTED"]):?>
						<div class="sidebar__item"><a class="link" style="color: lightseagreen" href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></div>
					<?else:?>
						<div class="sidebar__item"><a class="link" href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></div>
					<?endif?>

				<?endforeach?>
			</div>
		</div>
	</div>
</div>
<?endif?>