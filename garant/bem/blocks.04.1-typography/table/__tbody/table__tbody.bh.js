module.exports = function (bh) {
    bh.match('table__tbody', function (ctx, json) {
        var result = [];
        for(var i in ctx.content()){
            result[i] = {tag: 'tr', content: []};
            for(var j in ctx.content()[i]){
                var tag = 'td';
                var content = ctx.content()[i][j];
                if(Array.isArray(content)){
                    tag = content[1];
                    content = ctx.content()[i][j][0];
                }
                result[i]['content'][j] = {tag:  tag, content: content};
            }
        }
        ctx.tag('tbody').content(result, true);
    });
};