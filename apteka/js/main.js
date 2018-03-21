
$(function() {
	var catalogslider = $('.catalog-slider');
	if (catalogslider.length) {
		catalogslider.noUiSlider({
			 range: {
				'min': 0,
				'max': 2000
			}
			,start: [220,1000]
			,step: 1
			,connect: true
			,serialization: {
				lower: [
					$.Link({
						target: $('#input-number-left'),

					// The select element wont show
					// any decimals
						format: {
							decimals: 0
						}
					})
				],
				upper: [
					$.Link({
						target: $('#input-number-right'),
						
						// The select element wont show
					// any decimals
						format: {
							decimals: 0
						}
					})
				]
			}
		});
	}
	
});




