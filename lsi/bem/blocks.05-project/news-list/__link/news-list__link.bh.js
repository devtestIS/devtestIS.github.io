module.exports = function (bh) {
    bh.match('news-list__link', function (ctx, json) {
        ctx.tag('a')
            .attrs({
                href: '#'
            })
    })
}