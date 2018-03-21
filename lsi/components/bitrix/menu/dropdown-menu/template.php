<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?
if (!empty($arResult)){
	?>
	<ul class="dropdown-menu dropdown-menu_ul authorization__menu">
		<?
		foreach($arResult as $arItem){
			if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1) {
				continue;
			}
			?>
			<li class="dropdown-menu__li">
				<a class="dropdown-menu__link <?if($arItem["SELECTED"]){?>active<?}?>" href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a>
			</li>
			<?
		}
		?>
	</ul>
	<?
}
?>
