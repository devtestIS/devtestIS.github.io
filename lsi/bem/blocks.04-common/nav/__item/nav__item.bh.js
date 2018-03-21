module.exports = function(bh) {

    bh.match('nav__item', function(ctx, json) {
        ctx
            .tag('li')
            .attr('role', 'presentation')
            .content({
                tag: 'a',
                attrs: {
                    href: json.url || '#'
                },
                content: ctx.content()
            }, true);
    });

};
