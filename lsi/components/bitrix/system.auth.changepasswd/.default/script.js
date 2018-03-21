$(function(){
	$('[name="lsiconfform"]').on('submit', function(event){
		var $this = $(this);
		$this.find('input,button').attr('disabled', 'disabled').addClass('disabled');
		$this.find('.errors').html('');
		
		var minLength = parseInt($this.find('[name="USER_PASSWORD"]').attr('data-minlength'));
		var pass = $this.find('[name="USER_PASSWORD"]').val();
		var passConfirm = $this.find('[name="USER_CONFIRM_PASSWORD"]').val();
		if(minLength > 0 && pass.length < minLength){
			$this.find('.errors').html('<div class="alert alert-danger">' + $('#USER_PASSWORD').attr('data-error') + '</div>');
			$this.find('input,button').removeAttr('disabled').removeClass('disabled');
			return false;
		}else if(pass != passConfirm){
			$this.find('.errors').html('<div class="alert alert-danger">Повтор пароля не совпадает с паролем</div>');
			$this.find('input,button').removeAttr('disabled').removeClass('disabled');
			return false;
		}
		$this.find('input,button').removeAttr('disabled').removeClass('disabled');
		if(typeof(rsa_encode_lsiconfform) == "function"){
			rsa_encode_lsiconfform();
		}
		return true;
	});
});