$(function(){
	$('#modal-write-a-review').on('click', '.btn.send', function() {
		$('#modal-write-a-review form').submit();
	});

	$('#modal-write-a-review').submit(function() {
		var btn = $('#modal-write-a-review .btn.send');
		var form = $('#modal-write-a-review form');

		btn.button('loading');

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
		if(!formData['ITEM[UF_RATE]']){
			form.find('[name="ITEM[UF_RATE]"]').closest('.form-group')
				.addClass('has-error');
			error = true;
		}
		if(error){
			form.find('.messages').html('<div class="alert alert-danger">Не все обязательные поля заполнены</div>');
			btn.button('reset');
			return false;
		}

		$.ajax({
			method: "POST",
			url: form.attr('action'),
			data: formData,
			dataType: 'json',
			success: function (data) {
				if(data && data.RESULT == 'OK'){
					form.find('.messages').html('<div class="alert alert-success">Ваш отзыв отправлен и появится на странице.</div>').show();
					btn.hide();
					$('#modal-write-a-review [type="submit"]').html('OK');
					$('#modal-write-a-review').off('submit');
					$('#modal-write-a-review').on('submit', function() {
						$('#modal-write-a-review').modal('hide');
						return false;

					});
					$('[data-toggle="modal"][href="#modal-write-a-review"]').hide();
				}else if(data && data.ERRORS){
					form.find('.messages')
						.html('<div class="alert alert-danger">' + data.ERRORS.join('<br />') + '</div>').show();
					btn.button('reset');
				}else{
					form.find('.messages')
						.html('<div class="alert alert-danger">Возникли некоторые проблемы. Попробуйте позже.</div>').show();
					btn.button('reset');
				}
				if(data && data.CAPTCHA_CODE){
					form.find('[name="captcha_sid"]').val(data.CAPTCHA_CODE).parent().find('img').attr('src', '/bitrix/tools/captcha.php?captcha_sid=' + data.CAPTCHA_CODE);
					form.find('[name="captcha_word"]').val('');
				}
			},
			error: function() {
				form.find('.messages')
					.html('<div class="alert alert-danger">Возникли некоторые проблемы. Попробуйте позже.</div>').show();
				btn.button('reset');
			}
		});

		return false;
	});

	$('[name="ITEM[UF_PHONE]"]')
		.removeAttr('required')
		.attr('data-required', 'required')
		.inputmask({
			"mask": "+7(999)999-99-99"
		});

	$('#modal-found-a-cheaper').submit(function() {
		var btn = $('#modal-found-a-cheaper .btn.send');
		var form = $('#modal-found-a-cheaper form');

		btn.button('loading');

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
			btn.button('reset');
			return false;
		}

		$.ajax({
			method: "POST",
			url: form.attr('action'),
			data: formData,
			dataType: 'json',
			success: function (data) {
				if(data && data.RESULT == 'OK'){
					form.find('.modal-body').html('<div class="alert alert-success">Спасибо! Ваша заявка принята в работу.</div>');
					btn.hide();
					$('#modal-found-a-cheaper [type="submit"]').removeClass('btn-primary').addClass('btn-success').html('Закрыть');
					$('#modal-found-a-cheaper').off('submit');
					$('#modal-found-a-cheaper').on('submit', function() {
						$('#modal-found-a-cheaper').modal('hide');
						return false;
					});
				}else if(data && data.ERRORS){
					form.find('.messages')
						.html('<div class="alert alert-danger">' + data.ERRORS.join('<br />') + '</div>').show();
					btn.button('reset');
				}else{
					form.find('.messages')
						.html('<div class="alert alert-danger">Возникли некоторые проблемы. Попробуйте позже.</div>').show();
					btn.button('reset');
				}
				if(data && data.CAPTCHA_CODE){
					form.find('[name="captcha_sid"]').val(data.CAPTCHA_CODE).parent().find('img').attr('src', '/bitrix/tools/captcha.php?captcha_sid=' + data.CAPTCHA_CODE);
					form.find('[name="captcha_word"]').val('');
				}
			},
			error: function() {
				form.find('.messages')
					.html('<div class="alert alert-danger">Возникли некоторые проблемы. Попробуйте позже.</div>').show();
				btn.button('reset');
			}
		});

		return false;
	});
});