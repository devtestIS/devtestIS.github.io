module.exports = function(bh) {

    bh.match('deferred-head-strings', function(ctx, json) {
        return [
            json,
            {
                tag: 'script',
                attrs: {'data-skip-moving': 'true'},
                content: [
                    '/* beautify preserve:start */',
                    '!function(){"use strict";var a=new FontFaceObserver("FontAwesome");a.check("&#xf024;").then(function(){document.documentElement.className+=" fa-font-loaded"},function(){document.documentElement.className+=" fa-font-loaded"})}();',
                    '/* beautify preserve:end */'
                ]
            }
        ];
    });

};

// Исходный скрипт
// (function(){
//    'use strict';
//    var faObserver = new FontFaceObserver('FontAwesome');
//
//    // Check symbol required https://github.com/bramstein/fontfaceobserver/issues/34
//    faObserver.check('&#xf024;').then(function () {
//        document.documentElement.className += " fa-font-loaded";
//    }, function () {
//        // Safari bug ugly workaround
//        document.documentElement.className += " fa-font-loaded";
//    });
// })();
