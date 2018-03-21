module.exports = function (bh) {
    bh.match('ol', function (ctx, json) {

        var content = ctx.content();
        var result = [];
        for(var i in content){
            result.push({elem: 'li', content: [
                content[i]
            ]});
        }

        ctx.tag('ol').content(result, true);
    });
};