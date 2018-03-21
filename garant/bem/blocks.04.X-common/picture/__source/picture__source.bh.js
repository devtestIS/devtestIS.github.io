module.exports = function (bh) {

    bh.match('picture__source', function (ctx, json) {
        ctx
            .tag('source')
            .attr('srcset', json.srcset)
            .attr('media', json.media);
    });

};
