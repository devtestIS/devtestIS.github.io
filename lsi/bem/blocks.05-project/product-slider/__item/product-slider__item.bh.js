module.exports = function (bh) {
    bh.match('product-slider__item', function (ctx, json) {
        ctx.tag('a')
            .attrs({
                href: '../../../images/' + json.url,
                'data-lightbox': 'product-detail'
            })
            .content([
                {
                    block: 'img-responsive',
                    url: json.url
                }
            ])
    })
};