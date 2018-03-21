module.exports = function (bh) {
    bh.match('dropdown__li', function (ctx, json) {
        ctx.tag('li')
            .content([
                {
                    block: 'link',
                    content: ctx.content()
                }
            ], true)
    })
}
