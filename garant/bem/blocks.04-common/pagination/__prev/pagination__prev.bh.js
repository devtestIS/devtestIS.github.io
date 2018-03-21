module.exports = function (bh) {
    bh.match('pagination__prev', function (ctx, json) {
        ctx.tag('li')
            .content([
                {
                    elem: 'link',
                    tag: 'a',
                    attrs: {
                        href: '#',
                        'aria-label': 'Previous'
                    },
                    content: ctx.content()
                }
            ], true)
    })
}