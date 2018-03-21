$(function(){
	$('[name="PHONE"]').removeAttr('required').inputmask({
		"mask": "+7(999)999-99-99"
	});
});