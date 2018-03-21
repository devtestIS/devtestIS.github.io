window.iv = window.iv || {};
window.iv.ui = window.iv.ui || {};

window.iv.ui.catalogControl = {
    _dom: {},
    init: function() {
        this._dom = {
            control: $('.catalog-control'),
            catalog: $('.catalog_menu'),
            menuList: $('.menu__list')
        };
        var self = this;
        var touchClick = window.iv.ui.touchClick();

        self._dom.control.on(touchClick, function (e) {
            e.preventDefault();
            if(self._dom.control.data('catalog') == 'close'){
                self.showCatalog();
                if(window.iv.ui.getGridPoint() === 'xs') {
                    self._dom.menuList.slideUp();
                }
            } else {
                self.hideCatalog();
            }
        })
    },
    showCatalog: function (e) {
        this._dom.catalog.removeClass('catalog_out-up');
        this._dom.catalog.addClass('catalog_in-down');
        this._dom.control.data('catalog', 'open');
        this._dom.control.addClass('open');
    },
    hideCatalog: function (e) {
        if (!this._dom.catalog.hasClass('catalog_in-down')) return;
        this._dom.catalog.removeClass('catalog_in-down');
        this._dom.catalog.addClass('catalog_out-up');
        this._dom.control.data('catalog', 'close');
        this._dom.catalog.on('transitionend webkitTransitionEnd oTransitionEnd', function () {
       
        });
        this._dom.control.removeClass('open');
    }
};
$(function(){
    window.iv.ui.catalogControl.init();
});