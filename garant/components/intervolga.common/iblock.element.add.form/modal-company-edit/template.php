<?php
defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED === true || die();

use Bitrix\Main\Localization\Loc;
use Intervolga\Custom\Iblock\Offer;

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
$this->setFrameMode(false);
?>
<a name="<?=$arResult['UNIQUE_ID']?>"></a>
<form name="iblock_add_<?=$arResult['UNIQUE_ID']?>" action="<?=POST_FORM_ACTION_URI?>#<?=$arResult['UNIQUE_ID']?>" method="post"
      enctype="multipart/form-data" class="form-company">
	<div class="modal-body">
	<? if ($arResult['ERRORS']): ?>
		<? showError(implode('<br>', $arResult['ERRORS'])) ?>
	<? endif ?>
	<? if (!$arResult['ERRORS'] && $arResult['MESSAGE']): ?>
		<? showNote($arResult['MESSAGE'], 'success') ?>
	<? endif ?>

	<?=bitrix_sessid_post()?>
	<input type="hidden" name="UNIQUE_ID" value="<?=$arResult['UNIQUE_ID']?>"/>
		<div class="company">
	<? foreach ($arResult['PROPERTIES'] as $key => $property): ?>
			<div class="company__property">
		<?
		$required = ($property['REQUIRED_COMPONENT'] == 'Y');
		?>
		<? if ($property['MULTIPLE_NAME']): ?>
			<?
			$error = $arResult['FIELD_ERRORS'][$key][$i];
			$values = $property['VALUES'];
			$name = $property['MULTIPLE_NAME'];
			$size = min(7, count($property['ENUM']) + 1);
			?>
			<? if ($property['IS_HIDDEN'] == 'Y'): ?>
				<input type="hidden" name="<?=$name?>" value="<?=$values?>"/>
				<? continue; ?>
			<? endif; ?>
				<h3 class="company__subheading <? if ($required): ?>required<? endif ?>">
					<?=$property['TITLE']?><? if ($required): ?><span class="text-danger">*</span><? endif ?>
				</h3>
					<? if ($property['LIST_TYPE'] == 'C'): ?>
						<? foreach ($property['ENUM'] as $enumValue => $enum): ?>
							<div class="checkbox">
								<label>
									<input type="checkbox" value="<?=$enumValue?>" name="<?=$name?>" <? if (in_array($enumValue, $values)): ?>checked<? endif ?>>
									<?=$enum['VALUE']?>
								</label>
							</div>
						<? endforeach ?>
			<? else: ?>
				<?$inputValue = '';?>
				<?$isFirstElement = true;?>
				<? foreach ($property['ENUM'] as $enumValue => $enum): ?>
					<? if (in_array($enumValue, $values)): ?>
						<?if (!$isFirstElement):?><?$inputValueAttr .= ', '; $inputValue .= ', '?><?endif;?>
						<?$inputValue .= preg_replace("/^[\.\s]*/", "", $enum['VALUE'])?>
						<?$isFirstElement = false;?>
					<? endif ?>
				<? endforeach ?>
				<input name="<?=$name?>" class="company__value tags-input" type="text" value="<?= $inputValue?>" id="<?=$property['HTML_ID']?>" />
			<? endif ?>
			<? if ($error): ?>
				<span class="help-block"><?=$error?></span>
			<? endif ?>
			<? if (strlen($property['HINT']) > 0): ?>
				<span class="help-block"><?=$property['HINT']?></span>
			<? endif ?>
		<? else: ?>
			<? foreach ($property['NAMES'] as $i => $name): ?>
				<?
				$id = (($i == 0) ? $property['HTML_ID'] : '');
				$idAttr = ($id ? 'id="' . $id . '"' : '');
				$error = $arResult['FIELD_ERRORS'][$key][$i];
				$value = $property['VALUES'][$i];
				$requiredAttr = ($required && ($i == 0)) ? 'required' : '';
				?>
				<? if ($property['IS_HIDDEN'] == 'Y'): ?>
					<input type="hidden" name="<?=$name?>" value="<?= ($property['CODE'] == 'COMPANY') ? $arParams['COMPANY_ID'] : $value?>"/>
					<? continue; ?>
				<? endif; ?>
					<? if ($i == 0): ?>
						<h3 class="company__subheading <? if ($required): ?>required<? endif ?>">
							<?=$property['TITLE']?><? if ($required): ?><span class="text-danger">*</span><? endif ?>
							<?if ($property['CODE'] == 'IMAGES'):?><label class="change-button" data-toggle="modal">Добавить<input name="PROPERTY[IMAGES][]" class="change-button__loader" type="file" multiple/></label><?endif;?>
						</h3>
						<?if ($property['CODE'] == 'IMAGES'):?>
							<div class="company__value">
								<div class="thumbnails-gallery">
						<?endif;?>
					<? endif ?>
						<? if ($property['GetPublicEditHTML']): ?>
							<?=call_user_func_array($property['GetPublicEditHTML'],
								array(
									$property,
									array(
										'VALUE' => $value,
									),
									array(
										'VALUE' => $name,
										'FORM_NAME' => 'iblock_add_' . $arResult['UNIQUE_ID'],
									),
								));?>
						<? elseif ($property['ENUM'] && $property['LIST_TYPE'] == 'L'): ?>
							<select name="<?=$name?>" class="form-control" <?=$idAttr?> <?=$requiredAttr?>>
								<option value=""><?=Loc::getMessage('INTERVOLGA_COMMON.NOT_SELECTED')?></option>
								<? foreach ($property['ENUM'] as $enumValue => $enum): ?>
									<option value="<?=$enumValue?>" <? if ($enumValue == $value): ?>selected<? endif ?>><?=$enum['VALUE']?></option>
								<? endforeach ?>
							</select>
						<? elseif ($property['ENUM'] && $property['LIST_TYPE'] == 'C' && count($property['ENUM']) > 1): ?>
							<div class="radio">
								<label>
									<input type="radio" value="" name="<?=$name?>" <?=$idAttr?>>
									<?=Loc::getMessage('INTERVOLGA_COMMON.NOT_SELECTED')?>
								</label>
							</div>
							<? foreach ($property['ENUM'] as $enumValue => $enum): ?>
								<div class="radio">
									<label>
										<input type="radio" value="<?=$enumValue?>" name="<?=$name?>" <? if (in_array($enumValue, $property['VALUES'])): ?>checked<? endif ?>>
										<?=$enum['VALUE']?>
									</label>
								</div>
							<? endforeach ?>
						<? elseif ($property['ENUM'] && $property['LIST_TYPE'] == 'C' && count($property['ENUM']) == 1): ?>
							<? foreach ($property['ENUM'] as $enumValue => $enum): ?>
								<div class="checkbox">
									<label>
										<input type="checkbox" value="<?=$enumValue?>" name="<?=$name?>" <? if (in_array($enumValue, $property['VALUES'])): ?>checked<? endif ?>>
										<?=$enum['VALUE']?>
									</label>
								</div>
							<? endforeach ?>
						<? elseif ($property['PROPERTY_TYPE'] == 'N'): ?>
							<input type="number" class="form-control" name="<?=$name?>" value="<?=$value?>" <?=$idAttr?> <?=$requiredAttr?>/>
						<? elseif ($property['PROPERTY_TYPE'] == 'E'): ?>
							<input type="number" class="form-control" name="<?=$name?>" value="<?=$value?>" <?=$idAttr?> <?=$requiredAttr?>/>
						<? elseif ($property['PROPERTY_TYPE'] == 'G'): ?>
							<input type="number" class="form-control" name="<?=$name?>" value="<?=$value?>" <?=$idAttr?> <?=$requiredAttr?>/>
						<? elseif ($property['PROPERTY_TYPE'] == 'F'): ?>
							<?
							$file = $arResult['FILES'][$value];
							$isChecked = in_array($value, $property['DELETE_FILES']);
							?>
							<? if ($file): ?>
								<input type="hidden" name="PROPERTY[<?=$property['CODE']?>][]" value="<?=$value?>"/>
								<input type="checkbox" name="DELETE_FILE[]" value="<?=$file['ID']?>" style="display: none"/>
								<figure class="thumbnails-gallery__item"><img class="thumbnails-gallery__image" src="<?=$file['SRC']?>" /><a class="remove-item" href="javascript:void(0);" remove-item-id="<?=$value?>"><i class="icomoon icon icon-close"></i></a></figure>
							<? endif ?>
						<? elseif ($property['PROPERTY_TYPE'] == 'T'): ?>
							<?$bound = false;?>
							<?if ($arResult['IBLOCK']['ID'] == Offer::getIblockId()):?>
								<?if ($property['CODE'] == 'PREVIEW_TEXT'):?>
									<?$bound = true;?>
								<?endif;?>
							<?endif;?>
							<div class="company__value"><textarea rows="3" name="<?=$name?>" class="textarea-scrollbar scrollbar-outer" <?=$idAttr?> <?=$requiredAttr?> <?if ($bound):?>data-field-name="PREVIEW_TEXT"<?endif;?>><?=$value?></textarea></div>
						<? elseif ($property['USER_TYPE'] == 'DateTime'): ?>
							<? $APPLICATION->IncludeComponent(
								'bitrix:main.calendar',
								'',
								array(
									'FORM_NAME' => 'iblock_add_' . $arResult['UNIQUE_ID'],
									'SHOW_INPUT' => 'Y',
									'INPUT_NAME' => $name,
									'INPUT_VALUE' => $value,
								),
								null,
								array(
									'HIDE_ICONS' => 'Y',
								)
							); ?>
						<? else: ?>
							<?$bound = false;?>
							<?if ($arResult['IBLOCK']['ID'] == Offer::getIblockId()):?>
								<?if ($property['CODE'] == 'NAME'):?>
									<?$bound = true;?>
								<?endif;?>
							<?endif;?>
							<input class="company__value" name="<?=$name?>" type="text" value="<?=$value?>" <?=$idAttr?> <?=$requiredAttr?> <?if ($bound):?>data-field-name="NAME"<?endif;?>/>
						<? endif ?>
						<? if ($error): ?>
							<span class="help-block"><?=$error?></span>
						<? endif ?>
						<? if (strlen($property['HINT']) > 0 && ($name == end($property['NAMES']))): ?>
							<span class="help-block"><?=$property['HINT']?></span>
						<? endif ?>
			<? endforeach ?>
			<?if ($property['CODE'] == 'IMAGES'):?>
					</div>
				</div>
			<?endif;?>
		<? endif ?>
				</div>
	<? endforeach ?>
			</div>

	<? if ($arParams['USE_CAPTCHA'] == 'Y'): ?>
		<div class="form-group">
			<label class="control-label col-md-3 required" for="inputCaptcha_<?=$arResult['UNIQUE_ID']?>">
				<?=Loc::getMessage("INTERVOLGA_COMMON.CAPTCHA_TITLE")?>
			</label>
			<div class="col-md-9">
				<input type="hidden" name="captcha_sid" value="<?=$arResult['CAPTCHA_CODE']?>"/>
				<p><img src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult['CAPTCHA_CODE']?>" alt="CAPTCHA"/>
				</p>
				<input class="form-control" type="text" name="captcha_word" maxlength="50" value=""
				       id="inputCaptcha_<?=$arResult['UNIQUE_ID']?>"
				       placeholder="<?=Loc::getMessage("IBLOCK_FORM_CAPTCHA_PROMPT")?>"
				       autocomplete="off"
				required>
			</div>
		</div>
	<? endif ?>
		</div>

	<div class="modal-footer"><button class="btn btn-default" data-bem-repaced="btn_color_default" type="submit"><?=strlen($arParams['BUTTON_TEXT']) ? $arParams['BUTTON_TEXT'] : Loc::getMessage("INTERVOLGA_COMMON.SUBMIT")?></button></div>
</form>
<?if ($arResult['TAGS_JSON']):?>
	<script>
		var TagsArray = <?= $arResult['TAGS_JSON']?>;
	</script>
<?endif;?>
<?if ($arResult['MESSAGE']):?>
	<script>
		setTimeout(function(){$('.modal').modal('hide')}, 3000);
	</script>
<?endif;?>
