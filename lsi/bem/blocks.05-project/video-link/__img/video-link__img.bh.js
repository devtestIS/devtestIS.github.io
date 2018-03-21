module.exports = function (bh) {
    bh.match('video-link__img', function (ctx, json) {
        ctx.tag('img')
            .attrs({
                src: '../../../images/' + json.url
            })
    })
};