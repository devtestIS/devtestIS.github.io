module.exports = function (bh) {
    bh.match('title-line__link', function (ctx, json) {
        ctx.tag('a')
            .attrs({
                href: '#'
            })
    })
}