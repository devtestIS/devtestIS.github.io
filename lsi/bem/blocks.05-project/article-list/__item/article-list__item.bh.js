module.exports = function (bh) {
    bh.match('article-list__item', function (ctx, json) {
        ctx.tag('a')
            .attrs({
                href: '#'
            })
    })
}