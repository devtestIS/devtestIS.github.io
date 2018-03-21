module.exports = function (bh) {
    bh.match('radio__icon', function (ctx, json) {
        ctx.tag('span');
    });
};