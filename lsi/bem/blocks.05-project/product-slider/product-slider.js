
function slideAndStopVideo(slide) {
    var $slide = $(slide);
    $slide.slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: '.product-slider-nav',
    });
    $slide.on('beforeChange', function (event, slick, currentSlide, nextSlide) {
        var slide = $(this).find('.slick-active');
        if (slide.hasClass('product-slider__video')) {
            slide.find('.video-youtube')[0].contentWindow.postMessage('{"event":"command","func":"' + 'stopVideo' + '","args":""}', '*');
        }
    });
}
$(function () {
    slideAndStopVideo('.product-slider')
});