module.exports = function (bh) {
    bh.match(module.id.replace('.bh.js', '').match(/([^\\]+)?$/)[0], function (ctx, json) {
        ctx.tag('a').attr('href', '#').attrs({
            'data-toggle':"tooltip",
            'data-placement':"top",
            'title':"Добавить<br>в&nbsp;избранное"
        });
    });
};