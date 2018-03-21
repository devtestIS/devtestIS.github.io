module.exports = function (bh) {
    bh.match('social-likes', function (ctx, json) {
        ctx.cls('lazyload');
    })
}