module.exports = function (bh) {
    bh.match('video-link', function (ctx, json) {
        ctx.tag('a')
            .attrs({
                href: '#'
            })
    })
};