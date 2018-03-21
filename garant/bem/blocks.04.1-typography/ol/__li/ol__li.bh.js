module.exports = function (bh) {
    bh.match('ol__li', function (ctx, json) {
        ctx.tag('li');
    });
};