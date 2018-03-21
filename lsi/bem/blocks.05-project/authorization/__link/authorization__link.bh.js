module.exports = function (bh) {
    bh.match('authorization__link', function (ctx, json) {
        ctx.tag('a')
    })
}