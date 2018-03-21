module.exports = function (bh) {
    bh.match('left-nav__li', function (ctx, json) {
        ctx.tag('li');
    })
}