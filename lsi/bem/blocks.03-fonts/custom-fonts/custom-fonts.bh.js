/**
 * См. файлы font-faces.css и font-faces.js для настройки
 *
 * В 99% случаев код ниже это не те дроиды, которых вы ищите :)
 */


module.exports = function (bh) {

    bh.match('deferred-head-strings', function (ctx, json) {
        var fs = require('fs'),
            path = require('path');

        var observerConfig = require(path.join(__dirname, 'config.js')),
            observerJson = JSON.stringify(observerConfig);

        return [
            json,
            {
                tag: 'script',
                attrs: {'data-skip-moving': 'true'},
                content: [
                    '/* beautify preserve:start */',
                    '!function(){"use strict";for(var a=' + observerJson + ',b=[],c=0;c<a.length;c++){var d=a[c];d[1]=d[1]||{},d[2]=d[2]||null,d[3]=d[3]||3e4;var e=new FontFaceObserver(d[0],d[1]);b.push(e.check(d[2],d[3]))}b.length>0&&Promise.all(b).then(function(){document.documentElement.className+=" custom-fonts-loaded"})}();',
                    '/* beautify preserve:end */'
                ]
            }
        ];
    });

};

// Исходный скрипт наблюдателя
//(function () {
//    'use strict';
//
//    var customFonts = [
//        // insert custom font config
//    ];
//
//    var promices = [];
//    for (var i = 0; i < customFonts.length; i++) {
//        var observerArgs = customFonts[i];
//        observerArgs[1] = observerArgs[1] || {};
//        observerArgs[2] = observerArgs[2] || null;
//        observerArgs[3] = observerArgs[3] || 30000;
//
//        var observer = new FontFaceObserver(observerArgs[0], observerArgs[1]);
//        promices.push(observer.check(observerArgs[2], observerArgs[3]));
//    }
//
//    if (promices.length > 0) {
//        Promise.all(promices).then(function () {
//            document.documentElement.className += " custom-fonts-loaded";
//        });
//    }
//})();
