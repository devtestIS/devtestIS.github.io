<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use \Bitrix\Main\Localization\Loc;

/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 * @var CatalogSectionComponent $component
 * @var CBitrixComponentTemplate $this
 * @var string $templateName
 * @var string $componentPath
 */

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
<?if ($arResult["NAV_RESULT"]->NavPageNomer > 1):?>
	<a class="link offers__more" href="javascript:void(0)"
	   data-page-direction="backward"
	   data-max="<?=$arResult['NAV_RESULT']->NavPageCount?>"
	   data-current="<?=$arResult['NAV_RESULT']->NavPageNomer?>"
	   data-get-name="PAGEN_<?=$arResult['NAV_RESULT']->NavNum?>"
	>
		<svg class="svg svg_more"><use xlink:href="#more"></use></svg>
		<span>Показать больше предложений</span>
	</a>
<?endif;?>

<?
if ($showTopPager)
{
?>
	<div id="backward">
		<div data-pagination-num="<?=$navParams['NavNum']?>">
			<!-- pagination-container -->
			<?=$arResult['NAV_STRING']?>
			<!-- pagination-container -->
		</div>
	</div>
<?
}

?>

<? if ($arParams['~SORT_STRING']): ?>
	<div id="sort-panel">
		<?=$arParams['~SORT_STRING']?>
	</div>
<? endif; ?>

<?if (count($arResult["ITEMS"]) > 0) :?>
	<div class="col-md-9 col-sm-8 col-xs-12" id="MORE">
	<div class="offers__list">
		<?foreach ($arResult["ITEMS"] as $arItem):?>
		<?
			$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
		?>
		<div class="offer-item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
			<div class="offer-item__left">
				<?if ($arItem['PREVIEW_PICTURE']): ?>
					<div class="offer-item__img"><img class="img" src="<?= $arItem['PREVIEW_PICTURE']["SRC"]?>" alt="" /></div>
				<?endif;?>
				<div class="offer-item__link">
					<?$printFirstParentSection = true;?>
					<?foreach ($arResult["ELEMENTS_PARENT_SECTIONS"][$arItem['ID']] as $arParentSections):?>
						<?if ($printFirstParentSection):?>
							<?$printFirstParentSection = false;?>
						<?else:?>
							<?echo '<span>, </span>'?>
						<?endif;?>
						<a class="link" href="<?= $arParentSections['SECTION_PAGE_URL']?>"><?= $arParentSections['NAME']?></a>
					<?endforeach;?>
				</div>
			</div>
			<div class="offer-item__right">
				<div class="offer-item__header">
					<? if($arItem['NAME']): ?>
						<div class="offer-item__title"><a href="<?= $arItem['DETAIL_PAGE_URL']?>"><?= $arItem['NAME']?></a></div>
					<?endif;?>
					<a class="btn btn-default offer-item__btn" role="button" href="javascript:void(0)" data-proposals='partners' data-partnerid="<?= $arItem['ID']?>"><?= GetMessage('CATALOG_SECTION_OFFERS_BUTTON')?></a>
				</div>
				<?if ($arItem["PREVIEW_TEXT"]): ?>
					<div class="offer-item__text">
						<p><?= $arItem["PREVIEW_TEXT"]?></p>
					</div>
				<?endif;?>
			</div>
		</div>
		<?endforeach;?>
	</div>
</div>


<?endif;?>

<?
if ($showBottomPager)
{
?>
	<div id="forward">
		<div class="col-sm-9 col-sm-offset-3 col-xs-12">
			<div data-pagination-num="<?=$navParams['NavNum']?>">
				<!-- pagination-container -->
				<?=$arResult['NAV_STRING']?>
				<!-- pagination-container -->
			</div>
		</div>
	</div>
<?
}
?>
<?if ($arResult["NAV_RESULT"]->NavPageNomer < $arResult["NAV_RESULT"]->NavPageCount):?>
<!--<div class="col-sm-9 col-sm-offset-3 col-xs-12">-->
<a class="link offers__more" href="#"
   data-page-direction="forward"
   data-current="<?=$arResult['NAV_RESULT']->NavPageNomer?>"
   data-max="<?=$arResult['NAV_RESULT']->NavPageCount?>"
   data-get-name="PAGEN_<?=$arResult['NAV_RESULT']->NavNum?>"
   href="javascript:void(0)"
>
	<svg class="svg svg_more"><use xlink:href="#more"></use></svg>
	<span>Показать больше предложений</span>
</a>
<?endif;