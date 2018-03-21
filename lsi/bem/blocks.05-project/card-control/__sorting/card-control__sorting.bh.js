module.exports = function (bh) {
    bh.match('card-control__sorting', function (ctx, json) {
        ctx.tag('a')
            .attrs({
                href: '#'
            })
    })
}