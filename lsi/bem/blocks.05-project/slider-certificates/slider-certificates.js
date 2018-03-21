$(function () {
    // $('.slider-certificates').on('init', function(event, slick, direction) {
    //     var container = $(event.delegateTarget);
    //
    //     container.on('click', '.slider-certificates__item', function () {
    //         var image = $(this).attr('high-res');
    //         $('#imageModal').find('img').attr('src', image)
    //         $('#imageModal').modal();
    //     })
    // });
    
    $('.slider-certificates').slick({
        infinite: true,
        slidesToShow: 5,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 1,
                }
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });
});