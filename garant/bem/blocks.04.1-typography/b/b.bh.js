module.exports = function (bh) {
    bh.match('b', function (ctx, json) {
        ctx.tag('b');
    });
};