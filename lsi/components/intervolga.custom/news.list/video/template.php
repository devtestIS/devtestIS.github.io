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
	<?
	if ($arParams['NO_WRAP'] != 'Y') {
		?><div class="row" data-height="equal" data-target=".video-item"><?
	}
	?>
		<?
		if (($arParams['DISPLAY_BOTTOM_PAGER'] || $arParams['DISPLAY_TOP_PAGER']) && $arParams['AJAX_ACTION'] != 'nextPage') {
			if ($arResult["NAV_RESULT"]->NavPageNomer > 1) {
				echo $arResult['NAV_STRING_BEFORE'];
			}
		}
		?>
		<? foreach ($arResult["ITEMS"] as $item): ?>
			<?
			$this->AddEditAction($item['ID'], $item['EDIT_LINK'], CIBlock::GetArrayByID($item["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($item['ID'], $item['DELETE_LINK'], CIBlock::GetArrayByID($item["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
			$id = $this->GetEditAreaId($item['ID']);
			?>
			<div id="<?= $id ?>" class="col-md-4 col-sm-6 video-item">
				<? if ($item["DISPLAY_PROPERTIES"]["SRC"]): ?>
					<? $APPLICATION->IncludeComponent(
						"intervolga.common:video",
						"cover.url",
						array(
							"PROPERTY" => $item["DISPLAY_PROPERTIES"]["SRC"],
							"WIDTH" => $arParams["COVER_WIDTH"],
							"HEIGHT" => $arParams["COVER_HEIGHT"],
							"URL" => $item["DETAIL_PAGE_URL"],
							"ALT" => $item["IPROPERTY_VALUES"]["ELEMENT_PREVIEW_PICTURE_FILE_ALT"],
							"TITLE" => $item["IPROPERTY_VALUES"]["ELEMENT_PREVIEW_PICTURE_FILE_TITLE"]
						),
						$component,
						array("HIDE_ICONS" => "Y",)
					); ?>
				<? endif ?>
				<? if ($item["FIELDS"]["NAME"]): ?>
					<a class="intervolga-video__title" href="<?= $item["DETAIL_PAGE_URL"] ?>"><?= $item["FIELDS"]["NAME"] ?></a>
				<? endif ?>
			</div>
		<? endforeach ?>
		<?
		if (($arParams['DISPLAY_BOTTOM_PAGER'] || $arParams['DISPLAY_TOP_PAGER']) && $arParams['AJAX_ACTION'] != 'prevPage') {
			if ($arResult["NAV_RESULT"]->NavPageNomer <= $arResult["NAV_RESULT"]->NavPageCount) {
				echo $arResult['NAV_STRING_AFTER'];
			}
		}
		?>
	<?
	if ($arParams['NO_WRAP'] != 'Y') {
		?></div><?
	}
	?>
<? endif ?>