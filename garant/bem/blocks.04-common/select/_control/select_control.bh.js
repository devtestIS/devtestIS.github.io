module.exports = function (bh) {
    bh.match('select_control', function (ctx, json) {
        ctx.mix({block: 'form-control'})
    })
}
