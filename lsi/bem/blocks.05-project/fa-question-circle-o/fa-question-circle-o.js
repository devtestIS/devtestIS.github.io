$(window).on('load resize', function () {
    var grid = iv.ui.getGridPoint();
    $('[data-toggle="popover-question"]')
        .popover('destroy')
        .popover({
            placement: grid === 'xs' ? 'top': 'right',
            trigger: 'hover',
            container: 'body'
    });
});
