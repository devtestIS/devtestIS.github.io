module.exports = function (bh) {
    bh.match('subscription', function (ctx, json) {
        var placeholder = json.placeholder || 'Ваш e-mail',
            textBtn = json.btn || 'ок',
            type = json.type || 'text';
        ctx.tag('form')
            .content([
                {
                    elem: 'input',
                    tag: 'input',
                    attrs: {
                        type: type,
                        placeholder: placeholder
                    }
                },
                {
                    elem: 'btn',
                    tag: 'button',
                    attrs: {
                        type: 'button'
                    },
                    content: textBtn
                }
            ], true)
    })
}
