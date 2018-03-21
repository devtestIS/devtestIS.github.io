$(function(){
	$(document).on('click', '[data-action="nextPage"]', function(){
		var $this = $(this);
		$this.button('loading');

		$.post(
			$this.attr('href'),
			{'ajax': 'Y', 'action': 'nextPage'},
			function (data) {
				history.pushState(null, null, $this.attr('href'));
				$this.closest('[data-type="pagination"]').before(data).remove();
				initAdd2Compare();
				initAdd2Basket();
				checkFavoriteStars();
				$("[data-toggle='tooltip']").tooltip();
				$('[data-height="equal"]').each(function() {
					$(this).eqHeight('refresh');
				});
				$('[data-dotdotdot="true"]').dotdotdot();
			}
		);

		return false;
	});
});