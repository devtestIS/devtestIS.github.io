$(function(){
    $('.navbar-toggle').on(window.iv.ui.touchClick(), function(){

        $(this).toggleClass('nav-icon-active');

        $('.header').toggleClass('header-container-active');
        $('.header-container__container').toggleClass('header-container-active');


        var target = $(this).attr('data-target');
        var arr = target.split('');
        arr.splice(arr.indexOf('#'), 1);
        var id = arr.join('');
        var elem = $('.collapse[id = ' + id + ']');
        elem.collapse('toggle');
    })

})