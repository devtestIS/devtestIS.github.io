module.exports = function (bh) {
    bh.match('comparison-small-list__value', function (ctx, json) {
        ctx.content([
            {
                elem: 'value-span',
                tag: 'span',
                content: ctx.content()
            }
        ], true)
    })
};