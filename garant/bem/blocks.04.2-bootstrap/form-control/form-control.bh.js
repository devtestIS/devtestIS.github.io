module.exports = function (bh) {
    bh.match('form-control', function (ctx, json) {
        if(Array.isArray(ctx.content()) && ctx.content().length > 1){
            var content = [];
            for(var i in ctx.content())
                content.push({
                    tag: 'option', content: ctx.content()[i], attrs: {
                        value: ctx.generateId()
                    }
                });
            ctx.tag('select').attr('name', ctx.content()[i]).content(content, true);
        }else{
            ctx.tag('input').attrs({
                value: ctx.content(),
                placeholder: json.placeholder || 'Текстовое поле'
            });
        }
    });
};