module.exports = function (bh) {
    bh.match('brand-link', function (ctx, json) {
        ctx.content([
            {
                elem: 'img',
                content: [
                    {
                        block: 'img-responsive',
                        url: 'catalog/img-3.jpg'
                    }
                ]
            },
            {
                elem: 'a',
                tag: 'a',
                attrs: {
                    href: '#'
                },
                content: ctx.content()
            }
        ], true)
    })
}