module.exports = function (bh) {
    bh.match('left-nav', function (ctx, json) {
        ctx.tag('ul');
    })
}