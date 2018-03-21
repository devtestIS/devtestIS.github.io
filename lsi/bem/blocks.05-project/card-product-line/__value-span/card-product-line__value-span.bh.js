module.exports = function (bh) {
    bh.match('card-product-line__value-span', function (ctx, json) {
        ctx.tag('span')
    })
};