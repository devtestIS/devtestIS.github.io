<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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

$menuBlockId = "catalog_menu_".$this->randString();
?>
<div class="information-menu" id="<?=$menuBlockId?>">
	<?
	foreach($arResult as $item){
		if($item["DEPTH_LEVEL"] > 1){
			continue;
		}
		?>
		<a class="information-menu__item<?=$item["SELECTED"] ? ' information-menu__item_active' : ''?>" href="<?=$item["LINK"]?>">
			<div class="information-menu__img">
				<img class="img-responsive" src="<?=$item["PARAMS"]["IMG"]?>" alt="" />
			</div>
			<div class="information-menu__title"><?=$item["TEXT"]?></div>
		</a>
		<?
	}
	?>
</div>
