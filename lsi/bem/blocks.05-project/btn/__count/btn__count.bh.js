module.exports = function (bh) {
    bh.match('btn__count', function (ctx, json) {
        ctx.tag('span')
    })
}