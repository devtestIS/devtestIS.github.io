module.exports = function (bh) {
    bh.match('dropdown__list', function (ctx, json) {
        ctx.tag('ul')
            .mix({block: 'dropdown-menu'})
    })
}
