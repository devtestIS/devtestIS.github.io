module.exports = function(bh) {

    bh.match('layout-tiles', function(ctx, json) {
        var grid = json.grid || {},
            content = [],
            breakpoints = [],
            ceilsInLine = {},
            itemsInLine = {};

        if (grid.xs) breakpoints.push('xs');
        if (grid.sm) breakpoints.push('sm');
        if (grid.md) breakpoints.push('md');
        if (grid.lg) breakpoints.push('lg');

        for (var b=0; b < breakpoints.length; b++) {
            var bp = breakpoints[b];
            ceilsInLine[bp] = 0;
            itemsInLine[bp] = Math.floor(12 / grid[bp]);
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

                item.mods[bp] = grid[bp];
                if (ceilsInLine[bp] + grid[bp] >= 12) {
                    ceilsInLine[bp] = 0;
                    clear.push([
                      '<!--<?/*',
                      ' Нужно вставить этот разделитель ... ',
                      '*/?>-->',
                      {
                          block: 'clearfix',
                          mix: [{block: 'visible-' + bp + '-block'}]
                      },
                      '<!--<?/*',
                      ' ... после каждого ' + itemsInLine[bp] + '-го элемента',
                      '*/?>-->',
                  ]);
                }
                else {
                    ceilsInLine[bp] += grid[bp];
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
