
module.exports = function (bh) {
    bh.match('input', function (ctx, json) {
        var type = json.type || 'text';
        ctx
            .tag('input')
            .attrs({
                type: type,
                id: json.id,
                checked : ctx.mod('checked'),
                disabled : ctx.mod('disabled'),
                placeholder: json.placeholder,
                name: json.name,
                value: ctx.content()
            })
    })
}
