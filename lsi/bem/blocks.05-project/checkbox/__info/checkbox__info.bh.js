module.exports = function (bh) {
    bh.match('checkbox__info', function (ctx, json) {
        ctx.tag('span')
    })
}