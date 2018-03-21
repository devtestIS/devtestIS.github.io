module.exports = function (bh) {
    bh.match('checkbox__control', function (ctx, json) {
        ctx.tag('input').attrs({
            type: 'checkbox',
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