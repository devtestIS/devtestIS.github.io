<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<? foreach ($arResult["ITEMS"] as $arVideo): ?>
	<div class="intervolga-video video-<?=$arVideo["PROVIDER"]?> center-block" id="<?= $arVideo["ID"] ?>"
	     data-provider="<?=$arVideo["PROVIDER"]?>" data-src="<?= $arVideo["SRC"] ?>">

		<img class="cover img-responsive center-block" src="<?= $arVideo["COVER"]["src"] ?>" alt="" />
		<div class="play"></div>
	</div>
<? endforeach ?>
