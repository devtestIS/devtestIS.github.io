window.iv = window.iv || {};
window.iv.ui = window.iv.ui || {};

window.iv.ui.sliderProductLine = {
    init: function () {
        var $slider = $('.slider-product-line');

        $slider.each(function (i) {
            var $this  = $(this)
            if($this.hasClass('.slick-initialized')) return;
            $this.slick({
                dots: true,
                arrows: false,
                autoplay: true,
                pauseOnHover:true,
                autoplaySpeed: $this.data('speed') || 8000,
                slidesToShow: 4,
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
    window.iv.ui.sliderProductLine.init();
});