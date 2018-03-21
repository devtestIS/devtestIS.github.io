(function(e){
    e.closest = e.closest || function(css){
        var node = this;
        
        while (node) {
            if (node.matches(css)) return node;
            else node = node.parentElement;
        }
        return null;
    }
})(Element.prototype);

(function () {
    document.addEventListener('OnDocumentHtmlChanged', function () {
        var loaderButtons = document.querySelectorAll('.change-button__loader');
        
        for (var i = 0; i < loaderButtons.length; i++) {
            selectLoader(loaderButtons[i]);
        }
    }, false);
    
    function selectLoader (element) {
        if (element.getAttribute('data-init') !== 'init') {
            element.setAttribute('data-init', 'init');
    
            element.addEventListener('change', function (e) {
                var field = e.currentTarget,
                    files = field.files,
                    gallery = field.closest('.company__property').querySelector('.thumbnails-gallery'),
                    modalId = gallery.closest('.modal').getAttribute('id'),
                    targetContent = document.querySelector('[data-target="#' + modalId + '"]').closest('.company').length !== 0 ?  document.querySelector('[data-target="#' + modalId + '"]').closest('.company').querySelector('.thumbnails-gallery') : document.querySelector('[data-target="#' + modalId + '"]').closest('.collapse-section').querySelector('.thumbnails-gallery');
    
                var imageList = gallery.querySelectorAll('.thumbnails-gallery__item'),
                    imageListTarget;
    
                for (var i = 0; i < imageList.length; i++) {
                    if (imageList[i].hasAttribute('image-number')) {
                        gallery.removeChild(imageList[i]);
                    }
                }
    
                if (targetContent) {
                    imageListTarget = targetContent.querySelectorAll('.thumbnails-gallery__item');
        
                    for (var i = 0; i < imageListTarget.length; i++) {
                        if (targetContent.hasAttribute('image-number')) {
                            targetContent.removeChild(imageListTarget[i]);
                        }
                    }
                }
    
                for (var i = 0; i < files.length; i++) {
                    var file = files[i];
                    createImage(gallery, file, targetContent, i);
                }
            }, false);
        }
    }
    
    function createImage(gallery, file, targetContent, number) {
        var figure = document.createElement('figure'),
            remove = document.createElement('a'),
            icon = document.createElement('i'),
            image = document.createElement('img');
        
        figure.appendChild(image);
        remove.appendChild(icon);
        figure.appendChild(remove);
        figure.classList.add('thumbnails-gallery__item');
        remove.classList.add('remove-item');
        remove.href = 'javascript:void(0);';
        icon.classList.add('icomoon', 'icon',  'icon-close');
        image.classList.add('thumbnails-gallery__image');
        figure.setAttribute('image-number', number);
        
        gallery.appendChild(figure);
    
        var reader = new FileReader();
        reader.onload = (function(aImg) { return function(e) { aImg.src = e.target.result; }; })(image);
        reader.readAsDataURL(file);
        
        if (targetContent) {
            var figureClone = figure.cloneNode(true),
                cloneRemove = figureClone.querySelector('.remove-item'),
                imageClone = figureClone.querySelector('.thumbnails-gallery__image');
            figureClone.removeChild(cloneRemove);
            targetContent.appendChild(figureClone);
    
            var readerClone = new FileReader();
            readerClone.onload = (function(aImg) { return function(e) { aImg.src = e.target.result; }; })(imageClone);
            readerClone.readAsDataURL(file);
        }
    }
})();

