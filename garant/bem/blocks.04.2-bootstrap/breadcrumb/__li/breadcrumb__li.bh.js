module.exports = function (bh) {
    bh.match('breadcrumb__li', function (ctx, json) {
        ctx.tag('li').bem(false);
    });
};