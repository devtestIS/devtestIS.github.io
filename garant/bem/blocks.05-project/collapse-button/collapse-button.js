$(function(){
    $('.collapse-button').on(window.iv.ui.touchClick(), function(){

        var target = $(this).attr('data-target');

       var elem = $(target);

      elem.collapse('toggle');

    })
})