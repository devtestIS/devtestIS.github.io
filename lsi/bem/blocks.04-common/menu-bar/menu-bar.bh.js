module.exports = function (bh) {
    bh.match('menu-bar', function (ctx, json) {
        ctx.tag('bottom')
            .attrs({
                type: 'button'
            })
        ctx.content([
            {
                elem: 'icon',
            },
            {
                elem: 'icon',
            },
            {
                elem: 'icon',
            },

        ])
    })
}