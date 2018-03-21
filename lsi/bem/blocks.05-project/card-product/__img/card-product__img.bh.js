module.exports = function (bh) {
    bh.match('card-product__img', function (ctx, json) {
        ctx.tag('a')
            .attrs({
                href: '#'
            })
    })
}