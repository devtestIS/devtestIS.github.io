module.exports = function(bh) {
    bh.match('list-marked', function(ctx, json) {
        function createArray(array) {
            var list = [];
            for (var i = 0; i < array.length; i++) {
                list.push({
                    elem: 'item',
                    tag: 'li',
                    content: array[i]
                })
            }
            
            return list;
        }
        
        
        
        ctx.content([{
            mix: {
                block: 'container',
                mods: {
                    fluid: 'off'
                }
            },
            content: [{
                elem: 'heading',
                tag: 'h2',
                content: json.heading
            }, json.subheading ? {
                elem: 'subheading',
                tag: 'h4',
                content: json.subheading
            } : false, {
                elem: 'row',
                content: [{
                   elem: 'column',
                    content: [{
                        elem: 'list',
                        tag: 'ul',
                        content: createArray(json.leftList)
                    }]
                }, {
                    elem: 'column',
                    content: [{
                        elem: 'list',
                        tag: 'ul',
                        content: createArray(json.rightList)
                    }]
                }]
            }]
        }]);
    });
// ...
};