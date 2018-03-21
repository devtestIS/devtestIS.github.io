module.exports = function (bh) {
    bh.match('control-label', function (ctx, json) {
        ctx.tag('label');
    });
};