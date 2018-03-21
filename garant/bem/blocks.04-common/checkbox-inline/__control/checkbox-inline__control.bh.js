module.exports = function (bh) {
    bh.match('checkbox-inline__control', function (ctx, json) {
        ctx.bem(false)
            .tag('input');
    })
}