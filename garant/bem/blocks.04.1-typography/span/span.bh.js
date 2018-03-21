module.exports = function (bh) {
    bh.match('span', function (ctx, json) {
        ctx.tag('span');
    });
};