module.exports = function (bh) {
    bh.match('tab-content__item', function (ctx, json) {
        bh._options.replacements['tab-content__item'] = 'tab-pane';
        ctx.mix([{block: 'fade'}])
            .attrs({
                role: 'tabpanel',
                id: json.id
            })
    })
};
