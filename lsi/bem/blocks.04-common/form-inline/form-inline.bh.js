module.exports = function (bh) {
    bh.match('form-inline', function (ctx, json) {
        ctx.tag('form')
    })
}
