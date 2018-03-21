module.exports = function (bh) {
    bh.match('teaser-product__title', function (ctx, json) {
        ctx.attr('href', '#').tag('a');
    });
};