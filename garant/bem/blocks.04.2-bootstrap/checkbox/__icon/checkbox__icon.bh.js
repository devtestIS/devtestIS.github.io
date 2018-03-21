module.exports = function (bh) {
    bh.match('checkbox__icon', function (ctx, json) {
        ctx.tag('span');
    });
};