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
	<form name="<?echo $arResult["FILTER_NAME"]."_form"?>" action="<?echo $arResult["FORM_ACTION"]?>" method="get" class="filter-controls__city" id="filter-form">
		<?foreach($arResult["HIDDEN"] as $arItem):?>
			<input type="hidden" name="<?echo $arItem["CONTROL_NAME"]?>" id="<?echo $arItem["CONTROL_ID"]?>" value="<?echo $arItem["HTML_VALUE"]?>" />
		<?endforeach;?>
		<?
		//not prices
		foreach($arResult["ITEMS"] as $key=>$arItem)
		{
			if(
				empty($arItem["VALUES"])
				|| isset($arItem["PRICE"])
			)
				continue;

			if (
				$arItem["DISPLAY_TYPE"] == "A"
				&& (
					$arItem["VALUES"]["MAX"]["VALUE"] - $arItem["VALUES"]["MIN"]["VALUE"] <= 0
				)
			)
				continue;
			?>
			<div class="filter-controls__li hidden-xs">
				<?= $arItem['NAME']?>:
			</div>
			<?
			switch ($arItem["DISPLAY_TYPE"])
			{
				case "A"://NUMBERS_WITH_SLIDER
				case "B"://NUMBERS
				case "G"://CHECKBOXES_WITH_PICTURES
				case "H"://CHECKBOXES_WITH_PICTURES_AND_LABELS
				case "P"://DROPDOWN
				case "R"://DROPDOWN_WITH_PICTURES_AND_LABELS
				case "K"://RADIO_BUTTONS
				case "U"://CALENDAR
					break;
				default://CHECKBOXES
					?>
					<?$inputValue = '';?>
					<?$isFirstElement = true;?>
					<? foreach($arItem["VALUES"] as $val => $ar): ?>
					<? if ($ar["CHECKED"]): ?>
						<?if (!$isFirstElement):?><?$inputValue .= '; '?><?endif;?>
						<?$inputValue .= preg_replace("/^[\.\s]*/", "", $ar['VALUE'])?>
						<?$isFirstElement = false;?>
					<? endif ?>
				<? endforeach ?>
					<div class="filter-controls__select">
						<select id="select-cities" name="cities[]" multiple="multiple" class="selectized" style="display: none;" placeholder="<?= GetMessage('CT_BCSF_FILTER_CITIES')?>" tabindex="-1">
							<?foreach($arItem["VALUES"] as $val => $ar):?>
								<option class="company-value" value="<?= $ar['VALUE']?>"><?= $ar['VALUE']?></option>
							<?endforeach;?>
						</select>
					</div>

					<?foreach($arItem["VALUES"] as $val => $ar):?>
					<div class="checkbox" style="display: none;">
						<label data-role="label_<?=$ar["CONTROL_ID"]?>" class="bx-filter-param-label <? echo $ar["DISABLED"] ? 'disabled': '' ?>" for="<? echo $ar["CONTROL_ID"] ?>">
						<span class="bx-filter-input-checkbox">
							<input
								type="checkbox"
								value="<? echo $ar["HTML_VALUE"] ?>"
								name="<? echo $ar["CONTROL_NAME"] ?>"
								id="<? echo $ar["CONTROL_ID"] ?>"
								<? echo $ar["CHECKED"]? 'checked="checked"': '' ?>
								onclick="smartFilter.click(this)"
							/>
							<span class="bx-filter-param-text" data-city-name="<?=$ar["VALUE"];?>" title="<?=$ar["VALUE"];?>"><?=$ar["VALUE"];?></span>
						</span>
						</label>
					</div>
				<?endforeach;?>
					<?
			}
		}
		?>
		<input class="btn btn-default btn-primary" id="set_filter" name="set_filter" data-bem-repaced="btn_color_default" type="submit" value="<?=GetMessage("CT_BCSF_SET_FILTER")?>" />
		<input class="btn btn-default btn-default" id="del_filter" name="del_filter" data-bem-repaced="btn_color_default" type="submit" value="<?=GetMessage("CT_BCSF_DEL_FILTER")?>" />
	</form>
	<script type="text/javascript">
		var smartFilter = new JCSmartFilter('<?echo CUtil::JSEscape($arResult["FORM_ACTION"])?>', <?=CUtil::PhpToJSObject($arResult["JS_FILTER_PARAMS"])?>);
	</script>
<?if ($arResult['TAGS_JSON']):?>
	<script>
		var TagsArray = <?= $arResult['TAGS_JSON']?>;
	</script>
<?endif;?>