module.exports = function (bh) {
    bh.match('teaser-product__image', function (ctx, json) {
        ctx.content([
            {tag: 'img', attrs:{
                'src': 'http://placehold.it/50x50'
            }}
        ])
    });
};