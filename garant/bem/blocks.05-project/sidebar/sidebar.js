window.iv = window.iv || {};
window.iv.ui = window.iv.ui || {};

var sidebar = $('.sidebar');
var topPoint;
var sidebarHeight;

$(window).on('load resize', function(){
  topPoint = $('.collapse_sidebar').offset().top ;
  sidebarHeight =  $('.sidebar').outerHeight();

})

window.iv.ui.sidebar =  {
  init: function(){
    if($(document).width() < 767 || !topPoint){return}
    var scrollTop = $(window).scrollTop();

    var offersBottom = $('.offer-item:last-child').offset().top + $('.offer-item:last-child').outerHeight();


    if(scrollTop > (topPoint)  && scrollTop < ((offersBottom - sidebarHeight))){
      sidebar.css('top', '0px');
      sidebar.addClass('sidebar_active');
    }else if(scrollTop > (offersBottom - sidebarHeight)){
      // sidebar.addClass('sidebar_active');
      // sidebar.css('top', '-' + (scrollTop - (offersBottom - sidebarHeight)) + 'px');
      sidebar.removeClass('sidebar_active');
      sidebar.css('top', '' + (offersBottom - sidebarHeight - topPoint) + 'px');

    }else if(scrollTop < ( topPoint - 30)){
      sidebar.removeClass('sidebar_active');
    }

  },



    reinit : function(){

      var offersBottom = $('.offer-item:last-child').offset().top + $('.offer-item:last-child').outerHeight();
    if($(window).scrollTop() > (topPoint)  && $(window).scrollTop() < ((offersBottom - sidebarHeight))){
      sidebar.animate({top : 0}, 400);
    }else if($(window).scrollTop() > (offersBottom - sidebarHeight)){
      sidebar.animate({top : -(($(window).scrollTop() - (offersBottom - sidebarHeight)))}, 400);

    }
  }
  
};


$(window).on('scroll resize', window.iv.ui.sidebar.init);
document.addEventListener("OnDocumentHtmlChanged", function () {

  window.iv.ui.sidebar.reinit();


});
