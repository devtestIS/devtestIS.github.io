module.exports = function (bh) {
    bh.match('collapse-section__content', function (ctx, json) {
        ctx.mix({
            block: 'collapse'
        });
    });
};

