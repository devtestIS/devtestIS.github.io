module.exports = function (bh) {
    bh.match('soc__item', function (ctx, json) {
        ctx.tag('a')
            .attrs({
                href: '#'
            })
            .content({
                elem: 'img',
                tag: 'img',
                attrs: {
                    src: '../../../images/' + json.url,
                    alt: ''
                }
            }, true)
    })
}