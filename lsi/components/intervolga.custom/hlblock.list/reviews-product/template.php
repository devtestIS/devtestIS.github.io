<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
	die();
}

if ($this->arParams['AJAX_ACTION']) {
	$GLOBALS['APPLICATION']->RestartBuffer();
}

if (!empty($arResult['ERROR'])) {
	echo $arResult['ERROR'];
}else{
	if ($arParams['AJAX_ACTION'] != 'nextReviewsPage') {
		if ($arResult['PAGINATION']["LINKS"]["PREV"]) {
			?>
			<div class="row mbl">
				<div class="col-md-4 col-md-offset-4">
					<a class="btn btn-lg btn-default"
					   role="button"
					   href="<?=$arResult['PAGINATION']["LINKS"]["PREV"]?>"
					   data-action="prevReviewsPage"
					   data-loading-text="Загрузка..."
					>
						Предыдущая страница
					</a>
				</div>
			</div>
			<?
		}
	}
	foreach ($arResult['ITEMS'] as $row) {
		?>
		<div class="reviews-line" itemprop="review" itemscope itemtype="http://schema.org/Review">
			<div class="reviews-line__one">
				<div class="reviews-line__name" itemprop="author"><?=$row["UF_NAME"]?></div>
				<div class="reviews-line__date"><?=$row["UF_WRITE"]?></div>
				<?if($row["UF_YA_MARKET"]):?>
					<div class="mtm">
						<img class="mll" src="<?= SITE_TEMPLATE_PATH?>/images/yandex.png">
					</div>
				<?endif;?>
			</div>
			<div class="reviews-line__two">
				<div class="star-rating star-rating_disabled">
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
						<div class="hidden" itemprop="reviewRating" itemscope="" itemtype="http://schema.org/Rating">
							<span itemprop="ratingValue"><?=$row['UF_RATE']?></span>
							<span itemprop="bestRating">5</span>
						</div>
					</div>
				</div>
				<div class="reviews-line__text" itemprop="description">
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
						<div class="well mtm mbn"><strong>Ответ магазина: </strong><?= $row["UF_ADMIN_REVIEW"]?></div>
					<?endif;?>
				</div>
			</div>
		</div>
		<?
	}
	if ($arParams['AJAX_ACTION'] != 'prevReviewsPage') {
		if ($arResult['PAGINATION']["LINKS"]["NEXT"]) {
			?>
			<div class="row mtl">
				<div class="col-md-4 col-md-offset-4">
					<a class="btn btn-lg btn-default btn-block"
					   role="button"
					   href="<?=$arResult['PAGINATION']["LINKS"]["NEXT"]?>"
					   data-action="nextReviewsPage"
					   data-loading-text="Загрузка..."
					>
						Показать ещё
					</a>
				</div>
			</div>
			<?
		}
	}
	if (!$arParams['AJAX_ACTION']) {
		?>
		<a class="btn btn-primary btn-lg mtl" data-toggle="modal" href="#modal-write-a-review" role="button">
			<i class="fa fa-pencil" aria-hidden="true"></i>
			Написать отзыв
		</a>
		<?
	}
}

if ($this->arParams['AJAX_ACTION']) {
	die;
}
?>

