window.iv = window.iv || {};
window.iv.ui = window.iv.ui || {};

$(function () {
    var $slider = $('.slider-comparison');
    var sliderState = false;
    var $eq = $('.equalizer'),
        comparisonItem = $('.slider-comparison__item'),
        comparisonList = $('.comparison-list [data-eq]');

    var arrColumnFeature = [];

    $slider.on('init', function () {
        setTimeout(function () {
            equalizer();
        }, 300)

    });

    toogleSlider();

    $(window).resize(function () {
        setTimeout(function () {
            toogleSlider();
            equalizer();
        }, 500)

    })

    function equalizer() {
        if(!comparisonItem.length) return;

        comparisonItem.each(function () {
            arrColumnFeature.push($(this).find('[data-eq]'));
        });
         
        var lenColumn = arrColumnFeature.length;
        var lenItemInColumn = arrColumnFeature[0].length;

        for (var k = 0; k < lenItemInColumn; k++) {
            var hItem = [];
            for (var j = 0; j < lenColumn; j++) {
                var $item = $(arrColumnFeature[j][k]);
                $item.css('height', 'auto');
                hItem.push($item.outerHeight());
            }
            var $comparisonListItem = $(comparisonList[k]);
            hItem.push($comparisonListItem.outerHeight());
            var maxMath = Math.max.apply(null, hItem);
            for (var j = 0; j < lenColumn; j++) {
                var $item = $(arrColumnFeature[j][k]);
                $item.css('height', maxMath);
                $item.css('line-height', maxMath+'px');
            }
            $comparisonListItem.css('height', maxMath);
        }
        arrColumnFeature = [];

    }

    function toogleSlider() {
        var grid = window.iv.ui.getGridPoint();
        //фильтр разрешений
        if (grid === 'sm' || grid === 'xs') {
            if (!sliderState) return;
            $slider.slick('unslick');
            sliderState = false;
        } else {
            if (sliderState) return;
            $slider.slick({
                dots: false,
                arrows: true,
                infinite: false,
                speed: 300,
                slidesToShow: 3,
                slidesToScroll: 1,
                autoplay: false,
                autoplaySpeed: 2000,
                responsive: [
                    {
                        breakpoint: 1200,
                        settings: {
                            slidesToShow: 2,
                        }
                    },
                ]
            });
            sliderState = true;
        }
    }


    window.iv.ui.toogleSlider = toogleSlider;

})