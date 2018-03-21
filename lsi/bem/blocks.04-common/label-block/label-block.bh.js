module.exports = function (bh) {
    bh.match('label-block', function (ctx, json) {
        ctx
            .tag('label')
            .attrs({
                for: json.for
            })
    })
}
