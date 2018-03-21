module.exports = function (bh) {
    bh.match('checkbox-inline__label', function (ctx, json) {
        ctx.bem(false)
            .tag('label');
    })
}