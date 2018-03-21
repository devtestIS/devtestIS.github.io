$(function () {
    $(window).on('resize load', function(){
        $('[data-dotdotdot="true"]').dotdotdot();
        setTimeout(function(){
            $('[data-dotdotdot="true"]').dotdotdot();
        }, 6000);

    });
})