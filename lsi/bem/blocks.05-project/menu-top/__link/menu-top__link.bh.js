module.exports = function (bh) {
    bh.match('menu-top__link', function (ctx, json) {
        ctx.tag('a')
    })
}