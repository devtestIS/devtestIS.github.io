<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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
<?if (!empty($arResult["ITEMS"])):?>
	<div class="container container_fluid_false">
		<h2 class="h h-custom text-center"><?= GetMessage('NEWS_LIST_PARTNERS_TITLE')?></h2>
		<div class="partners-list row">
			<?foreach($arResult["ITEMS"] as $arItem):?>
				<?
				$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
				$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
				?>
				<div class="col-xs-12 col-md-6" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
					<div class="thumbnails thumbnails_type_partners">
						<div class="thumbnails__header">
							<? if (is_array($arItem["FIELDS"]["PREVIEW_PICTURE"])): ?>
								<div class="thumbnails__image">
									<img class="img img_lazyload img-responsive lazyload" data-src="<?= $arItem["FIELDS"]["PREVIEW_PICTURE"]["SRC"]?>" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" alt="" />
								</div>
							<?endif;?>
							<? if ($arItem["FIELDS"]["NAME"]): ?>
								<h5 class="h thumbnails__title"><a class="a" href="<?= $arItem["DETAIL_PAGE_URL"]?>"><?= $arItem["FIELDS"]["NAME"]?></a></h5>
							<?endif;?>
						</div>
						<?if ($arItem["FIELDS"]["PREVIEW_TEXT"]): ?>
							<div class="thumbnails__description">
								<p><?= $arItem["FIELDS"]["PREVIEW_TEXT"]?></p>
							</div>
						<?endif;?>
						<div class="text-center"><button class="btn btn-info" type="submit" data-proposals='offers' data-offer-link="<?= $arItem['DETAIL_PAGE_URL']?>"><?= GetMessage('NEWS_LIST_PARTNERS_BUTTON')?></button></div>
					</div>
				</div>
			<?endforeach;?>
		</div>
		<div class="pvl"></div>
	</div>
<?endif;?>