window.iv = window.iv || {};
window.iv.ui = window.iv.ui || {};

var toUp = $('.to-up');
window.iv.ui.toUp = {
    scroll : function() {
      var scrolled = $(window).scrollTop();
      if (scrolled > 0) {
        toUp.addClass('to-up_active');
      } else {
        toUp.removeClass('to-up_active');
      }
    },
    init: function(){
      toUp.on(window.iv.ui.touchClick(), function(){
        var scrolled = $(window).scrollTop();
        $('html, body').animate({scrollTop: 0}, scrolled / 3);


      });
    }
};


$(function(){
  window.iv.ui.toUp.init();
  $(window).on('scroll', window.iv.ui.toUp.scroll);
})