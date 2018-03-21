module.exports = function (bh) {
    bh.match('catalog__item', function (ctx, json) {
       ctx.tag('li')
           .content([
               {
                   elem: 'link',
                   tag: 'a',
                   attrs: {
                       href: '#'
                   },
                   content: ctx.content()
               }
           ], true)
    })
}
