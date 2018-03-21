module.exports = function (bh) {
    bh.match('table__tfoot', function (ctx, json) {
        var result = [];
        for(var i in ctx.content()){
            result[i] = {tag: 'tr', content: []};
            for(var j in ctx.content()[i]){
                result[i]['content'][j] = {tag: 'td', content: ctx.content()[i][j]};
            }
        }
        ctx.tag('tfoot').content(result, true);
    });
};