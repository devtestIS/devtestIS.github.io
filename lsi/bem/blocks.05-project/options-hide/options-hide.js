$(function () {
    var $options = $('[data-options-hide]');
    $options.readmore({
        collapsedHeight: 168,
        speed: 175,
        moreLink: '<div class="options-hide__show"><a class="btn btn-default" href="#">Ещё</a></div>',
        lessLink: '<div class="options-hide__hide"><a class="btn btn-default" href="#">Свернуть</a></div>'
    })
})