module.exports = function (bh) {
    bh.match('search', function (ctx, json) {
        var placeholder = json.placeholder || 'Поиск';
        ctx.tag('form')
            .content([
            {
                elem: 'input',
                tag: 'input',
                attrs: {
                    type: 'text',
                    placeholder: placeholder
                }
            },
            {
                elem: 'btn',
                tag: 'button',
                attrs: {
                    type: 'button'
                },
                mix: [{block: 'fa'}, {block: 'fa-search'}]
            }
        ], true)
    })
}
