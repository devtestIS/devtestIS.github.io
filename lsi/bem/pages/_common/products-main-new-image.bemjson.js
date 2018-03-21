module.exports = [
    (function (item) {
        return [item, item, item, item, item, item, item, item,item]
    })({
        tag: 'a',
        attrs: {href: '#'},
        elem: 'item',
        content: [
            {block: 'catalog-tile', content: [
                {elem: 'image', content: [
                    {tag: 'img', attrs: {src: 'http://placehold.it/460x460'}}
                ]},
                {elem: 'title', content: ['Заголовок который может иметь 2 строки']}
            ]}
        ]
    })
]