(function () {
    $(function(){
        $('.collapse').on('show.bs.collapse', function() {
            var id =  $(this).attr('id');
            var button = $('[data-target = "#' + id + '"]');
            button.addClass('collapse-button_active');
            
        });
        
        $('.collapse').on('hide.bs.collapse', function() {
            var id =  $(this).attr('id');
            var button = $('[data-target = "#' + id + '"]');
            button.removeClass('collapse-button_active');
        });
    });
})();
