module.exports = function (bh) {
    bh.match('small', function (ctx, json) {
        ctx.tag('small')
    })
};