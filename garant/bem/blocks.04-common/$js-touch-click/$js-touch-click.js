window.iv = window.iv || {};
window.iv.ui = window.iv.ui || {};

window.iv.ui.touchClick = function () {
    var isIOS = ((/iphone|ipad/gi).test(navigator.appVersion));
    var touchClick = isIOS ? "touchstart" : "click";
    return touchClick;
};
