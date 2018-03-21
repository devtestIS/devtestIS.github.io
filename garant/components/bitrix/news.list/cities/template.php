<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
$this->setFrameMode(true);
?>
<?if (count($arResult["PRINT_CITIES"])):?>
<div>
	<?$isFirstElement = true;?>
	<?foreach($arResult["PRINT_CITIES"] as $city => $arCityItem):?>
		<div class="col-xs-12" data-bem-repaced="row__col row__col_xs_12">
			<p class="p-custom<?if (!$isFirstElement):?> p-custom-margin<?endif;?>"><?= $city?></p>
			<a href="<?= $arCityItem['FILE_LINK']?>" class="btn btn-info btn-sm" data-bem-repaced="btn_color_info btn_size_sm"><?= GetMessage('NEWS_LIST_CITIES_BUTTON')?></a>
			<?$isFirstElement = false;?>
		</div>
	<?endforeach;?>
</div>
<?endif;?>