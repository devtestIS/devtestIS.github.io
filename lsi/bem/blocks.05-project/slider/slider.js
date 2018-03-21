window.iv = window.iv || {};
window.iv.ui = window.iv.ui || {};

window.iv.ui.slider = {
    init: function () {
        var $slider = $('.slider');
        
        if($slider.hasClass('.slick-initialized')) return;
        
        $slider.slick({
            dots: true,
            arrows: false,
            autoplay: true,
            autoplaySpeed: $slider.data('speed') || 8000,
        });
    }

};

$(function () {
    window.iv.ui.slider.init();
});