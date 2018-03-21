module.exports = function (bh) {
    bh.match('card-product-line', function (ctx, json) {
        var $title = json.title || 'Дрель безударная 2-скоростная BOSCH GBM 16-2RE',
            $img = json.img || 'products/img-1.jpg',
            $price = json.price || '34 224 р';
        var bemJsonLabel;
        var bemJsonLabel2;
        var btnToCart;
        var priceJSON;

        if (json.label) {
            for (var prop in json.label) {
                bemJsonLabel =  {
                    elem: 'label',
                    mods: {type: prop}, //используем ключ объекта в качестве названия модификатора
                    content: json.label[prop]
                };
            }
        }
        if(json.label2) {
            for (var prop2 in json.label2) {
                bemJsonLabel2 =  {
                    elem: 'label',
                    mods: {type: prop2},
                    content: json.label2[prop2]
                };
            }
        }
        //если это карточки для главной кнопки с надписями
        if(json.added) {
            btnToCart = {
                elem: 'btn-group',
                content: [
                    {
                        elem: 'btn',
                        content: [
                            {
                                block: 'btn',
                                mods: {color: 'success', block:true},
                                attrs: {
                                    'data-toggle': 'tooltip',
                                    title: 'Перейти в корзину'
                                },
                                content: [
                                    {
                                        elem: 'icon-cart',
                                        mix: [{block: 'btn', elem: 'icon-text'}],
                                    },
                                    'В КОРЗИНУ'
                                ]
                            }
                        ]
                    },
                    {
                        elem: 'btn',
                        content: [
                            {
                                block: 'btn',
                                mods: {color: 'info', block:true},
                                attrs: {
                                    'data-toggle': 'tooltip',
                                    title: 'Удалить из сравнения'
                                },
                                content: [
                                    {
                                        elem: 'icon-comparison',
                                        mods: {added:true},
                                        mix: [{block: 'btn', elem: 'icon-text'}],
                                    },
                                    'убрать'
                                ]
                            }
                        ]
                    }
                ]
            }
        } else {
            btnToCart =  {
                elem: 'bnt-group',
                content: [
                    {
                        elem: 'btn',
                        content: {
                            block: 'btn',
                            mods: {color: 'primary', block:true},
                            attrs: {
                                'data-toggle': 'tooltip',
                                title: 'Добавить в корзину'
                            },
                            content: [
                                {
                                    elem: 'icon-cart',
                                    mix: [{block: 'btn', elem: 'icon-text'}],
                                },
                                'КУПИТЬ'
                            ]
                        }
                    },
                    {
                        elem: 'btn',
                        content:  {
                            block: 'btn',
                            mods: {color: 'info', cart: 'added', block:true},
                            attrs: {
                                'data-toggle': 'tooltip',
                                title: 'Добавить в сравнение'
                            },
                            content: [
                                {
                                    elem: 'icon-comparison',
                                    mix: [{block: 'btn', elem: 'icon-text'}],
                                },
                                'сравнить'
                            ]
                        }
                    }
                ]
            }
        }
        if (json.added) {
            priceJSON = {
                elem: 'price',
                mods: {new: true},
                content: [
                    $price,
                    {
                        elem: 'old-price',
                        content: '40 253 р'
                    }
                ]
            }
        } else {
            priceJSON = {
                elem: 'price',
                content: $price
            }
        }
        // контентная часть
        ctx.content([
            {
                elem: 'img',
                mix: [{block: 'prs'}],
                content: [
                    {block: 'star', content: [
                        {block: 'star-rating', mods: {disabled: true}},
                        {tag: 'a', attrs: {href: '#'}, content: [
                            {
                                block: 'img-responsive',
                                url: $img
                            }
                        ]}
                    ]}
                ]
            },
            {
                elem: 'content',
                content: [
                    {
                        elem: 'label-wrap',
                        content: [
                            bemJsonLabel,
                        ]
                    },
                    {
                        elem: 'title',
                        content: $title
                    },
                    {
                        elem: 'features',
                        content: [
                            {
                                elem: 'row',
                                content: [
                                    {
                                        elem: 'features-name',
                                        content: 'Мощность'
                                    },
                                    {
                                        elem: 'value',
                                        content: {
                                            elem: 'value-span',
                                            content: '800 Вт'
                                        }
                                    },
                                ]
                            },
                            {
                                elem: 'row',
                                content: [
                                    {
                                        elem: 'features-name',
                                        content: 'Энергия удара'
                                    },
                                    {
                                        elem: 'value',
                                        content: {
                                            elem: 'value-span',
                                            content: '2.9 Дж'
                                        }
                                    },
                                ]
                            },
                            {
                                elem: 'row',
                                content: [
                                    {
                                        elem: 'features-name',
                                        content: 'Обороты'
                                    },
                                    {
                                        elem: 'value',
                                        content: {
                                            elem: 'value-span',
                                            content: '1100 об/мин'
                                        }
                                    },
                                ]
                            },
                            {
                                elem: 'row',
                                content: [
                                    {
                                        elem: 'features-name',
                                        content: 'Кол-во режимов'
                                    },
                                    {
                                        elem: 'value',
                                        content: {
                                            elem: 'value-span',
                                            content: '3'
                                        }
                                    },
                                ]
                            },
                            {
                                elem: 'row',
                                content: [
                                    {
                                        elem: 'features-name',
                                        content: 'Вес'
                                    },
                                    {
                                        elem: 'value',
                                        content: {
                                            elem: 'value-span',
                                            content: '5.4 кг'
                                        }
                                    }
                                ]
                            }

                        ],
                    },
                ]
            },
            {
                elem: 'border'
            },
            {
                elem: 'control',
                content: [
                    bemJsonLabel2,
                    priceJSON,
                    btnToCart
                ]
            }
        ], true)
    })
}