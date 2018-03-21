module.exports = function (bh) {
    bh.match('slider-certificates__item', function (ctx, json) {
        ctx.tag('a')
            .attrs({
                href: '../../../images/certificates/big/' + json.highRes,
                'data-lightbox': 'product-detail',
                'data-title': json.title
            })
            .content([
                {
                    block: 'img-responsive',
                    url: 'certificates/' + json.url,
                    alt: json.alt
                }
            ])
    })
}