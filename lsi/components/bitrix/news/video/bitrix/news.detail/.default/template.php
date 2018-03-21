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
use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);
?>
<? if ($arResult["DISPLAY_PROPERTIES"]["SRC"]): ?>
	<?$APPLICATION->IncludeComponent(
		"intervolga.common:video",
		"only_video",
		array(
			"PROPERTY" => $arResult["DISPLAY_PROPERTIES"]["SRC"],
		),
		$component
	);?>
<? endif ?>

<div class="pal">
<? if ($arResult["FIELDS"]["DETAIL_TEXT"]): ?>
	<div class="article mtl">
		<?=$arResult["FIELDS"]["DETAIL_TEXT"]?>
	</div>
<? endif ?>

<? if ($arResult["LIST_PAGE_URL"]): ?>
	<div class="article mbn">
		<a href="<?=$arResult["LIST_PAGE_URL"]?>"><?=Loc::getMessage("INTERVOLGA_CUSTOM.BACK_TO_VIDEO")?></a>
	</div>
<? endif ?>
</div>
