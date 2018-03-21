module.exports = function (bh) {
    bh.match('article-preview__title', function (ctx, json) {
        ctx.tag('a')
            .attrs({
                href: '#'
            })
    })
}