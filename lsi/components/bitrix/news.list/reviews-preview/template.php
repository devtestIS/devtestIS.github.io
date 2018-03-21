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
	<? if ($arParams["DISPLAY_TOP_PAGER"]): ?>
		<?= $arResult["NAV_STRING"] ?>
	<? endif ?>

	<? foreach ($arResult["ITEMS"] as $i => $item): ?>
		<?
		$this->AddEditAction($item["ID"], $item["EDIT_LINK"], CIBlock::GetArrayByID($item["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($item["ID"], $item["DELETE_LINK"], CIBlock::GetArrayByID($item["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage("CT_BNL_ELEMENT_DELETE_CONFIRM")));
		$id = $this->GetEditAreaId($item["ID"]);
		?>
		<div class="reviews-preview" id="<?= $id ?>">
			<? if ($item["PRODUCT"]["NAME"]): ?>
				<? if ($item["PRODUCT"]["URL"]): ?>
					<a href="<?=$item["PRODUCT"]["URL"]?>" class="reviews-preview__title">
						<?=$item["PRODUCT"]["NAME"]?>
					</a>
				<? else: ?>
					<span class="reviews-preview__title">
						<?=$item["PRODUCT"]["NAME"]?>
					</span>
				<? endif ?>
			<? endif ?>

			<? if ($item["PRODUCT"]["IMG"]): ?>
				<? if ($item["PRODUCT"]["URL"]): ?>
					<a href="<?=$item["PRODUCT"]["URL"]?>" class="reviews-preview__img">
						<img alt="" src="<?=$item["PRODUCT"]["IMG"]?>" class="img-responsive">
					</a>
				<? else: ?>
					<span class="reviews-preview__img">
						<img alt="" src="<?=$item["PRODUCT"]["IMG"]?>" class="img-responsive">
					</span>
				<? endif ?>
			<? endif ?>

			<div class="reviews-preview__content">
				<div class="star-rating star-rating_disabled star-rating_reviews-preview">
					<div class="star-rating__wrap">
						<?for ($i = $arResult["MAX_RATING"]; $i > 0; $i--): ?>
							<input type="radio" disabled="" value="rating-<?=$item["ID"]?>-<?=$i?>" name="rating-<?=$item["ID"]?>-" id="rating-<?=$item["ID"]?>-<?=$i?>" class="star-rating__input" <? if ($i == $item["DISPLAY_PROPERTIES"]["RATING"]["DISPLAY_VALUE"]): ?>checked="checked"<? endif ?>>
							<label for="rating-<?=$item["ID"]?>-<?=$i?>" class="star-rating__icon fa fa-star"></label>
						<? endfor?>
					</div>
				</div>
				<? if ($item["FIELDS"]["NAME"]): ?>
					<div class="reviews-preview__name"><?= $item["FIELDS"]["NAME"] ?></div>
				<? endif ?>
				<? if ($item["FIELDS"]["DATE_CREATE"]): ?>
					<div class="reviews-preview__date"><?= $item["FIELDS"]["DATE_CREATE"] ?></div>
				<? endif ?>
				<? if ($item["FIELDS"]["PREVIEW_TEXT"]): ?>
					<div class="reviews-preview__text"><?= strip_tags($item["FIELDS"]["PREVIEW_TEXT"]) ?></div>
				<? endif ?>
			</div>
		</div>
	<? endforeach ?>

	<? if ($arParams["DISPLAY_BOTTOM_PAGER"]): ?>
		<?= $arResult["NAV_STRING"] ?>
	<? endif ?>
<? endif ?>