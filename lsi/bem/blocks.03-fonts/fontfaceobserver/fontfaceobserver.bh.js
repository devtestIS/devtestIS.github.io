module.exports = function (bh) {

    bh.match('deferred-head-strings', function (ctx, json) {
        var fs = require('fs'),
            fontfaceobserverSource = fs.readFileSync('bower_components/fontfaceobserver/fontfaceobserver.js');

        return {
            tag: 'script',
            attrs: {'data-skip-moving': 'true'},
            content: [
                '/* beautify preserve:start */',
                fontfaceobserverSource.toString().replace(/\n/g, ''),
                '/* beautify preserve:end */'
            ]
        };
    });

};
