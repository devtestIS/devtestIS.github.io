<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?
if (!empty($arResult)) {
	?>
	<div class="row">
		<?
		$previousLevel = 0;
		foreach ($arResult as $arItem) {
			if ($arItem["DEPTH_LEVEL"] > 1) {
				continue;
			}
			?>
			<div class="col-md-4">
				<a class="account-link" href="<?=$arItem["LINK"]?>">
					<img class="img-responsive account-link__img" src="<?=$arItem["PARAMS"]["IMG"]?>" alt="<?=$arItem["TEXT"]?>"/>
					<div class="account-link__text"><?=$arItem["TEXT"]?></div>
				</a>
			</div>
			<?
		}
		?>
	</div>
	<?
}
?>