(function () {
    document.addEventListener('OnDocumentHtmlChanged', function () {
        if ($('.tags-input').attr('data-init') !== 'init' && typeof TagsArray !== 'undefined') {
            var input = $('.tags-input'),
                substringMatcher = function(strs) {
                return function findMatches(q, cb) {
                    var matches, substringRegex;
                    matches = [];
                    substrRegex = new RegExp(q, 'i');
                    
                    $.each(strs, function(i, str) {
                        if (substrRegex.test(str)) {
                            matches.push(str);
                        }
                    });
            
                    cb(matches);
                };
            };
            
            input.tagsinput({
                typeaheadjs: {
                    name: 'tags',
                    source: substringMatcher(TagsArray)
                }
            });
            
            input.attr('data-init', 'init');
    
            $('input').on('beforeItemAdd', function(event) {
                var compare = true;
                
                for (var prop in TagsArray) {
                    if (TagsArray[prop] === event.item) {
                        compare = false;
                    }
                }
                
                event.cancel = compare;
            });
            
            input.on('itemAdded', function(event) {
                var modalId = $(this).parents('.modal').attr('id'),
                    targetContent = $('[data-target="#' + modalId + '"]').parents('.company').length !== 0 ?
                        $('[data-target="#' + modalId + '"]').parents('.company').find('[data-tags]') :
                        $('[data-target="#' + modalId + '"]').parents('.collapse-section').find('[data-tags]'),
                    link = document.createElement('a');
        
                
                if (targetContent.children().length !== 0) {
                    link.textContent = ', ' + event.item;
                } else {
                    link.textContent = event.item;
                }
                
                link.classList.add('a');
                link.setAttribute('href', '#');
                targetContent[0].appendChild(link);
            });
        }
    }, false);
})();
