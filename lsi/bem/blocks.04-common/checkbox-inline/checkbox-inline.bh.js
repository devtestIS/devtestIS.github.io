module.exports = function (bh) {
    bh.match('checkbox-inline', function (ctx, json) {
        ctx.tag('label')
            .content({
            content: [
                {
                    elem: 'control',
                    attrs: {
                        type: 'checkbox',
                        name: json.name,
                        checked : ctx.mod('checked'),
                        disabled : ctx.mod('disabled'),
                        value: json.value
                    }
                },
                ctx.content()
            ]
        }, true);
    })
}
