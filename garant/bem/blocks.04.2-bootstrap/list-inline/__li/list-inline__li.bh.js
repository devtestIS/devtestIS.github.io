module.exports = function (bh) {
    bh.match('list-inline__li', function (ctx, json) {
        ctx.tag('li');
    });
};