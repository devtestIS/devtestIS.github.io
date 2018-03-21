module.exports = function (bh) {
    bh.match('main-nav__li', function (ctx, json) {
        ctx.tag('li');
    })
}