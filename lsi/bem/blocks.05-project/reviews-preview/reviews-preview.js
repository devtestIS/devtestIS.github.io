window.iv = window.iv || {};
window.iv.ui = window.iv.ui || {};

$(function($){
    var text = $('.reviews-preview__text');
    text.readmore({
        collapsedHeight: 100,
        speed: 175,
        moreLink: '<a href="#">Показать полностью</a>',
        lessLink: '<a href="#">Свернуть</a>'
    })


});

