module.exports = function (bh) {
    bh.match('product-info__link', function (ctx, json) {
        ctx.tag('a')
            .attrs({
                href: '#'
            })
    })
}