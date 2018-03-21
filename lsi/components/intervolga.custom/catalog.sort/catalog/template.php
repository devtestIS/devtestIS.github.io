<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
	die();
}

$this->setFrameMode(true);
?>

<div class="card-control">
	<div class="card-control__label">сортировать по</div>
	<?
	foreach ($arResult['SORT_LIST'] as $key => $sort) {
		$class = 'card-control__sorting';
		if ($arResult['SORT'] == $key) {
			$class .= ' card-control__sorting_active';
			$class .= ' card-control__sorting_choice_' . ($arResult['SORT_DIRECTION'] == 'asc' ? 'up' : 'down');
		}
		?>
		<a class="<?=$class?>" href="<?=$sort['URL']?>"><?=$sort['NAME']?></a>
		<?
	}
	?>
	<div class="card-control__view">
		<? if($arParams['HIDE_VIEW_TYPE']!='Y') { ?>
		<div class="card-control__label visible-lg-inline-block">Вид каталога</div>
		<? $viewAsLine = $arResult['VIEW_MODE'] == 'line'; ?>
		<a class="card-control__grid card-control__grid_view_box<?=!$viewAsLine ? ' active' : ''?>"
		   href="<?=\Intervolga\Custom\SiteTools::nfGetCurPageParam('view=tile', array('view'))?>"></a>
		<a class="card-control__grid card-control__grid_view_line<?=$viewAsLine ? ' active' : ''?>"
		   href="<?=\Intervolga\Custom\SiteTools::nfGetCurPageParam('view=line', array('view'))?>"></a>
		<? } ?>
	</div>
</div>
<?
if(!empty($arResult['QUICK_FILTERS'])) {
	?>

	<a class="btn btn-primary visible-sm-block collapsed mbs" href="#fast-filter" data-text="<i class=&quot;fa fa-filter&quot; aria-hidden=&quot;true&quot;></i> Скрыть быстрый фильтр" data-toggle="collapse" role="button"><i class="fa fa-filter" aria-hidden="true"></i> Показать быстрый фильтр</a>
	<div class="collapse collapse_fast-filter" id="fast-filter">
		<div class="filter-fast">
			<div class="row">
				<?
				foreach ($arResult['QUICK_FILTERS'] as $filter) {
					?>
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
						<a class="filter-fast__item<? if($filter['CHECKED']) { echo ' active'; } ?>" href="<?=$filter['SECTION_PAGE_URL']?>">
							<div class="filter-fast__image"><img src="<?= $filter['PICTURE']['SRC']?>" /></div>
							<div class="filter-fast__text"><?=$filter['NAME']?></div>
						</a>
					</div>
				<?}?>
			</div>
		</div>
	</div>

	<?$this->SetViewTarget('fast_filters');?>
		<a class="btn btn-primary visible-xs-block collapsed mbs" href="#fast-filter-1" data-text="<i class=&quot;fa fa-filter&quot; aria-hidden=&quot;true&quot;></i> Скрыть быстрый фильтр" data-toggle="collapse" role="button"><i class="fa fa-filter" aria-hidden="true"></i> Показать быстрый фильтр</a>
		<div class="collapse collapse_fast-filter_xs" id="fast-filter-1">
			<div class="filter-fast">
				<div class="row">
					<?
					foreach ($arResult['QUICK_FILTERS'] as $filter) {
						?>
						<div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
							<a class="filter-fast__item<? if($filter['CHECKED']) { echo ' active'; } ?>" href="<?=$filter['SECTION_PAGE_URL']?>">
								<div class="filter-fast__image"><img src="<?= $filter['PICTURE']['SRC']?>" /></div>
								<div class="filter-fast__text"><?=$filter['NAME']?></div>
							</a>
						</div>
					<?}?>
				</div>
			</div>
		</div>
	<?$this->EndViewTarget();
} ?>
<div class="card-control-small">Сортировать по:
	<div class="card-sorting-small dropdown">
		<?$name = "";
		$class = "";
		foreach ($arResult["SORT_LIST"] as $key => $sort)
		{
			if($arResult['SORT'] == $key)
			{
				$name = $sort["NAME"];
				$class = $arResult['SORT_DIRECTION'] == 'asc' ? 'up' : 'down';
			}
		}?>
		<button class="card-sorting-small__toggle btn btn-info" type="button" data-toggle="dropdown"><?=$name?> <i class="fa fa-caret-<?=$class?>" aria-hidden="true"></i></button>
		<ul class="card-sorting-small__list dropdown-menu">
			<?foreach ($arResult['SORT_LIST'] as $key => $sort) {?>
				<li class="card-sorting-small__li" data-id="<?=$key?>_down" data-sort-href="<?=$sort['URL_DOWN']?>"><?=$sort['NAME']?> <i class="fa fa-caret-down" aria-hidden="true"></i></li>
				<li class="card-sorting-small__li" data-id="<?=$key?>_up" data-sort-href="<?=$sort['URL_UP']?>"><?=$sort['NAME']?> <i class="fa fa-caret-up" aria-hidden="true"></i></li>
			<?}?>
		</ul>
	</div>
</div>