<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
	die();
}
/**
 * Bitrix vars
 *
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponentTemplate $this
 * @global CMain $APPLICATION
 * @global CUser $USER
 */

$this->setFrameMode(true);
?>

<?
if (count($arResult['REQUEST_RESULT']['ERRORS']) > 0) {
	?>
	<div class="alert alert-danger"><?=implode('<br />', $arResult['REQUEST_RESULT']['ERRORS'])?></div><?
} elseif ($arResult["OK_MESSAGE"]) {
	?>
	<div class="alert alert-success"><?=$arResult["OK_MESSAGE"]?></div><?
}
?>

<form method="post" id="event<?=$arResult['COUNTER']?>">
	<input type="hidden" name="event" value="<?=$arResult['COUNTER']?>"/>
	<?=bitrix_sessid_post()?>
	<?
	$fieldIndex = 0;
	foreach ($arResult['FIELDS'] as $field) {
		$fieldIndex++;

		?>
		<div class="form-group">
			<?
			switch ($field['TYPE']) {
				case 'textarea':
					?>
					<label for="event<?=$arResult['COUNTER']?>field<?=$fieldIndex?>">
						<?=$field['NAME']?>
						<?
						if ($field['REQUIRE'] === 'Y') {
							?>
							<sup class="text-danger">*</sup>
							<?
						}
						?>
					</label>
					<textarea class="form-control"
					          rows="5"
					          id="event<?=$arResult['COUNTER']?>field<?=$fieldIndex?>"
					          name="<?=$field['CODE']?>"
					          placeholder="<?=$field['NAME']?>"
					          <?
					          if ($field['REQUIRE'] === 'Y') {
					              ?>
					              required="required"
					              <?
					          }
					          if (intval($field['TYPE_PARAMS']['LENGTH']) > 0) {
					              ?>
					              maxlength="<?=intval($field['TYPE_PARAMS']['LENGTH'])?>"
					              <?
					          }
					          ?>
					><?=$field['VALUE'] ?: $field['DEFAULT']?></textarea>
					<?
					break;
				case 'checkbox':
					?>
					<div class="checkbox">
						<label>
							<input type="checkbox"
							       name="<?=$field['CODE']?>"
							       id="event<?=$arResult['COUNTER']?>field<?=$fieldIndex?>"
								<? if ($field['VALUE'] == 'Y') {
									echo ' selected="selected"';
								} ?>
							> <?=$field['NAME']?>
						</label>
					</div>
					<?
					break;
				default:
					if($field['TYPE'] !== 'hidden') {
						?>
						<label for="event<?=$arResult['COUNTER']?>field<?=$fieldIndex?>">
							<?=$field['NAME']?>
							<?
							if ($field['REQUIRE'] === 'Y') {
								?>
								<sup class="text-danger">*</sup>
								<?
							}
							?>
						</label>
						<?
					}
					?>
					<input type="<?=$field['TYPE'] ?: 'text'?>"
					       class="form-control"
					       id="event<?=$arResult['COUNTER']?>field<?=$fieldIndex?>"
					       name="<?=$field['CODE']?>"
					       placeholder="<?=$field['NAME']?>"
					       value="<?=$field['VALUE'] ?: $field['DEFAULT']?>"
					       <?
					       if ($field['REQUIRE'] === 'Y') {
					           ?>
					           required="required"
					           <?
					       }
					       ?>
					/>
					<?
			}
			?>
		</div>
		<?
	}

	if ($arParams["USE_CAPTCHA"] == "Y") {
		?>
		<div data-captcha="reCaptcha"></div>
		<?
	}
	?>
	<div class="row">
		<div class="col-md-9">
			<p><sup class="text-danger">*</sup> - обязательные поля</p>
		</div>
		<div class="col-md-3">
			<button type="submit" class="btn btn-primary btn-block">Отправить</button>
		</div>
	</div>
</form>
<p></p>