module.exports = function (bh) {
    bh.match('title-page', function (ctx, json) {
        ctx.tag('h1')
    })
}
