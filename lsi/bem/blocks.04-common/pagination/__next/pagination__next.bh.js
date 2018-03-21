module.exports = function (bh) {
    bh.match('pagination__next', function (ctx, json) {
        ctx.tag('li')
            .content([
                {
                    elem: 'link',
                    tag: 'a',
                    attrs: {
                        href: '#',
                        'aria-label': 'Next'
                    },
                    content: ctx.content()
                }
            ], true)
    })
}