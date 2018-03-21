module.exports = function (bh) {
    bh.match('menu__list', function (ctx, json) {
        ctx.tag('ul')
    })
}