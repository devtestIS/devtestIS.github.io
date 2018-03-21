window.iv = window.iv || {};
window.iv.ui = window.iv.ui || {};

$(function($){
    var obj = {
        _dom: {},
        _flag: { fixed: false },
        _var: {}
    };

    var init = function(){
        obj._dom = {
            headerMid: $('.header__mid'),
            header: $('.header'),
            headerTop: $('.header__top'),
            product: $('.product-detail')
        },
        scrolling();
    }

    var scrolling = function(){
        var headerHeight = obj._dom.header.outerHeight();
        var headerTopHeight = obj._dom.headerTop.outerHeight();
        var fullHeight = headerHeight + $('.menu-line').outerHeight();
        var grid = iv.ui.getGridPoint();
        if (grid === 'lg' || grid === 'md') {
            obj._dom.header.css({height: headerHeight});
        }

        $(window).scroll(function (e) {
            var productPosition = obj._dom.product.length && obj._dom.product.offset().top;
            var h = $(window).scrollTop();
            if (h > fullHeight) {
                headerFixed();
                if(productPosition && productPosition <= h){
                    obj._dom.headerMid.addClass('header__mid_active_product');
                }else{
                    obj._dom.headerMid.removeClass('header__mid_active_product');
                }
            } else if (h <= headerTopHeight) {
                headerStatic(h - $('.menu-line').outerHeight());
                obj._dom.headerMid.removeClass('header__mid_active_product');
            }
        });
    };

    var headerFixed = function () {
        var grid = window.iv.ui.getGridPoint();
        if (grid === 'xs' || grid === 'sm') return;
        if (obj._flag.fixed) return;
        obj._dom.headerMid.addClass('header__mid_active').css({top: '-100px'}).animate({top: 0});
        obj._flag.fixed = true;
    };

    var headerStatic = function () {
        if (!obj._flag.fixed) return;
        obj._dom.headerMid.removeClass('header__mid_active');
        obj._flag.fixed = false;
    };



    var resize = function () {
        var grid = window.iv.ui.getGridPoint();
        if (grid === 'lg' || grid === 'md') return;
        obj._dom.header.css({height: ''});
    }

    window.iv.ui.fixedTop = init;

    $(window).on('load', init);
    $(window).on('resize', resize);
}(jQuery));
