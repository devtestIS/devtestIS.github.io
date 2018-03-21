$(function(){
	$(document).on('click', '[data-action="prevPage"]', function(){
		var $this = $(this);
		$this.button('loading');

		$.post(
			$this.attr('href'),
			{'ajax': 'Y', 'action': 'prevPage'},
			function (data) {
				history.pushState(null, null, $this.attr('href'));
				$this.closest('[data-type="pagination"]').before(data).remove();
				$this.closest('[data-type="pagination"]').after(data).remove();
				initAdd2Compare();
				initAdd2Basket();
				checkFavoriteStars();
				$('[data-height="equal"]').each(function() {
					$(this).eqHeight('refresh');
				});
				$('[data-dotdotdot="true"]').dotdotdot();
			}
		);

		return false;
	});
});