module.exports = function (bh) {
    bh.match(module.id.replace('.bh.js', '').match(/([^\\]+)?$/)[0], function (ctx, json) {
        ctx.content({
            elem: 'span',
            mods: {
                'line': true
            },
            content: ctx.content()
        }, true);
    });
};