module.exports = function (bh) {
    bh.match('switch__over', function (ctx, json) {
        ctx.tag('span');
    })
}
