module.exports = function (bh) {
    bh.match('p', function (ctx, json) {
        ctx.tag('p')
    })
}
