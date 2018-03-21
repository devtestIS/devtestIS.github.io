module.exports = function (bh) {
    bh.match('footer-list', function (ctx, json) {
        ctx.tag('ul')
    })
}