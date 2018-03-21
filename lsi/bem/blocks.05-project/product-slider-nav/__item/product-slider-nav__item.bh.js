module.exports = function (bh) {
    bh.match('product-slider-nav__item', function (ctx, json) {
        ctx.content([
            {
                block: 'img-responsive',
                url: json.url
            }
        ])
    })
};