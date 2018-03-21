module.exports = function (bh) {
    bh.match('input', function (ctx, json) {
        var isBEM = Object.keys(ctx.mods()).length > 0;

        ctx.bem(isBEM).tag('input');
    });
};