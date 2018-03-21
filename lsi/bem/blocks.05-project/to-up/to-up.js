window.iv = window.iv || {};
window.iv.ui = window.iv.ui || {};
/**
 * Инициализирует работу кнопки "наверх в лайауте"
 */

window.iv.ui.toUp = {
    init: function () {
        var grid = window.iv.ui.getGridPoint();

        //если планшет с маленьким разрешением или телефон - не запускать
        if (grid === 'sm' || grid === 'xs') return;

        var $scrollToTopBtn = $('.to-up');

        setBtnVisibility($scrollToTopBtn);
        $(window).scroll(function(){
            setBtnVisibility($scrollToTopBtn);
        });

        //Click event to scroll to top
        $scrollToTopBtn.click(function(){
            $('html, body').animate({scrollTop : 0},100);
            return false;
        });

        function setBtnVisibility() {
            if ($(this).scrollTop() > 100) {
                $scrollToTopBtn.fadeIn();
            } else {
                $scrollToTopBtn.fadeOut();
            }
        }
    }

};

$(function () {
    window.iv.ui.toUp.init();
});