window.iv = window.iv || {};
window.iv.ui = window.iv.ui || {};

window.iv.ui.sliderSeason = {
    init: function () {
        var $slider = $('.slider-season');

        if ($slider.hasClass('.slick-initialized')) return;
        $slider.each(function (i) {
            var $this = $(this)
            if ($this.hasClass('.slick-initialized')) return;
            $this.slick({
                dots: true,
                arrows: false,
                autoplay: true,
                autoplaySpeed: $this.data('speed') || 8000,
                responsive: [
                    {
                        breakpoint: 1200,
                        settings: {
                            slidesToShow: 2
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 1
                        }
                    }
                ]
            });
        })
    }


};

$(function () {
    window.iv.ui.sliderSeason.init();
});