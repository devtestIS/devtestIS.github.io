module.exports = function (bh) {
    bh.match('search-btn', function (ctx, json) {
        ctx.tag('a')
            .attrs({
                href: '#'
            })
    })
};