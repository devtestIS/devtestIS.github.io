module.exports = function (bh) {
    bh.match('dropdown__toggle', function (ctx, json) {
        ctx.tag('a')
            .attrs({
                href: '#',
                'data-toggle': 'dropdown'
            })
    })
}
