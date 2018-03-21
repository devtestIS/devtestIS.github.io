module.exports = function (bh) {
    bh.match('nav-tabs__item_active', function (ctx, json) {
        bh._options.replacements['nav-tabs__item_active'] = 'active';
    })
}
