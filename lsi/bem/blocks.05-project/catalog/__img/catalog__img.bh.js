module.exports = function (bh) {
    bh.match('catalog__img', function (ctx, json) {
        ctx.tag('img')
            .attrs({
                src: '../../../images/' + json.url,
                alt: ''
            })
    })
}