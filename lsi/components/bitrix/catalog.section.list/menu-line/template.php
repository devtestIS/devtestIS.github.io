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

<div class="catalog catalog_menu">
	<div class="catalog__container container">
		<ul class="catalog__list">
			<?
			foreach ($arResult['SECTIONS'] as $arSection) {
				?>
				<li class="catalog__item">
					<a class="catalog__link" href="<?=$arSection['SECTION_PAGE_URL']?>">
						<img class="catalog__img"
						     src="<?=$arSection['PICTURE']['RESIZED']?>"
						     alt="<?=$arSection['PICTURE']['ALT']?>"
						     title="<?=$arSection['PICTURE']['TITLE']?>"/>
						<div class="catalog__title"><?=$arSection['NAME']?></div>
					</a>
				</li>
				<?
			}
			?>
		</ul>
	</div>
</div>