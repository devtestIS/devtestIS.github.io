module.exports = function (bh) {
    bh.match('menu-page', function (ctx, json) {
        ctx.tag('ul')
    })
}