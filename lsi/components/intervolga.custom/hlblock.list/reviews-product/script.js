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

	$('#modal-write-a-review [name="ITEM[UF_TEL]"]').inputmask({
		"mask": "+7(999)999-99-99"
	});
});