$(function(){
  $('.slider-main').slick({
    slidesToShow: 2,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 4000,
    prevArrow: '<svg class="slider-main__arrow slider-main__arrow_prev "><use xlink:href="#arrow_prev"></use>',
    nextArrow: '<svg class="slider-main__arrow slider-main__arrow_next "><use xlink:href="#arrow_next"></use>',
    responsive: [
      {
        breakpoint: 1100,
        settings: {
          slidesToShow: 1
        }
      },
      {
        breakpoint: 767,
        settings: {
          slidesToShow: 1,
         arrows: false
        }
      }
      ]

  });
});