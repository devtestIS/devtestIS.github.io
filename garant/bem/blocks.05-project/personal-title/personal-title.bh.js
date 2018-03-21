module.exports = function (bh) {
    bh.match('personal-title', function (ctx, json) {
        ctx.tag('span');
    });
};

