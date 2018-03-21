module.exports = function (bh) {
    bh.match('card-product-line__title', function (ctx, json) {
        ctx.tag('a')
            .attrs({
                href: '#'
            });
    })
}