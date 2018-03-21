if (window.frameCacheVars !== undefined)
{
	BX.addCustomEvent("onFrameDataReceived" , function(json) {
		initSlider();
	});
}

function initSlider() {
	$('.reviews__row').slick({
		infinite: true,
		slidesToShow: 2,
		slidesToScroll: 1,
		responsive: [
			{
				breakpoint: 768,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1
				}
			}
		]
	});
}