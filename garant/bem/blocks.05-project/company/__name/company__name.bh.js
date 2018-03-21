module.exports = function (bh) {
    bh.match('company__name', function (ctx, json) {
        ctx.tag('h2');
    });
};

