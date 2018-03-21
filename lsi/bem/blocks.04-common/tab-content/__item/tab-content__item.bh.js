module.exports = function (bh) {
    bh.match('tab-content__item', function (ctx, json) {
        ctx.mix([{block: 'fade'}])
            .attrs({
                role: 'tabpanel',
                id: json.id
            })
    })
};
