(function () {
    document.addEventListener('OnDocumentHtmlChanged', function () {
        $('.thumbnails-gallery').on('click', '.remove-item',  function (e) {
            var target = $(this),
                item = target.parent(),
                gallery = target.parents('.thumbnails-gallery'),
                index = gallery.find('.thumbnails-gallery__item').index(item),
                modalId = gallery.parents('.modal').attr('id'),
                targetContent = $('[data-target="#' + modalId + '"]').parents('.company').length !== 0 ?  $('[data-target="#' + modalId + '"]').parents('.company').find('.thumbnails-gallery') : $('[data-target="#' + modalId + '"]').parents('.collapse-section').find('.thumbnails-gallery'),
                input = $('input[type="checkbox"][value="'+ target.attr('remove-item-id') +'"]');
            
            targetContent.find('.thumbnails-gallery__item').eq(index).remove();
            input.prop('checked', true);
            item.remove();
        });
    }, false);
})();