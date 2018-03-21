<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<? if ($arResult["ITEMS"]): ?>
	<? foreach ($arResult["ITEMS"] as $item): ?>
		<? if ($item["COVER"]): ?>
			<div class="intervolga-video">
				<a href="<?= $arParams["URL"] ?>">
					<img src="<?= $item["COVER"]["SRC"] ?>" alt="<?=$item["COVER"]["ALT"]?>" title="<?=$item["COVER"]["TITLE"]?>" class="img-responsive">
					<div class="play"></div>
				</a>
			</div>
		<? endif ?>
	<? endforeach ?>
<? endif ?>