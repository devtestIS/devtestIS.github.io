module.exports = function (bh) {
    bh.match('pagination', function (ctx, json) {
        ctx.tag('ul')
        return {
            block: 'pagination-nav',
            mix: [{block: 'text-center'}],
            tag: 'nav',
            content: ctx.json()
        };
    })
}