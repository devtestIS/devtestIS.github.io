module.exports = function (bh) {
    bh.match('fa-question-circle-o', function (ctx, json) {
        ctx.tag('i')
            .mix([{block: 'fa'}])
            .attrs({
                'data-toggle': 'popover-question',
                'data-content': "элементы с заданным позиционированием играют особую роль, поскольку именно относительно них происходит позиционирование всех элементов внутри."
            })
    })
};