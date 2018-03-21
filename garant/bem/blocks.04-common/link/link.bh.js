module.exports = function (bh) {
    bh.match('link', function (ctx, json) {
        var url = json.url ? json.url : '#';
        ctx
            .tag('a')
            .attrs({
                href: url
            })
    })
}