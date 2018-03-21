module.exports = function (bh) {
    bh.match('lightbox-link', function (ctx, json) {
        var lightboxId = json.id ? json.id : 'lightbox';
        var smallImg = ctx.content() || json.url;
        ctx.tag('a')
            .attrs({
                href: '../../../images/' + json.url,
                'data-lightbox': lightboxId
            })
            .content([
                {
                    block: 'img-responsive',
                    url: smallImg
                }
            ])
    })
}
