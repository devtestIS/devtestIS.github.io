module.exports = function (bh) {
    bh.match('strong', function (ctx, json) {
        ctx.tag('strong');
    });
};