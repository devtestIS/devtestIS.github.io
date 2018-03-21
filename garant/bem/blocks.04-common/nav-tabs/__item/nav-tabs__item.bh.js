module.exports = function (bh) {
    bh.match('nav-tabs__item', function (ctx, json) {
        ctx.tag('li')
            .attrs({
                role: 'presentation'
            })
            .content([
                {
                    elem: 'link',
                    tag: 'a',
                    attrs: {
                        href: '#' + json.for,
                        'aria-controls': json.for,
                        role: 'tab',
                        'data-toggle': 'tab'
                    },
                    content: ctx.content()
                }
            ], true)
    })
}
