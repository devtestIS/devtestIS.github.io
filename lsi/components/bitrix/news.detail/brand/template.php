<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<? if ($arResult["ID"]): ?>
	<? if ($arResult["FIELDS"]["DETAIL_TEXT"] || $arResult["FIELDS"]["PREVIEW_PICTURE"]): ?>
		<div class="box-shadow">
			<? if ($arResult["FIELDS"]["PREVIEW_PICTURE"]): ?>
				<img class="img-responsive pull-left mrl mbl" src="<?= $arResult["FIELDS"]["PREVIEW_PICTURE"]["SRC"] ?>"
					alt="<?= $arResult["FIELDS"]["PREVIEW_PICTURE"]["ALT"] ?>"
					title="<?= $arResult["FIELDS"]["PREVIEW_PICTURE"]["TITLE"] ?>"/>
			<? endif ?>

			<? if ($arResult["FIELDS"]["DETAIL_TEXT"]): ?>
				<?= $arResult["FIELDS"]["DETAIL_TEXT"] ?>
			<? endif ?>
		</div>
	<? endif ?>

	<? if ($arResult["SECTIONS"]): ?>
		<div class="box-shadow">
			<div class="">
				<div class="sub-title">Оборудование бренда</div>
				<div class="row">
					<? foreach (range(0, $arResult["COLUMNS"] - 1) as $column): ?>
						<div class="col-md-3 col-sm-6">
							<? foreach (\Intervolga\Custom\Arrays::step($arResult["SECTIONS"], 4, $column) as $section): ?>
								<div class="brand-link">
									<div class="brand-link__img"><img class="img-responsive" src="<?=$section["IMG"]?>" alt="" /></div>
									<a class="brand-link__a" href="<?=$section["FILTER_URL"]?>"><?=$section["NAME"]?> (<?=$section["CNT"]?>)</a>
								</div>
							<? endforeach ?>
						</div>
					<? endforeach ?>
				</div>
			</div>
		</div>
	<? endif ?>
<? endif ?>
