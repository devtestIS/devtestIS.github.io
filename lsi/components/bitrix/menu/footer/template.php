<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

$this->setFrameMode(true);

if (!empty($arResult)) {
    $previousLevel = 0;
    foreach ($arResult as $arItem) {
		if($arItem["DEPTH_LEVEL"] > 2){
			continue;
		}

		if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel) {
			echo str_repeat("</ul></div>", ($previousLevel - $arItem["DEPTH_LEVEL"]));
		}

		if ($arItem["IS_PARENT"]){
			if ($arItem["DEPTH_LEVEL"] == 1){
				?>
				<div class="col-md-3 col-sm-6">
					<div class="footer-title"><?=$arItem["TEXT"]?></div>
					<ul class="footer-list">
				<?
			} elseif ($arItem["PERMISSION"] > "D") {
				?>
				<li class="footer-list__item"><a class="footer-list__link" href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
				<?
			}
		} else {
			if ($arItem["PERMISSION"] > "D"){
				if ($arItem["DEPTH_LEVEL"] == 1){
					?>
					<div class="col-md-3 col-sm-6">
						<div class="footer-title"><?=$arItem["TEXT"]?></div>
					</div>
					<?
				} else {
					?>
					<li class="footer-list__item"><a class="footer-list__link" href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
					<?
				}
			}
		}
		$previousLevel = $arItem["DEPTH_LEVEL"];
	}
    if ($previousLevel > 1) {//close last item tags
        echo str_repeat("</ul></div>", ($previousLevel - 1));
    }
}
?>