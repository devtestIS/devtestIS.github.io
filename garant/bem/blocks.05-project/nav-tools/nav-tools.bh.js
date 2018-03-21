module.exports = function (bh) {
    bh.match('nav-tools', function (ctx, json) {
        ctx.tag('nav');
    })
}