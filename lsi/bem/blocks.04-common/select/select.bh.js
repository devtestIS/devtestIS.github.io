module.exports = function(bh) {
    bh.match('select', function(ctx, json) {
        ctx.tag('select')

        if (typeof ctx.content()[0] === 'string') {
            var content = ctx.content().map(function (item) {
                return [
                    {
                        elem: 'option',
                        bem: false,
                        tag: 'option',
                        content: item
                    }
                ]
            })
            ctx.content(content, true)
        }


    });
};
