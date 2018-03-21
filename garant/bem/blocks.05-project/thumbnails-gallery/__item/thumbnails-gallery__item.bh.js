module.exports = function (bh) {
    bh.match('thumbnails-gallery__item', function (ctx, json) {
        var button;
        if (json.editable) {
            button = {
                block: 'remove-item'
            };
        }
        
        ctx.tag('figure');
        ctx.attr('item-number', json.number);
        ctx.content([
            {
                elem: 'image',
                tag: 'img',
                attrs: {
                    src: json.src
                }

            },
            button
        ]);
    });
};

