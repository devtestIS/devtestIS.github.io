$(function(){
	$(document).on('click', '[data-action="prevReviewsPage"]', function(){
		var $this = $(this);
		$this.button('loading');

		$.post(
			$this.attr('href'),
			{'ajax': 'Y', 'action': 'prevReviewsPage'},
			function (data) {
				$this.closest('.row').replaceWith(data);
			}
		);

		return false;
	});

	$(document).on('click', '[data-action="nextReviewsPage"]', function(){
		var $this = $(this);
		$this.button('loading');

		$.post(
			$this.attr('href'),
			{'ajax': 'Y', 'action': 'nextReviewsPage'},
			function (data) {
				$this.closest('.row').replaceWith(data);
			}
		);

		return false;
	});
});