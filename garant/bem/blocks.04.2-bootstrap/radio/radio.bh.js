module.exports = function (bh) {
    bh.match('radio', function (ctx, json) {
        ctx.content([
            {tag: 'label', content: [
                {elem: 'control',
                    name: json.name || ctx.generateId(),
                    checked: json.checked,
                    disabled: json.disabled,
                    mods: ctx.mods()
                },
                ctx.content()
            ]}
        ], true);
    });
};