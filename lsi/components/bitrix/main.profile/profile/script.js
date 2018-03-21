$(function(){
	$('[name="formEditProfile"]').submit(function(){
		var $this = $(this);
		$this.find('input').removeAttr('disabled');
		$this.find('input,button').addClass('disabled');
		$this.find('.errors').html('');

		var minLength = parseInt($('#NEW_PASSWORD').attr('data-minlength'));
		var pass = $('#NEW_PASSWORD').val();
		var passConfirm = $('#NEW_PASSWORD_CONFIRM').val();
		if(pass || passConfirm) {
			if (minLength > 0 && pass.length < minLength) {
				$this.find('.errors').html('<div class="alert alert-danger">' + $('#NEW_PASSWORD').attr('data-error') + '</div>');
				$this.find('input,button').removeAttr('disabled');
				$this.find('input,button').removeClass('disabled');
				return false;
			} else if (pass != passConfirm) {
				$this.find('.errors').html('<div class="alert alert-danger">Подтверждение пароля не совпадает с паролем</div>');
				$this.find('input,button').removeAttr('disabled');
				$this.find('input,button').removeClass('disabled');
				return false;
			}
		}
	});
});