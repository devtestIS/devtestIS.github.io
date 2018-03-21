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
<?if (!empty($arResult['ITEMS'])) :?>
<div class="join">
	<div class="join__slider">
	<?foreach($arResult["ITEMS"] as $arItem):?>
		<?
		$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
		?>
		<div class="join__wrapper" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
			<picture class="picture picture_lazyload picture_responsive">
				<!--[if IE 9]><video style="display: none;"><![endif]-->
				<?if (is_array($arItem["FIELDS"]["DETAIL_PICTURE"])):?>
					<source class="picture__source" srcset="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-srcset="<?= $arItem["FIELDS"]["DETAIL_PICTURE"]["SRC"]?>" media="(min-width: 768px)" />
				<?endif;?>
                <?if (is_array($arItem["FIELDS"]["PREVIEW_PICTURE"])):?>
                    <source class="picture__source" srcset="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-srcset="<?= $arItem["FIELDS"]["PREVIEW_PICTURE"]["SRC"]?>" media="(max-width: 767px)" />
				<?endif;?>
				<!--[if IE 9]></video><![endif]--><img class="img img_lazyload img-responsive lazyload lazyload" data-bem-repaced="img_responsive" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" alt="" data-src="../../../images/undefined" /></picture>
			<div class="join__overlay pattern pattern_type_dotted"></div>
			<div class="join__inner">
				<div class="container container_fluid_false">
		            <?if ($arItem["FIELDS"]["NAME"]):?>
					    <h1 class="h join__title"><?= $arItem["FIELDS"]["NAME"] ?></h1>
                    <?endif;?>
		            <?if ($arItem["FIELDS"]["DETAIL_TEXT"]):?>
					    <div class="mvl">
						    <p class="p"><?= str_replace("<br />","<br class=\"br\" />", $arItem["FIELDS"]["DETAIL_TEXT"]) ?></p>
					    </div>
                    <?endif;?>
                    <button class="btn btn-info btn-lg text-uppercase" data-bem-repaced="btn_color_info btn_size_lg" data-proposals="club" type="submit"><?= GetMessage('NEWS_LIST_SLIDER_BUTTON')?></button></div>
			</div>
		</div>
	<?endforeach;?>
	</div>
</div>
<?endif;?>