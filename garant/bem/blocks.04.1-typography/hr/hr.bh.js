module.exports = function (bh) {
    bh.match('hr', function (ctx, json) {
        ctx.tag('hr');
    });
};