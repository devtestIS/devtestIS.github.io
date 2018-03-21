module.exports = function (bh) {
    bh.match('ul__li', function (ctx, json) {
        ctx.tag('li');
    });
};