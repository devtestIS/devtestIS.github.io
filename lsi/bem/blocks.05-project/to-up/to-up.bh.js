module.exports = function (bh) {
    bh.match('to-up', function (ctx, json) {
        ctx
            .content([
                {
                    elem: 'link',
                    tag: 'a',
                    attrs: {
                        href: '#'
                    },
                    content: [
                        {
                            block: 'fa',
                            mix: [{block: 'fa-angle-up'}, {block: 'to-up', elem: 'icon'}]
                        }
                    ]
                }
            ], true)
    })
}