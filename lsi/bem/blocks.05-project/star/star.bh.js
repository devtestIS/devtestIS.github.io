module.exports = function (bh) {
    bh.match(module.id.replace('.bh.js', '').match(/([^\\]+)?$/)[0], function (ctx, json) {
        ctx.content([
            ctx.content(),
            {elem: 'icon'}
        ], true)
    });
};