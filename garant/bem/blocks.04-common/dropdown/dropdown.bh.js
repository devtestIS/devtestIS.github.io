module.exports = function (bh) {
    bh.match('dropdown', function (ctx, json) {
        var title = json.title || 'Выподающее меню';
        var content,
            wrapContent;
        if (typeof ctx.content()[0] === 'string') {
            content = ctx.content().map(function (item) {
                return [
                    {
                        elem: 'li',
                        tag: 'li',
                        content: {

                            block: 'link',
                            content: item
                        }
                    }
                ]
            });
            wrapContent = {
                elem: 'list',
                content: content
            }
        } else {
            content = ctx.content();
            wrapContent = {
                elem: 'block',
                content: content
            }
        }
        ctx.content([
            {
                elem: 'toggle',
                content: title
            },
            wrapContent
        ], true)
    })
};