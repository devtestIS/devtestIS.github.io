module.exports = function (bh) {
    bh.match('slider__item', function (ctx, json) {
        ctx.tag('a')
            .attrs({
                href: '#'
            })
            .content([
                {
                    elem: 'img',
                    mix: [{block: 'img-responsive'}],
                    tag: 'img',
                    attrs: {
                        src: '../../../images/' + json.url,
                        alt: ''
                    }
                }
            ], true)
    })
}
