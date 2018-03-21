module.exports = function (bh) {
    bh.match('card-control__grid', function (ctx, json) {
        ctx.tag('a')
            .attrs({
                href: '#'
            })
    })
}