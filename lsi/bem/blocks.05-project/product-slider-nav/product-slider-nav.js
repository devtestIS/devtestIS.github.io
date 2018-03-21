$(function () {
    $('.product-slider-nav').slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        asNavFor: '.product-slider',
        dots: false,
        centerMode: false,
        focusOnSelect: true,
    });
});