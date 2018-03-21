module.exports = function (bh) {
    bh.match('nav-tabs', function (ctx, json) {
        ctx.tag('ul')
            .attrs({
                role: 'tablist'
            })
    })
}