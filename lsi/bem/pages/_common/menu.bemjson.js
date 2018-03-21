module.exports = [
    {
        block: 'menu-line',
        content: [
            {
                block: 'container',
                content: [
                    {
                        block: 'catalog-control',
                        attrs: {
                            'data-catalog': 'close'
                        },   
                        content: 'КАТАЛОГ товаров'
                    },
                    {
                        block: 'menu',
                        content: [ 
                            {
                                block: 'menu-bar',
                                mix: [{block: 'menu', elem: 'btn'}]
                            },
                            { 
                                elem: 'list',
                                content: [ 
                                    {
                                        elem: 'item',
                                        content: 'Доставка'
                                    },
                                    {
                                        elem: 'item',
                                        content: 'Оплата'
                                    },
                                    {
                                        elem: 'item',
                                        content: 'Кредит'
                                    },
                                    {
                                        elem: 'item',
                                        content: 'Обратная связь'
                                    }
                                ]
                            }
                        ]
                    }
                ]
            },
        ]
    },
    {
        block: 'catalog',
        mods: {menu:true},
        content: require('../_common/catalog.bemjson.js')
    },
    {
        block: 'comparison-btn',
        content: [
            {
                block: 'img',
                mix: [{block: 'comparison-btn', elem: 'img'}],
                url: 'control/comparison_white.png'
            },
            '(2)'
        ]
    },
    {
        block: 'comparison-btn',
        mods: {'next': true},
        content: [
            {
                block: 'fa',
                mix: [
                    {block: 'comparison-btn', elem: 'img'},
                    {block: 'fa-star-o'}
                ]
            },
            '(2)'
        ]
    },
]