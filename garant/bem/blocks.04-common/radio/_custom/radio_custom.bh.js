module.exports = function (bh) {
    bh.match('radio_custom', function (ctx, json) {
        var name = json.name || 'radio';
        var value = json.value || '';
        var checked = json.checked || false;
        ctx.content({
            elem: 'label',
            content: [
                {
                    elem: 'control',
                    attrs: {
                        type: 'radio',
                        name: name,
                        checked : checked,
                        disabled : ctx.mod('disabled'),
                        value: value
                    }
                },
                {
                    elem: 'input',
                    tag: 'span'
                },
                ctx.content()
            ]
        }, true);
    })
}
