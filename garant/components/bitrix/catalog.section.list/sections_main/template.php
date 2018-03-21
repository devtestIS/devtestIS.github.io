<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);

$strSectionEdit = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_EDIT");
$strSectionDelete = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_DELETE");
$arSectionDeleteParams = array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM'));
if (!empty($arResult['SECTIONS'])):?>
<div class="sticky__sidebar col-xs-12 col-sm-4 col-md-3">
	<div class="sticky__control">
		<div class="main-nav mbl">
			<div class="main-nav__control">
				<div class="main-nav__info">
					<div class="main-nav__title"></div>
				</div>
				<div class="main-nav__toggle"><i class="icomoon icon icon-navicon"></i></div>
			</div>
			<nav class="main-nav__collapse">
				<ul class="left-nav">
					<?foreach ($arResult['SECTIONS'] as $arSection):?>
						<?if ($arSection['ELEMENT_CNT']):?>
							<?if ($arSection['DEPTH_LEVEL'] == 1):?>
								<li class="left-nav__li <? if ($arSection['ID'] == $arResult['CURRENT_SECTION']):?>active<? endif ?>"" id="<?=$this->GetEditAreaId($arSection['ID']);?>" data-category="<?= $arSection['ID']?>" data-get-name="SECTION_ID">
									<a class="a" href="javascript:void(0)">
										<span class="span"><?= $arSection["NAME"]; ?></span>
										<i class="icomoon pull-right icon icon-arrow-right"></i>
									</a>
								</li>
							<?endif;?>
						<?endif;?>
					<?endforeach;?>
				</ul>
			</nav>
		</div>
	</div>
</div>
<?endif;?>