$(function(){
	$('[name="lsiregform"]').on('submit', function(event){
		var $this = $(this);
		$this.find('input,button').attr('disabled', 'disabled').addClass('disabled');
		$this.find('.errors').html('');
		
		$('#REGISTER_LOGIN').val($('#REGISTER_EMAIL').val());
		
		var minLength = parseInt($('#REGISTER_PASSWORD').attr('data-minlength'));
		var pass = $('#REGISTER_PASSWORD').val();
		var passConfirm = $('#REGISTER_CONFIRM_PASSWORD').val();
		if(minLength > 0 && pass.length < minLength){
			$this.find('.errors').html('<div class="alert alert-danger">' + $('#REGISTER_PASSWORD').attr('data-error') + '</div>');
			$this.find('input,button').removeAttr('disabled').removeClass('disabled');
			return false;
		}else if(pass != passConfirm){
			$this.find('.errors').html('<div class="alert alert-danger">Повтор пароля не совпадает с паролем</div>');
			$this.find('input,button').removeAttr('disabled').removeClass('disabled');
			return false;
		}
		$this.find('input,button').removeAttr('disabled').removeClass('disabled');
		if(typeof(rsa_encode_lsiregform) == "function"){
			rsa_encode_lsiregform();
		}
		return true;
	});
});