module.exports = function (bh) {
    bh.match('table__caption', function (ctx, json) {
        ctx.tag('caption').content('Заголовок таблицы');
    });
};