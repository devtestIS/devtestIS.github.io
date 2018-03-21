module.exports = function (bh) {
    bh.match('pagination', function (ctx, json) {
        ctx.tag('ul')
        return {
            block: 'pagination-nav',
            tag: 'nav',
            content: ctx.json()
        };
    })
}