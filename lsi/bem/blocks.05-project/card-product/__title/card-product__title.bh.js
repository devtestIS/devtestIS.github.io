module.exports = function (bh) {
    bh.match('card-product__title', function (ctx, json) {
        ctx.tag('a')
            .attrs({
                href: '#'
            });
    });
}