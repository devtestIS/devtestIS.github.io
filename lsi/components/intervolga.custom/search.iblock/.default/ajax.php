<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
	die();
} ?>

<? if (count($arResult['SECTIONS']) > 0): ?>
	<div class="search-popover__content">
		<div class="search-popover__title">Категории</div>
		<ul class="search-popover__list">
			<? foreach ($arResult['SECTIONS'] as $i => $arItem): ?>
				<li class="search-popover__li">
					<a class="search-popover__link" href="<?=$arItem["URL"]?>"><?=$arItem["TITLE"]?></a>
				</li>
			<? endforeach; ?>
		</ul>
	</div>
<? endif; ?>
<? if (count($arResult['ELEMENTS']) > 0): ?>
	<div class="search-popover__content">
		<div class="search-popover__title">Товары</div>
		<ul class="search-popover__list">
			<? foreach ($arResult['ELEMENTS'] as $i => $arItem): ?>
				<li class="search-popover__li">
					<a class="search-popover__link-img clearfix" href="<?=$arItem["URL"]?>">
						<? if ($arItem["ITEM"]['DETAIL_PICTURE']['SRC']): ?>
							<img src="<?=$arItem["ITEM"]['DETAIL_PICTURE']['SRC']?>"/>
						<? endif; ?>
						<div class="search-popover__link-img-text"><?=$arItem["TITLE"]?></div>
					</a>
				</li>
			<? endforeach; ?>
		</ul>
	</div>
<? endif; ?>