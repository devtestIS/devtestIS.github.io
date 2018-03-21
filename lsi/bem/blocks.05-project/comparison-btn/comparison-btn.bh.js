module.exports = function (bh) {
    bh.match('comparison-btn', function (ctx, json) {
        ctx.tag('a')
            .attrs({
                href: '#'
            })
    })
}