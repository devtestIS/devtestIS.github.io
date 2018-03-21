<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use \Bitrix\Main\Localization\Loc;

$this->setFrameMode(true);

if (!empty($arResult['NAV_RESULT']))
{
	$navParams =  array(
		'NavPageCount' => $arResult['NAV_RESULT']->NavPageCount,
		'NavPageNomer' => $arResult['NAV_RESULT']->NavPageNomer,
		'NavNum' => $arResult['NAV_RESULT']->NavNum
	);
}
else
{
	$navParams = array(
		'NavPageCount' => 1,
		'NavPageNomer' => 1,
		'NavNum' => $this->randString()
	);
}

$showTopPager = false;
$showBottomPager = false;

if ($arParams['PAGE_ELEMENT_COUNT'] > 0 && $navParams['NavPageCount'] > 1)
{
	$showTopPager = $arParams['DISPLAY_TOP_PAGER'];
	$showBottomPager = $arParams['DISPLAY_BOTTOM_PAGER'];
}
?>

<?if (count($arResult["ITEMS"]) > 0) :?>
	<div class="filter-controls">
		<? if ($arParams['~FILTER_STRING']): ?>
			<?=$arParams['~FILTER_STRING']?>
		<? endif; ?>
		<? if ($arParams['~SORT_STRING']): ?>
			<?=$arParams['~SORT_STRING']?>
		<? endif; ?>
	</div>
	<?if ($arResult["NAV_RESULT"]->NavPageNomer > 1):?>
		<div class="sticky__more" id="stickyMore" href="javascript:void(0)"
		     data-page-direction="backward"
		     data-current="<?=$arResult['NAV_RESULT']->NavPageNomer?>"
		     data-max="<?=$arResult['NAV_RESULT']->NavPageCount?>"
		     data-get-name="PAGEN_<?=$arResult['NAV_RESULT']->NavNum?>"
		>
			<i class="icomoon mrm fa-spin icon icon-refresh"></i>
			<span class="span"><?= GetMessage('CATALOG_SECTION_OFFERS_MORE')?></span>
		</div>
	<?endif;?>
	<div class="offers-list row" id="MORE">
		<?foreach ($arResult['ITEMS'] as $arItem):?>
			<?
			$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
			?>
			<div class="col-xs-12" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
				<div class="thumbnails thumbnails_type_offer">
					<div class="thumbnails__image">
						<?if ($arItem['PREVIEW_PICTURE']): ?>
							<div><img class="img img_lazyload img-responsive lazyload" data-src="<?= $arItem['PREVIEW_PICTURE']["SRC"]?>" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" alt="" /></div>
						<?endif;?>
						<div class="thumbnails__sections">
							<?$printFirstParentSection = true;?>
							<?foreach ($arResult["ELEMENTS_PARENT_SECTIONS"][$arItem['ID']] as $arParentSections):?>
								<?if ($printFirstParentSection):?>
									<?$printFirstParentSection = false;?>
								<?else:?>
									<?echo ', '?>
								<?endif;?>
								<a class="a" href="<?= $arParentSections['SECTION_PAGE_URL']?>"><?= $arParentSections['NAME']?></a>
							<?endforeach;?>
						</div>
					</div>
					<div class="thumbnails__caption">
						<div class="thumbnails__control">
							<? if($arItem['NAME']): ?>
								<h5 class="h thumbnails__title"><a href="<?= $arItem['DETAIL_PAGE_URL']?>"><?= $arItem['NAME']?></a></h5>
							<?endif;?>
							<?if (INTERVOLGA_GARANT_CATALOG_COMPANIES != 'Y'):?>
								<? if ($arItem['ID']):?>
									<button class="btn btn_color_border-primary" type="submit" <?if (INTERVOLGA_GARANT_CATALOG_OFFERS == 'Y'):?>data-proposals='offers' data-offer-link="<?= $arItem['DETAIL_PAGE_URL']?>"<?endif;?>><?= GetMessage('CATALOG_SECTION_OFFERS_GET_OFFER')?></button>
								<?endif;?>
							<?endif;?>
						</div>
						<?if ($arItem["PREVIEW_TEXT"]): ?>
							<div class="thumbnails__description"><?= $arItem["PREVIEW_TEXT"]?></div>
						<?endif;?>
					</div>
				</div>
			</div>
		<?endforeach;?>
	</div>
	<?if ($arResult["NAV_RESULT"]->NavPageNomer < $arResult["NAV_RESULT"]->NavPageCount):?>
		<div class="sticky__more" id="stickyMore" href="javascript:void(0)"
		     data-page-direction="forward"
		     data-current="<?=$arResult['NAV_RESULT']->NavPageNomer?>"
		     data-max="<?=$arResult['NAV_RESULT']->NavPageCount?>"
		     data-get-name="PAGEN_<?=$arResult['NAV_RESULT']->NavNum?>"
		>
			<i class="icomoon mrm fa-spin icon icon-refresh"></i>
			<span class="span"><?= GetMessage('CATALOG_SECTION_OFFERS_MORE')?></span>
		</div>
	<?endif;?>
<?endif;?>