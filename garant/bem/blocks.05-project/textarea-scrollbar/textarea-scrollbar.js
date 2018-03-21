(function () {
    var element = document,
        events = [
            'OnDocumentHtmlChanged',
            'DOMContentLoaded'
        ];
    
    function createEventListener(element, events, fn) {
        for (var i = 0; i < events.length; i++) {
            element.addEventListener(events[i], fn, false)
        }
    }
    
    createEventListener(element, events, function () {
        $('.textarea-scrollbar').scrollbar();
        $('.scrollbar-inner').scrollbar();
    });
    
})();
