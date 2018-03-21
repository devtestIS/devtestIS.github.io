window.iv = window.iv || {};
window.iv.ui = window.iv.ui || {};

window.iv.ui.menuTop = {
    _dom: {},
    flag: false,
    init: function () {
        this._dom = {
            btn: $('.menu-top__btn'),
            menuWrap: $('.menu-top__wrap')
        };
        var self = this;

        var touchClick = window.iv.ui.touchClick();

        this._dom.btn.on(touchClick, function (e) {
            self.toggleMenu(e);
        });
        this.clickNoTarget();
        this.filter();
    },
    toggleMenu: function (e) {
        if (this.flag) {
            this.hideMenu();
        } else {
            this.showMenu();
        }

    },
    showMenu: function () {
        this._dom.menuWrap.show();
        this.flag = true;
    },
    hideMenu: function () {
        this._dom.menuWrap.hide();
        this.flag = false;
    },
    clickNoTarget: function (e) {
        var self = this;
        var touchClick = window.iv.ui.touchClick();
        $(document).on(touchClick, function (e) {
            if (!self.flag) return;
            if (!self._dom.menuWrap.is(e.target)
                && self._dom.menuWrap.has(e.target).length === 0
                && !self._dom.btn.is(e.target)
                && !self._dom.btn.find(e.target).length > 0) {
                self.hideMenu();
            }
        });
    },
    filter: function () {
        var self = this;
        var oldGrid = window.iv.ui.getGridPoint();
        $(window).resize(function () {
            var grid = window.iv.ui.getGridPoint();
            if (oldGrid === grid) return;
            oldGrid = grid;
            if (grid == 'lg') {
                self._dom.menuWrap.show();
            } else {
                self._dom.menuWrap.hide();
            }
        });
    }
};
$(function () {
    window.iv.ui.menuTop.init();
})