module.exports = function (bh) {

    bh.match('picture__source', function (ctx, json) {
        ctx
            .bem(false)
            .content(false, true)
            .tag('source')
            .attrs({
                srcset: json.srcset || '',
                media: json.media || '',
            });
    });

};
