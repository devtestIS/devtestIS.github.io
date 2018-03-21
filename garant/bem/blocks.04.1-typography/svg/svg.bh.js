module.exports = function (bh) {
    bh.match('svg', function (ctx, json) {
        ctx.tag('svg');
    });
};