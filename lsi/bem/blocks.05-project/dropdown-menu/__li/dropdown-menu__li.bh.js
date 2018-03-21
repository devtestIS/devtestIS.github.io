module.exports = function (bh) {
    bh.match('dropdown-menu__li', function (ctx, json) {
        ctx.tag('li')
            .content([
                {
                    elem: 'link',
                    tag: 'a',
                    attrs: {
                        href: '#',
                    },
                    content: ctx.content()
                }
            ], true)
    })
}