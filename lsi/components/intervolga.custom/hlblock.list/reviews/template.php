<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
	die();
}
if (!empty($arResult['ERROR'])) {
	echo $arResult['ERROR'];
}else {
	if (!empty($arResult['ITEMS'])) {
		if (!$arParams['NO_WRAP']) {
			?><div class="row mbl"><?
		}
		if ($arParams['AJAX_ACTION'] != 'nextPage') {
			if ($arResult['NAV_STRING_BEFORE']) {
				echo $arResult['NAV_STRING_BEFORE'];
			}
		}
		foreach ($arResult['ITEMS'] as $row) {
			?>
			<div class="col-md-12">
			<div class="reviews-preview" id="<?=$id?>">
				<? if ($row["PRODUCT"]["NAME"]): ?>
					<div class="reviews-preview__wrap-title">
						<? if ($row["PRODUCT"]["DETAIL_PAGE_URL"]): ?>
							<a href="<?=$row["PRODUCT"]["DETAIL_PAGE_URL"]?>" class="reviews-preview__title">
								<?=$row["PRODUCT"]["NAME"]?>
							</a>
						<? else: ?>
							<span class="reviews-preview__title">
							<?=$row["PRODUCT"]["NAME"]?>
						</span>
						<? endif ?>
					</div>
				<? endif ?>

				<? if ($row["PRODUCT"]["DETAIL_PICTURE"]['SRC']): ?>
					<? if ($row["PRODUCT"]["DETAIL_PAGE_URL"]): ?>
						<a href="<?=$row["PRODUCT"]["DETAIL_PAGE_URL"]?>" class="reviews-preview__img">
							<img alt="<?=$row["PRODUCT"]["DETAIL_PICTURE"]['ALT']?>" title="<?=$row["PRODUCT"]["DETAIL_PICTURE"]['TITLE']?>" src="<?=$row["PRODUCT"]["DETAIL_PICTURE"]['SRC']?>" class="img-responsive">
						</a>
					<? else: ?>
						<span class="reviews-preview__img">
							<img alt="<?=$row["PRODUCT"]["DETAIL_PICTURE"]['ALT']?>" title="<?=$row["PRODUCT"]["DETAIL_PICTURE"]['TITLE']?>" src="<?=$row["PRODUCT"]["DETAIL_PICTURE"]['SRC']?>" class="img-responsive">
						</span>
					<? endif ?>
				<? endif ?>

				<div class="reviews-preview__content">
					<div class="star-rating star-rating_disabled star-rating_reviews-preview">
						<div class="star-rating__wrap">
							<?
							for ($i = 5; $i > 0; $i--) {
								?>
								<input class="star-rating__input"
								       id="star_rating_input_<?=$row['ID']?>_<?=$i?>"
								       type="checkbox"
								       name="star_rating_input_<?=$row['ID']?>"
								       value="<?=$i?>"
								       disabled<?=$i == round($row['UF_RATE']) ? ' checked="checked"' : ''?> />
								<label class="star-rating__icon fa fa-star"
								       for="star_rating_input_<?=$row['ID']?>_<?=$i?>"></label>
								<?
							}
							?>
							<?if($row["UF_YA_MARKET"]):?>
								<div class="ya_market_list">
									<img src="<?= SITE_TEMPLATE_PATH?>/images/yandex.png">
								</div>
							<?endif;?>
						</div>
					</div>
					<? if ($row["UF_NAME"]): ?>
						<div class="reviews-preview__name"><?=$row["UF_NAME"]?></div>
					<? endif ?>
					<? if ($row["UF_WRITE"]): ?>
						<div class="reviews-preview__date"><?=$row["UF_WRITE"]?></div>
					<? endif ?>
						<div class="reviews-preview__text">
							<? if ($row["UF_ADVANTAGES"]): ?>
								<strong>Достоинства: </strong><?= $row["UF_ADVANTAGES"]?><br>
							<? endif ?>
							<? if ($row["UF_DISADVANTAGES"]): ?>
								<strong>Недостатки: </strong><?= $row["UF_DISADVANTAGES"]?><br>
							<? endif ?>
							<? if ($row["UF_TEXT"]): ?>
							<strong>Комментарий: </strong><?= $row["UF_TEXT"]?>
							<? endif ?>
							<?if($row["UF_ADMIN_REVIEW"]):?>
								<div class="well mtm mbm"><strong>Ответ магазина: </strong><?= $row["UF_ADMIN_REVIEW"]?></div>
							<?endif;?>
						</div>
				</div>
			</div>
			</div>
			<?
		}
		if ($arParams['AJAX_ACTION'] != 'prevPage') {
			if ($arResult['NAV_STRING_AFTER']) {
				echo $arResult['NAV_STRING_AFTER'];
			}
		}
		if (!$arParams['NO_WRAP']) {
			?></div><?
		}
	}else{
		?>
		<div class="alert alert-warning">Здесь пока нет отзывов</div>
		<?
	}
}


?>
