<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);
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
?>
<div class="mbl visible-xs-block">
	<form class="search">
		<input class="search__input" type="text" placeholder="Поиск товара" name="q"  value="<?=$arResult["REQUEST"]["QUERY"]?>"/>
		<button class="search__btn fa fa-search" type="submit"></button>
	</form>
</div>
<? if ($arResult["SEARCH"]): /*?>
	<div class="card-control">
		<? if ($arResult["CURRENT_FILTER_PRODUCTS_COUNT"] != $arResult["TOTAL_PRODUCTS_COUNT"]): ?>
			<?=Loc::getMessage("INTERVOLGA_CUSTOM.PRODUCTS_FOUND_FILTERED", array(
				"#COUNT#" => $arResult["TOTAL_PRODUCTS_COUNT"],
				"#CURRENT#" => $arResult["CURRENT_FILTER_PRODUCTS_COUNT"],
				"#QUERY#" => $arResult["REQUEST"]["QUERY"])
			)?>
		<? else: ?>
			<?=Loc::getMessage("INTERVOLGA_CUSTOM.PRODUCTS_FOUND", array(
				"#COUNT#" => $arResult["TOTAL_PRODUCTS_COUNT"],
				"#QUERY#" => $arResult["REQUEST"]["QUERY"])
			)?>
		<? endif ?>
	</div>
	<?*/ if ($arResult["ERRORS"] && isset($_REQUEST['q'])): ?>
		<?ShowError(implode("<br>", $arResult["ERRORS"]))?>
	<? endif ?>
	<div class="row">
		<div class="col-lg-3 col-md-4 col-sm-5">
			<?$APPLICATION->ShowViewContent("smartfilter")?>
		</div>
		<div class="col-lg-9 col-md-8 col-sm-7">
			<div class="search-page mbl">
				<?if(isset($arResult["REQUEST"]["ORIGINAL_QUERY"])):
					?>
					<div class="search-language-guess">
						<?echo GetMessage("CT_BSP_KEYBOARD_WARNING", array("#query#"=>'<a href="'.$arResult["ORIGINAL_QUERY_URL"].'">'.$arResult["REQUEST"]["ORIGINAL_QUERY"].'</a>'))?>
					</div><br />
				<?endif?>
				<?if($arResult["REQUEST"]["QUERY"] === false && $arResult["REQUEST"]["TAGS"] === false):?>
					<!--...-->
				<?elseif($arResult["ERROR_CODE"]!=0):?>
					<!--...-->
				<?elseif(count($arResult["SEARCH"])>0):?>
					<? $GLOBALS["arrFilter"] = array("ID" => $arResult["PAGE_PRODUCTS"]) ?>
					<? include "products.php" ?>
					<?/*$APPLICATION->IncludeComponent("bitrix:system.pagenavigation", "", array("NAV_RESULT" => $arResult["NAV_RESULT"])) */?>
				<?endif;?>
			</div>
		</div>
	</div>
<? elseif(!$arResult["SEARCH"] && $arResult["ERROR_CODE"]!=0): ?>
	<div class="row">
		<div class="col-md-12 mbl">
			<? if(isset($_REQUEST['q'])) { ?>
				<p><?=GetMessage("SEARCH_ERROR")?></p>
				<?ShowError($arResult["ERROR_TEXT"]);?>
				<p><?=GetMessage("SEARCH_CORRECT_AND_CONTINUE")?></p>
				<br /><br />
			<? } ?>
			<p><?=GetMessage("SEARCH_SINTAX")?><br /><b><?=GetMessage("SEARCH_LOGIC")?></b></p>
			<table border="0" cellpadding="5">
				<tr>
					<td align="center" valign="top"><?=GetMessage("SEARCH_OPERATOR")?></td><td valign="top"><?=GetMessage("SEARCH_SYNONIM")?></td>
					<td><?=GetMessage("SEARCH_DESCRIPTION")?></td>
				</tr>
				<tr>
					<td align="center" valign="top"><?=GetMessage("SEARCH_AND")?></td><td valign="top">and, &amp;, +</td>
					<td><?=GetMessage("SEARCH_AND_ALT")?></td>
				</tr>
				<tr>
					<td align="center" valign="top"><?=GetMessage("SEARCH_OR")?></td><td valign="top">or, |</td>
					<td><?=GetMessage("SEARCH_OR_ALT")?></td>
				</tr>
				<tr>
					<td align="center" valign="top"><?=GetMessage("SEARCH_NOT")?></td><td valign="top">not, ~</td>
					<td><?=GetMessage("SEARCH_NOT_ALT")?></td>
				</tr>
				<tr>
					<td align="center" valign="top">( )</td>
					<td valign="top">&nbsp;</td>
					<td><?=GetMessage("SEARCH_BRACKETS_ALT")?></td>
				</tr>
			</table>
		</div>
	</div>
<? elseif(!$arResult["SEARCH"] && $arResult["REQUEST"]["QUERY"]): ?>
	<?ShowNote(GetMessage("SEARCH_NOTHING_TO_FOUND"));?>
<? elseif($arResult["REQUEST"]["QUERY"] === false && $arResult["REQUEST"]["TAGS"] === false): ?>
	<div class="card-control">
		<?=Loc::getMessage("INTERVOLGA_CUSTOM.USE_SEARCH_FORM")?>
	</div>
<? endif ?>