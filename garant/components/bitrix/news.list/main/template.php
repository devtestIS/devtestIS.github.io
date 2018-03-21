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
	<div class="pattern pattern_type_shadow-top">
		<div class="container container_fluid_false">
			<div class="pvl">
				<h2 class="h"><a class="a" href="<?= $arResult['SECTION_PAGE_URL']?>"><?= GetMessage('NEWS_LIST_MAIN_TITLE')?></a></h2>
				<div class="news-list row">
					<?foreach($arResult["ITEMS"] as $arItem):?>
						<?
						$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
						$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
						?>
						<div class="col-xs-12 col-md-4" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
							<div class="thumbnails thumbnails_type_news">
								<?if($arParams["DISPLAY_DATE"]!="N" && $arItem["DISPLAY_ACTIVE_FROM"]):?>
									<div class="thumbnails__date"><?= $arItem["DISPLAY_ACTIVE_FROM"]?></div>
								<?endif?>
								<?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"] && $arItem["DETAIL_PAGE_URL"]):?>
									<h5 class="h thumbnails__title"><a class="a" href="<?= $arItem["DETAIL_PAGE_URL"]?>"><?echo $arItem["NAME"]?></a></h5>
								<?endif;?>
								<?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
									<div class="thumbnails__description"><?= $arItem["PREVIEW_TEXT"];?></div>
								<?endif;?>
							</div>
						</div>
					<?endforeach;?>
				</div>
			</div>
		</div>
	</div>
<?endif;?>
