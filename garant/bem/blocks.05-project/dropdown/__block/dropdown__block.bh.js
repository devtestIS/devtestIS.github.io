module.exports = function (bh) {
    bh.match('dropdown__block', function (ctx, json) {
        ctx.mix({block: 'dropdown-menu'})
    })
}
