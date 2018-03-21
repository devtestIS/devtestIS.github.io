module.exports = function (bh) {
    bh.match('remove-item', function (ctx, json) {
        ctx.tag('a');
        ctx.attr('href', 'javascript:void(0);');
        ctx.content([
            {block: 'icomoon', icon: 'close'}
        ]);
    });
};

