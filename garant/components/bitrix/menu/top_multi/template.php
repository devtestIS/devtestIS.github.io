<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
<div class="main-nav">
	<div class="main-nav__control">
		<div class="main-nav__info">
			<div class="main-nav__logo"><a class="a" href="<?=$APPLICATION->GetCurPage(false) !== '/' ? SITE_DIR : 'javascript:void(0)'?>"><i class="icomoon icon icon-logo"></i></a></div>
		</div>
		<div class="main-nav__toggle"><i class="icomoon icon icon-navicon"></i></div>
	</div>
	<nav class="main-nav__collapse">
		<ul class="main-nav__inner">

<?
$previousLevel = 0;
foreach($arResult as $arItem):?>

	<?if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel):?>
		<?=str_repeat("</ul>", ($previousLevel - $arItem["DEPTH_LEVEL"]));?>
	<?endif?>

	<?if ($arItem["IS_PARENT"]):?>

		<?if ($arItem["DEPTH_LEVEL"] == 1):?>
			<li class="main-nav__li <? if ($arItem['SELECTED']):?>main-nav__li_selected<? endif ?>">
				<a class="a main-nav__arrow" href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a>
				<ul class="main-nav__dropdown">
		<?endif?>

	<?else:?>

		<?if ($arItem["PERMISSION"] > "D"):?>

			<?if ($arItem["DEPTH_LEVEL"] == 1):?>
				<li class="main-nav__li <? if ($arItem['SELECTED']):?>main-nav__li_selected<? endif ?>">
					<a class="a" href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a>
				</li>
			<?else:?>
				<li class="main-nav__li"><a class="a" href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
			<?endif?>

		<?endif?>

	<?endif?>

	<?$previousLevel = $arItem["DEPTH_LEVEL"];?>

<?endforeach?>

<?if ($previousLevel > 1)://close last item tags?>
	<?=str_repeat("</ul>", ($previousLevel-1) );?>
<?endif?>
		</ul>
	</nav>
</div>
<?endif?>