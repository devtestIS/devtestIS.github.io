/*
$(function () {
    var rateBars = $('.comment-rating');
    
    rateBars.each(function () {
        $(this).hide();
        
        var pointsNumber = $(this).find('option').length,
            parentContainer = $(this).parent(),
            barPanel = $(document.createElement('span')),
            rateNumber = $(this).find('option:selected').val();
        
        barPanel.addClass('comment-rating__stars');
        parentContainer.append(barPanel);
        
        barPanel.on('click', 'i', function (e) {
            var target = $(e.currentTarget);
            barPanel.find('i').removeClass('fa-star');
            barPanel.find('i').addClass('fa-star-o');
            
            $.each(barPanel.find('i'), function () {
                if ($(this).attr('star-points') <= target.attr('star-points')) {
                    $(this).toggleClass('fa-star-o fa-star');
                }
            });
        });
        
        for (var i = 0; i < pointsNumber; i++) {
            var star = $(document.createElement('i')).addClass('fa fa-star-o');
            
            if (i < rateNumber) {
                star.toggleClass('fa-star-o fa-star');
            }
            
            star.attr('star-points', i);
            barPanel.append(star);
        }
    });
});*/
