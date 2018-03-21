window.iv = window.iv || {};
window.iv.ui = window.iv.ui || {};

window.iv.ui.quickFilter = {
    _dom: {},
    flag: {
        openContent: false
    },
    init: function () {
        this._dom = {
            btn: $('.quick-filter__btn'),
            wrap: $('.quick-filter__wrap'),
            content: $('.quick-filter__collapse')
        };
        var self = this;
        this._dom.btn.click(function (e) {
            self.toggleContent();
        })
    },
    compare: function () {
        if(this._dom.content.outerHeight() > this._dom.wrap.outerHeight()) {
            this._dom.btn.css('display', 'block')
        } else {
            this._dom.btn.css('display', '')
        }
    },
    toggleContent: function () {
       if (!this.flag.openContent) {
           this.showContent();
           this._dom.btn.addClass('quick-filter__btn_active');
           this.flag.openContent = true;
       } else {
           this.hideContent();
           this._dom.btn.removeClass('quick-filter__btn_active');
           this.flag.openContent = false;
       }
    },
    showContent: function () {
        this._dom.wrap.css({
            'max-height': this._dom.content.outerHeight()
        });
    },
    hideContent: function () {
        this._dom.wrap.css({
            'max-height': ''
        });
    }

};

$(function () {
    window.iv.ui.quickFilter.init();
    window.iv.ui.quickFilter.compare();
    $(window).resize(function () {
        window.iv.ui.quickFilter.compare();
    });
})