module.exports = function (bh) {
    bh.match('slider-corporate__item', function (ctx, json) {
        ctx.tag('a')
            .attrs({
                href: '../../../images/corporate/department/' + json.highRes,
                'data-lightbox': 'product-detail',
                'data-title': json.title
            })
            .content([
                {
                    block: 'img-responsive',
                    url: 'corporate/department/' + json.url,
                    alt: json.alt
                }
            ])
    })
}