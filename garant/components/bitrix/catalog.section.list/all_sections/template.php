<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);

$strSectionEdit = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_EDIT");
$strSectionDelete = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_DELETE");
$arSectionDeleteParams = array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM'));

if (0 < $arResult["SECTIONS_COUNT"]):?>
	<div class="pattern pattern_type_accent pbl">
		<div class="container container_fluid_false">
			<h2 class="h h_light"><?= GetMessage('CATALOG_SECTION_LIST_ALL_SECTIONS')?></h2>
			<div class="category-list">
				<?
				$lastSectionLevel = -1;
				foreach ($arResult['SECTIONS'] as &$arSection):

				if ($arSection['ELEMENT_CNT']):
					$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
					$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);

						if ($arSection['RELATIVE_DEPTH_LEVEL'] == 1):
							if($lastSectionLevel !== -1):?>
								</div>
							<?endif;?>
							<div class="category-list__item">
								<h5 id="<?= $this->GetEditAreaId($arSection['ID']); ?>" class="h category-list__title">
									<a class="a" href="<?= $arSection["SECTION_PAGE_URL"]; ?>"><?= $arSection["NAME"]; ?></a>
								</h5>
							<?
							$lastSectionLevel = 1;
						elseif ($arSection['RELATIVE_DEPTH_LEVEL'] == 2):?>
							<?if ($lastSectionLevel == 2)
								echo ', ';
							?>
							<a class="a" id="<?= $this->GetEditAreaId($arSection['ID']); ?>" href="<?= $arSection["SECTION_PAGE_URL"]; ?>"><?= $arSection["NAME"]; ?></a>
							<?
							$lastSectionLevel = 2;
						endif;
					endif;
				endforeach;
				if($lastSectionLevel !== -1):?>
					</div>
				<?endif;?>
			</div>
		</div>
	</div>
<?endif;