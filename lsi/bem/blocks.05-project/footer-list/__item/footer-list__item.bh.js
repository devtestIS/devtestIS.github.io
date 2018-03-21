module.exports = function (bh) {
    bh.match('footer-list__item', function (ctx, json) {
        ctx.tag('li');
    })
}