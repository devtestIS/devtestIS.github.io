module.exports = function (bh) {
    bh.match('buy-one-click', function (ctx, json) {
        ctx.content([
            {
                elem: 'link',
                tag: 'a',
                attrs: {
                    'data-toggle': 'modal',
                    href: '#modal-buy-one-click'
                },
                content: ctx.content()
            }
        ], true)
    })
};