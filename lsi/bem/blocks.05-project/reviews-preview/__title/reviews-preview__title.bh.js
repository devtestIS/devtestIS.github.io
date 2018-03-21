module.exports = function (bh) {
    bh.match('reviews-preview__title', function (ctx, json) {
        return {
            elem: 'wrap-title',
            content: ctx
                .tag('a')
                .attrs({
                    href: '#'
                })
                .json()
        }
    })
}