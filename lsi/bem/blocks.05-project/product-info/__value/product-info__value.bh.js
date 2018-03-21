module.exports = function (bh) {
    bh.match('product-info__value', function (ctx, json) {
        ctx.content([
            {
                elem: 'span',
                tag: 'span',
                content: ctx.content()
            }
        ], true)
    })
};