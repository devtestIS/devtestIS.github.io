module.exports = function (bh) {
    bh.match('label', function (ctx, json) {

        var isBEM = Object.keys(ctx.mods()).length > 0;

        ctx.bem(isBEM).tag('label');
    });
};