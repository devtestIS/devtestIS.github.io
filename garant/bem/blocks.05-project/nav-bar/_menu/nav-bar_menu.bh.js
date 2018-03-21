module.exports = function (bh) {

    bh.match(module.id.replace('.bh.js', '').match(/([^\\]+)?$/), function (ctx, json) {

        ctx.mix([{
                block: 'navbar'
            }]
        )
            .tag('nav')


        if (typeof ctx.content()[0] !== 'string') {
            var content = ctx.content()
            ctx.content([
                {
                    block: "navbar-header",
                    content: [
                        {

                            tag: 'button',
                            attrs: {
                                'data-toggle': 'collapse',
                                'data-target': '#bs-example-navbar-collapse-2',
                                'aria-expanded': 'false'
                            },
                            mix: [
                                {block: 'collapsed'},
                                {block: 'navbar-toggle'}],
                            content: [
                                'Купить авто'
                            ]
                        },




                    ],
                },
                {
                    elem: 'list',
                    tag: 'div',
                    mix: [
                        {block: 'collapse'},
                        {block: 'navbar-collapse'}
                    ],
                    attrs: {
                        id: 'bs-example-navbar-collapse-2',
                        'aria-expanded': 'true',
                        role: 'navigation'
                    },
                    content: [
                        {
                            block: 'nav-bar',
                            elem: 'container',
                            tag: 'ul',
                            mix: [
                                {block: 'navbar-nav'}
                            ],
                            content: content,

                        }]

                }
            ], true)

        }
    })
};