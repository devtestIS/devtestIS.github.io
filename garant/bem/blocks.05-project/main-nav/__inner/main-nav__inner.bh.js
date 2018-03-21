module.exports = function (bh) {
    bh.match('main-nav__inner', function (ctx, json) {
        ctx.tag('ul');
    })
}