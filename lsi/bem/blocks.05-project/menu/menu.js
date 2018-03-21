window.iv = window.iv || {};
window.iv.ui = window.iv.ui || {};

window.iv.ui.menu = {
    _dom: {},
    init: function () {
        this._dom = {
            btn: $('.menu__btn'),
            list: $('.menu__list')
        };

        var self = this;
        var touchClick = window.iv.ui.touchClick();
        this._dom.btn.on(touchClick, function (e) {
            self._dom.list.slideToggle(function () {
                window.iv.ui.catalogControl.hideCatalog();
            });
        });
        var oldGrid = window.iv.ui.getGridPoint();
        $(window).resize(function () {
            var grid = window.iv.ui.getGridPoint();
            if (oldGrid === grid) return;
            oldGrid = grid;
            if (grid !== 'xs') {
                self._dom.list.show();
            } else {
                self._dom.list.hide();
            }
        });

    }
};
$(function () {
    window.iv.ui.menu.init();
});