module.exports = function(bh) {
    bh.match('section-collapse', function(ctx, json) {
        var collapseClass = json.expanded ? 'in' : '';
        ctx.tag('section');
        ctx.content([{
            elem: 'title',
            tag: 'a',
            attrs: {
                href: '#' + json.id,
                role: 'button',
                'data-toggle': 'collapse',
                'aria-expanded': json.expanded.toString(),
                'aria-controls': json.id
            },
            content: json.title
        }, {
            elem: 'text',
            mix: {
                block: 'collapse' + collapseClass
            },
            attrs: {
                id: json.id,
                role: 'tabpanel',
                'aria-expanded': json.expanded.toString()
            },
            content: [{
                elem: 'container',
                content: json.textContent
            }]
        }]);
    });
};