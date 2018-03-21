window.iv = window.iv || {};
window.iv.ui = window.iv.ui || {};
/**
 *  elem = Node Element
 * @param elem
 */
window.iv.ui.noCloseDropdown = function (elem) {
    $(elem).on({
        "shown.bs.dropdown": function () {
            this.closable = false;
        },
        "click": function (e) {
            if ($(this).has(e.target) ) {
                this.closable = true;
            }
        },
        "hide.bs.dropdown": function (e) {
            var closable = this.closable ? false : true;
            this.closable = false;
            return closable;
        }
    });
}
