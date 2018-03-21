module.exports = function (bh) {
    bh.match('dropdown__toggle', function (ctx, json) {
        ctx.tag('a')
            .attrs({
                href: '#',
                'data-toggle': 'dropdown'
            }).content([
          ctx.content(),
          {
            block: 'svg',
            url: 'arrow',
            mods: {'arrow': true},
            mix: {block: 'dropdown', elem: 'arrow'}
          }
        ], true)
    })
}
