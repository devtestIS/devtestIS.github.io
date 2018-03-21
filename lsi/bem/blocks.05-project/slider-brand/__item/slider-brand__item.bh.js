module.exports = function (bh) {
    bh.match('slider-brand__item', function (ctx, json) {
        ctx.tag('a')
            .attrs({
                href: '#'
            })
    })
}