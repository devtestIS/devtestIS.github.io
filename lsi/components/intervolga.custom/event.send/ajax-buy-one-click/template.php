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

<form class="form mts" method="post" id="eventForm<?=$arResult['COUNTER']?>" action="">
	<div class="messages"></div>
	<input type="hidden" name="event" value="<?=$arResult['COUNTER']?>"/>
	<input type="hidden" name="ajax" value="Y"/>
	<?=bitrix_sessid_post()?>
	<div class="row">
	<?
	$fieldIndex = 0;
	foreach ($arResult['FIELDS'] as $field) {
		$fieldIndex++;
		if($field['TYPE'] == 'hidden') {
			?>
			<input type="hidden"
			       id="event<?=$arResult['COUNTER']?>field<?=$fieldIndex?>"
			       name="<?=$field['CODE']?>"
			       value="<?=$field['VALUE'] ?: $field['DEFAULT']?>"
			/>
			<?
			continue;
		}
		?>
		<div class="col-sm-6">
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
		</div>
		<?
	}
	?>
	</div>
	<?
	if ($arParams["USE_CAPTCHA"] == "Y") {
		?>
		<div class="wrap-recaptcha" data-captcha="reCaptcha"></div>
		<?
	}
	?>
	<div class="row">
		<div class="col-md-9">
			<p><sup class="text-danger">*</sup> - обязательные поля</p>
		</div>
		<div class="col-md-3">
			<button type="submit" class="btn btn-primary btn-block" data-loading-text="Отправка...">Отправить</button>
		</div>
	</div>
</form>
<p></p>

<script>
	$('#eventForm<?=$arResult['COUNTER']?>').submit(function(){
		var form = $(this);

		form.find('[type="submit"]').button('loading');

		var formData = {};
		var error = false;
		form.find('.has-error').removeClass('has-error');
		form.find('input,textarea,select').each(function(){
			var $this = $(this);
			if(($this.attr('type') == 'checkbox' || $this.attr('type') == 'radio')
				&& !($this.prop('checked')===true || $this.prop('selected')===true)){
				return;
			}
			if(($this.prop('required') || $this.attr('data-required') == 'required') && !$this.val()){
				$this.closest('.form-group')
					.addClass('has-error');
				error = true;
			}
			formData[$this.attr('name')] = $this.val();
		});
		if(error){
			form.find('.messages').html('<div class="alert alert-danger">Не все обязательные поля заполнены</div>');
			form.find('[type="submit"]').button('reset');
			return false;
		}
		var re = /\+7\(\d{3}\)\d{3}-\d{2}-\d{2}/, m;
		if ((m = re.exec(formData['PHONE'])) === null) {
			form.find('[name="PHONE"]')
				.closest('.form-group')
				.addClass('has-error');
			form.find('.messages').html('<div class="alert alert-danger">Не правильный формат телефона</div>');
			form.find('[type="submit"]').button('reset');
			return false;
		}

		$.ajax({
			method: "POST",
			url: form.attr('action'),
			data: formData,
			dataType: 'json',
			success: function (data) {
				if(data && data.RESULT == 'OK'){
					form.find('.messages').html('<div class="alert alert-success"><?=$arParams["OK_TEXT"]?></div>');
				}else if(data && data.ERRORS){
					form.find('.messages')
						.html('<div class="alert alert-danger">' + data.ERRORS.join('<br />') + '</div>').show();
				}else{
					form.find('.messages')
						.html('<div class="alert alert-danger">Возникли некоторые проблемы. Попробуйте позже.</div>').show();
				}
			},
			error: function() {
				form.find('.messages')
					.html('<div class="alert alert-danger">Возникли некоторые проблемы. Попробуйте позже.</div>').show();
			},
			complete: function () {
				form.find('[type="submit"]').hide();
				$('#eventForm<?=$arResult['COUNTER']?>').off('submit');
				$('#eventForm<?=$arResult['COUNTER']?>').submit(function(){
					$('#eventForm<?=$arResult['COUNTER']?>').closest('.modal').modal('hide');
					return false;
				});
			}
		});

		return false;
	});
</script>