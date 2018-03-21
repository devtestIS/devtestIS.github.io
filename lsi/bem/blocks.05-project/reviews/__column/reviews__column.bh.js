module.exports = function (bh) {
    bh.match('reviews__column', function (ctx, json) {
        ctx.content([{
            mix: {
                block: 'clearfix'
            },
            content: [{
                elem: 'name',
                tag: 'h4',
                content: [json.name, {
                    block: 'comment-rating',
                    tag: 'span',
                    content: [{
                        block: 'fa',
                        mix: {
                            block: 'fa-star'
                        },
                        tag: 'i'
                    }, {
                        block: 'fa',
                        mix: {
                            block: 'fa-star'
                        },
                        tag: 'i'
                    }, {
                        block: 'fa',
                        mix: {
                            block: 'fa-star'
                        },
                        tag: 'i'
                    }, {
                        block: 'fa',
                        mix: {
                            block: 'fa-star'
                        },
                        tag: 'i'
                    }, {
                        block: 'fa',
                        mix: {
                            block: 'fa-star'
                        },
                        tag: 'i'
                    }]
                }]
            }, {
                elem: 'date',
                tag: 'span',
                content: json.date
            }]
        }, {
            elem: 'yandexId',
            tag: 'span',
            content: 'ID отзыва на Яндекс Маркете: ' + json.yandexId
        }, {
            elem: 'advantages',
            tag: 'p',
            content: [{
                tag: 'strong',
                content: 'Достоинства: '
            }, {
                tag: 'span',
                content: json.advantages
            }]
        }, {
            elem: 'disadvantages',
            tag: 'p',
            content: [{
                tag: 'strong',
                content: 'Недостатки: '
            }, {
                tag: 'span',
                content: json.disadvantages
            }]
        }, {
            elem: 'comment',
            tag: 'p',
            content: [{
                tag: 'strong',
                content: 'Комментарий: '
            }, {
                tag: 'span',
                content: json.comment
            }]
        }]);
    })
}