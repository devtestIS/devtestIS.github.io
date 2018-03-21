module.exports = function (bh) {
    bh.match('dropdown__list', function (ctx, json) {
        ctx.tag('ul')
            .mix({block: 'dropdown-menu'});

        if (typeof ctx.content()[0] === 'string') {
            var content = ctx.content().map(function (item) {
                return [
                    {
                        elem: 'li',
                        content: item
                    }
                ]
            })
            ctx.content(content, true)
        }
    })
}
