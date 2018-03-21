module.exports = function (bh) {

    bh.match('deferred-head-strings', function (ctx, json) {
        return [
            json,
            {
                tag: 'script',
                attrs: {'data-skip-moving': 'true'},
                content: [
                    '/* beautify preserve:start */',
                    'document.createElement( "picture" );',
                    '/* beautify preserve:end */'
                ]
            }
        ];
    });

};
