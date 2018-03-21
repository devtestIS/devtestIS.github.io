module.exports = function (bh) {
    bh.match('nav-tools__li', function (ctx, json) {
        ctx.tag('li');
    })
}