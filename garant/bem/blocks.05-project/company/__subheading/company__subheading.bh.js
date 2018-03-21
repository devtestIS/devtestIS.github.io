module.exports = function (bh) {
    bh.match('company__subheading', function (ctx, json) {
        ctx.tag('h3');
    });
};

