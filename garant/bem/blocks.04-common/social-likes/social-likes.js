/*=include ../../../bower_components/social-likes/src/social-likes.js */

+function($){
    var cls = 'social-likes';
    document.addEventListener('lazybeforeunveil', function(e){
        var $target = $(e.target);
        if($target.hasClass(cls))
            $target.socialLikes({
                counters: false
            });
    });

}(jQuery);

