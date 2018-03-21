+function($){
    var $target = $('.menu-top__link_popover');
    if($target.length){
        $target.popover({
            html: true
        }).popover('show');

        $(document).on('click', function (e) {
            var link = $(e.target).closest('.popover').prev().attr('href');
            if($(e.target).closest('#YES_CITY').length){
                $(e.target).closest('.popover').popover('hide').popover('destroy');
            }

            if($(e.target).closest('#NO_CITY').length){
                $(e.target).closest('.popover').popover('hide').popover('destroy');
                $(link).modal('show');
            }
        })
    }
}(jQuery);