<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
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
<? if ($arResult["ITEMS"]): ?>
	<div class="service-centers mbl">
		<div class="pseudo-table table-bordered table-striped" data-auto-title="true">
			<div class="pseudo-table__thead hidden-xs hidden-sm">
				<div class="pseudo-table__tr">
					<? foreach ($arResult["TABLE"]["HEADERS"] as $header): ?>
					<div class="pseudo-table__th"><?= $header ?></div>
					<? endforeach ?>
				</div>
			</div>
			<div class="pseudo-table__tbody">
				<? foreach ($arResult["TABLE"]["ROWS"] as $id => $row): ?>
					<div class="pseudo-table__tr">
						<? foreach ($row as $key => $value): ?>
							<div class="pseudo-table__td">
								<? if ($key == "NAME"): ?>
									<div id="<?= $id ?>"><?= $value ?></div>
								<? else: ?>
									<?= $value ?>
								<? endif ?>
							</div>
						<? endforeach ?>
					</div>
				<? endforeach ?>
			</div>
		</div>
	</div>
<? endif ?>
