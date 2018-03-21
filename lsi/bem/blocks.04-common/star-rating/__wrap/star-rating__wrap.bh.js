module.exports = function (bh) {
    bh.match('star-rating__wrap', function (ctx, json) {
        ctx.attr('data-count', 10);
    })
};