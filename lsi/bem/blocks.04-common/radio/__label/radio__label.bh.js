module.exports = function (bh) {
    bh.match('radio__label', function (ctx, json) {
        ctx.bem(false)
            .tag('label');
    })
}