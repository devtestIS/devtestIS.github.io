$('.collapse').on('shown.bs.collapse hidden.bs.collapse', function (e) {
   var $target = $(e.currentTarget),
       $button = $target.siblings('button'),
       $icon = $button.children('i'),
       $container = $target.parent('.collapse-section');
    $button.toggleClass('collapse-section__title_expanded');
    $icon.toggleClass('icon-arrow-expand icon-arrow-collapse');
    $container.toggleClass('collapse-section_expanded');
});
