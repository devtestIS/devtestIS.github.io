$(function(){


    var $html = $('html');



    $('.dropdown__toggle').hover(function () {
        if ($html.hasClass('touch')) {return;}

        $('.dropdown').removeClass('open');
        $(this).closest($('.dropdown')).addClass('open');

        $(this).closest($('.dropdown')).on('mouseleave', function () {
            var $this = $(this).closest($('.dropdown'));
            $this.removeClass('open');
        })


    });

})