module.exports = function (bh) {
    bh.match('reviews-preview__img', function (ctx, json) {
        ctx.tag('a')
            .attrs({
                href: '#'
            })
    })
}