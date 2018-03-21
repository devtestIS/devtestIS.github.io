$(window).on('scroll load resize', function () {
    var scroll = (window.pageYOffset + window.innerHeight) - $('.footer').offset().top;
    if (scroll < 0) scroll = 0;
    $('.jivo-iframe-container-bottom').css({
        'margin-bottom': scroll + 'px'
    })
});