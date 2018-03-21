module.exports = function(bh) {

    bh.match('layout-tiles', function(ctx, json) {
        var content = [],
            breakpoints = [],
            ceilsInLine = {},
            itemsInLine = {};

        if (json.xs) breakpoints.push('xs');
        if (json.sm) breakpoints.push('sm');
        if (json.md) breakpoints.push('md');
        if (json.lg) breakpoints.push('lg');

        for (var b=0; b < breakpoints.length; b++) {
            var bp = breakpoints[b];
            ceilsInLine[bp] = 0;
            itemsInLine[bp] = Math.floor(12 / json[bp]);
        }

        for (var i=0; i<ctx.content().length; i++) {
            var item = {
                    elem: 'col',
                    mods: {},
                    content: ctx.content()[i]
                },
                clear = [];

            for (var b=0; b < breakpoints.length; b++) {
                var bp = breakpoints[b];

                item.mods[bp] = json[bp];
                if (ceilsInLine[bp] + json[bp] >= 12) {
                    ceilsInLine[bp] = 0;
                    clear.push([
                      '<!--<?/*',
                      ' Нужно вставить этот разделитель',
                      '*/?>-->',
                      {
                          block: 'clearfix',
                          mix: [{block: 'visible-' + bp + '-block'}]
                      },
                      '<!--<?/*',
                      ' после каждого ' + itemsInLine[bp] + '-го элемента',
                      '*/?>-->',
                  ]);
                }
                else {
                    ceilsInLine[bp] += json[bp];
                }
            }

            content.push(item);
            content.push(clear);
        }

        return {
            block: 'row',
            content: content
        };
    });

};
