$(function(){
	$('#modalCallback').find('.ajax-error').hide();

	$('#modalCallbackForm [name="PHONE"]').inputmask({
		"mask": "+7(999)999-99-99"
	});

	$('#modalCallbackForm').submit(function(){
		$('#modalCallbackForm button[type="submit"]').attr('disabled', 'disabled');
		$('#modalCallback').find('.ajax-error').hide();
		var form = $(this);
		form.find('.form-group')
			.removeClass('has-error')
			.find('div.text-danger')
			.hide();
		var phone = form.find('[name="PHONE"]');
		var re = /\+7\(\d{3}\)\d{3}-\d{2}-\d{2}/, m;
		if ((m = re.exec(phone.val())) === null) {
			phone.closest('.form-group')
				.addClass('has-error')
				.find('div.text-danger')
				.show();
			$('#modalCallbackForm button[type="submit"]').removeAttr('disabled');
			return false;
		}

		var formData = {};
		form.find('input,select,textarea').each(function(){
			var obj = $(this);
			formData[obj.attr('name')] = obj.val();
		});

		$.ajax({
			method: "POST",
			url: "/?ajaxRequest=Y",
			data: formData,
			dataType: 'json',
			success: function (data) {
				if(data && data.RESULT == 'OK'){
					$('#modalCallback').modal('hide');
					$('#modalCallbackSuccess').modal('show');
				}else if(data && data.ERRORS){
					$('#modalCallback').find('.ajax-error').html(data.ERRORS.join('<br />')).show();
				}else{
					$('#modalCallback').find('.ajax-error').html('Возникли некоторые проблемы. Попробуйте позже.').show();
				}
			},
			error: function() {
				$('#modalCallback').find('.ajax-error').html('Возникли некоторые проблемы. Попробуйте позже.').show();
			},
			complete: function () {
				$('#modalCallbackForm button[type="submit"]').removeAttr('disabled');
			}
		});

		return false;
	});

	$('#modalCallbackSuccess button').click(function () {
		$('#modalCallbackSuccess').modal('hide');
	});
});