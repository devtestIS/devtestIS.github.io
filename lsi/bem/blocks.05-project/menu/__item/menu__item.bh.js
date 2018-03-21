module.exports = function (bh) {
    bh.enableInfiniteLoopDetection(true);
    bh.match('menu__item', function (ctx, json) {
        ctx.tag('li')
            .content([
            {
                elem: 'link',
                tag: 'a',
                attrs: {
                    href: '#'
                },
                content: ctx.content()
            }
        ], true)
    })
}