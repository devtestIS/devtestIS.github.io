<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
	<div class="container container_fluid_false">
		<div class="main-nav">
			<ul class="main-nav__inner pvn">

				<?
				$previousLevel = 0;
				foreach($arResult as $arItem):?>

				<?if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel):?>
					<?=str_repeat("</ul>", ($previousLevel - $arItem["DEPTH_LEVEL"]));?>
				<?endif?>

				<?if ($arItem["IS_PARENT"]):?>

				<?if ($arItem["DEPTH_LEVEL"] == 1):?>
				<li class="main-nav__li"><a class="a main-nav__arrow" href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a>
					<ul class="main-nav__dropdown">
						<?endif?>

						<?else:?>

							<?if ($arItem["PERMISSION"] > "D"):?>

								<?if ($arItem["DEPTH_LEVEL"] == 1):?>
									<li class="main-nav__li"><a class="a" href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
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
		</div>
	</div>
	<hr class="hr" />
<?endif?>
