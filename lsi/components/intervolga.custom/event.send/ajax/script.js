$(function(){
	$('[name="PHONE"]')
		.removeAttr('required')
		.attr('data-required', 'required')
		.inputmask({
			"mask": "+7(999)999-99-99"
		});
});