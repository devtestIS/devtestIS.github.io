module.exports = function (bh) {
    bh.match('main-nav__collapse', function (ctx, json) {
        ctx.tag('nav');
    })
}