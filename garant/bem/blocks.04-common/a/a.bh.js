module.exports = function (bh) {
    bh.match('a', function (ctx, json) {
        var $url = json.url || '#';
        ctx.bem(false)
            .tag('a')
            .attrs({
                href: $url
            })
    })
}