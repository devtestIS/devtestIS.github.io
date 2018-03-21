module.exports = function (bh) {
    bh.match('radio__control', function (ctx, json) {
        ctx.tag('input').attrs({
            type: 'radio',
            name: json.name,
            checked: json.checked,
            disabled: json.disabled
        });
        if(ctx.mod('styled')) return [
            json,
            {elem: 'icon', mods: ctx.mods()}
        ]
    });
};