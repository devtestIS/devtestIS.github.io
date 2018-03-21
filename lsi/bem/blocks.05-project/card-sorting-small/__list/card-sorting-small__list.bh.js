module.exports = function (bh) {
    bh.match(module.id.replace('.bh.js', '').match(/([^\\]+)?$/), function (ctx, json) {
        ctx.tag('ul')
            .mix({block: 'dropdown-menu'});
       var getRandom = function (min, max) {
            var rand = min + Math.random() * (max + 1 - min);
            rand = Math.floor(rand);
            return rand;
        }
        if (typeof ctx.content()[0] === 'string') {
            var content = ctx.content().map(function (item) {
                return [
                    {
                        elem: 'li',
                        attrs: {
                            'data-id': getRandom(0, 10000)
                        },
                        tag: 'li',
                        content: item
                    }
                ]
            })
            ctx.content(content, true)
        }
    })
};