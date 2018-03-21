module.exports = function (bh) {
    bh.match('add-offer', function (ctx, json) {
        ctx.tag('button');
        ctx.attr('type', 'button');
    });
};

