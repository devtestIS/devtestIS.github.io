module.exports = function (bh) {
    bh.match('tab-content__item_active', function (ctx, json) {
        bh._options.replacements['tab-content__item_active'] = 'in active';
    })
};