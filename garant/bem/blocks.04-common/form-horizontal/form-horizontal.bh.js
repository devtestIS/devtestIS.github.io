module.exports = function (bh) {
    bh.match('form-horizontal', function (ctx, json) {
        ctx.tag('form')
    })
}