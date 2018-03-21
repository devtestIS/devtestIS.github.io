module.exports = function (bh) {
    bh.match('catalog__list', function (ctx, json) {
       ctx.tag('ul')
    })
}
