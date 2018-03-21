$(function(){
	if($('.buywith .card-product').length < 9) {
		return;
	}
	$('.buywith .card-product').each(function(i){
		if(i > 7){
			$(this).parent().hide();
		}else if(i == 7){
			var button = $('<div class="col-md-12 text-center"><a class="btn btn-lg btn-default" role="button" href="javascript:void(0)">Показать ещё</a></div>');
			button.insertAfter($(this).parent());
			button.on('click', 'a.btn', function(){
				$(this).closest('.buywith').find('.card-product').each(function(){
					$(this).parent().show();
				});
				initAdd2Compare();
				initAdd2Basket();
				checkFavoriteStars();
				$('[data-height="equal"]').each(function() {
					$(this).eqHeight('refresh');
				});
				$('[data-dotdotdot="true"]').dotdotdot();
				button.remove();
			});
		}
	});
});