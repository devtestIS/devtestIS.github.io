module.exports = function(bh) {
    bh.match('section-tags', function(ctx, json) {
        var tags = json.tags,
            elements = [];
        
        for (var i = 0; i < tags.length; i++) {
            elements.push({
                elem: 'item',
                tag: 'li',
                content: [{
                    elem: 'link',
                    mods: {
                      active: tags[i].active
                    },
                    tag: 'a',
                    attrs: {
                        href: 'javascript:void(0);'
                    },
                    content: tags[i].text
                }]
            });
        }
        
        ctx.tag('ul');
        ctx.content(elements);
    });
// ...
};