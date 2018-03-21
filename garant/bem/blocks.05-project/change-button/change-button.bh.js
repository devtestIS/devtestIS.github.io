module.exports = function (bh) {
    bh.match('change-button', function (ctx, json) {
        ctx.tag('span');
        ctx.attr('data-toggle', 'modal');
        ctx.attr('data-target', json.target);
    });
};

