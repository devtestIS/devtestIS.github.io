module.exports = function (bh) {
    bh.match('card-product__value-span', function (ctx, json) {
        ctx.tag('span')
    })
};