<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
if(!empty($arResult["CATEGORIES"])):?>
	<table class="popup_main">
		<?foreach($arResult["CATEGORIES"] as $category_id => $arCategory):?>
			<?foreach($arCategory["ITEMS"] as $i => $arItem):?>
				<?if($category_id === "all"):?>
					<tr class="popup_main__showAll strong"><td><a href="<?echo $arItem["URL"]?>"><?echo $arItem["NAME"]?></td></tr>
				<?elseif(isset($arItem["ICON"])):?>
					<tr class="popup_main__item"><td><a href="<?echo $arItem["URL"]?>"><?echo $arItem["NAME"]?></td></tr>
				<?endif;?>
			<?endforeach;?>
		<?endforeach;?>
	</table>
<?endif;
?>