module.exports = function (bh) {
    bh.match('card-product', function (ctx, json) {
        var $title = json.title || 'Дрель безударная 2-скоростная BOSCH GBM 16-2RE',
            $img = json.img || 'products/img-1.jpg',
            $price = json.price || '34 224 р';
        var bemJsonLabel;
        var bemJsonLabel2;
        var btnToCart;
        var features;
        var priceJSON;
        //если есть ярлык первый
        if (json.label) {
            for (var prop in json.label) {
                bemJsonLabel = {
                    elem: 'label',
                    mods: {type: prop}, //используем ключ объекта в качестве названия модификатора
                    content: json.label[prop]
                };
            }
        }
        //если есть ярлык второй
        if (json.label2) {
            for (var prop2 in json.label2) {
                bemJsonLabel2 = {
                    elem: 'label',
                    mods: {type: prop2},
                    content: json.label2[prop2]
                };
            }
        }
        //если это карточки для главной кнопки с надписями
        if (json.home) {
            //если товар добавлен в корзину то другая кнопка и другой текст тултипа
            if (json.added) {
                btnToCart = {
                    block: 'btn',
                    mods: {color: 'success', block: true},
                    attrs: {
                        'data-toggle': 'tooltip',
                        title: 'Перейти в корзину'
                    },
                    content: 'В КОРЗИНЕ'
                }
            } else {
                //или если не добавлен
                btnToCart = {
                    block: 'btn',
                    mods: {color: 'primary', block: true},
                    attrs: {
                        'data-toggle': 'tooltip',
                        title: 'Добавить в корзину'
                    },
                    content: 'В КОРЗИНУ'
                }
            }
        } else {
            //тоже само для карточек с товаром с подробным содержанием
            if (json.added) {
                btnToCart = {
                    elem: 'control',
                    content: [
                        {
                            block: 'btn',
                            mods: {color: 'success'},
                            attrs: {
                                'data-toggle': 'tooltip',
                                title: 'Перейти в корзину'
                            },
                            content: {
                                elem: 'icon-cart',
                            }
                        },
                        {
                            block: 'btn',
                            mods: {color: 'info'},
                            mix: [{block: 'card-product', elem: 'comparison'}],
                            attrs: {
                                'data-toggle': 'tooltip',
                                title: 'Удалить из сравнения'
                            },
                            content: {
                                elem: 'icon-comparison',
                                mods: {added:true}
                            }
                        }
                    ]
                }
            } else {
                btnToCart = {
                    elem: 'control',
                    content: [
                        {
                            block: 'btn',
                            mods: {color: 'primary'},
                            attrs: {
                                'data-toggle': 'tooltip',
                                title: 'Добавить в корзину'
                            },
                            content: {
                                elem: 'icon-cart',
                            }
                        },
                        {
                            block: 'btn',
                            mods: {color: 'info', cart: 'added'},
                            mix: [{block: 'card-product', elem: 'comparison'}],
                            attrs: {
                                'data-toggle': 'tooltip',
                                title: 'Добавить в сравнение'
                            },
                            content: {
                                elem: 'icon-comparison',
                            }
                        }
                    ]
                }
            }
        }
        if (json.features) {
            features = {
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
                                content:  {
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
        //*************************//
        //Вывод собраного контента
        ctx.content([
            {
                elem: 'label-line',
                content: [
                    bemJsonLabel,
                    bemJsonLabel2,
                ]
            },
            {
                elem: 'title',
                attrs:{
                    'data-dotdotdot': 'true' 
                },
                content: $title
            },
            {mix: {block: 'star'}, content: [
                '<div class="star-rating star-rating_disabled"><div class="star-rating__wrap" data-count="10"><a href="#"></a><input class="star-rating__input" id="uniq14958122595491-5" type="checkbox" name="uniq14958122595491-" value="uniq14958122595491-5" disabled=""><label class="star-rating__icon fa fa-star" for="uniq14958122595491-5"></label><input class="star-rating__input" id="uniq14958122595491-4" type="checkbox" name="uniq14958122595491-" value="uniq14958122595491-4" disabled=""><label class="star-rating__icon fa fa-star" for="uniq14958122595491-4"></label><input class="star-rating__input" id="uniq14958122595491-3" type="checkbox" name="uniq14958122595491-" value="uniq14958122595491-3" disabled="" checked="checked"><label class="star-rating__icon fa fa-star" for="uniq14958122595491-3"></label><input class="star-rating__input" id="uniq14958122595491-2" type="checkbox" name="uniq14958122595491-" value="uniq14958122595491-2" disabled=""><label class="star-rating__icon fa fa-star" for="uniq14958122595491-2"></label><input class="star-rating__input" id="uniq14958122595491-1" type="checkbox" name="uniq14958122595491-" value="uniq14958122595491-1" disabled=""><label class="star-rating__icon fa fa-star" for="uniq14958122595491-1"></label></div></div>',
                {
                    elem: 'img',
                    content: [
                        {
                            block: 'img-responsive',
                            url: $img
                        }
                    ]
                }
            ]},
            features,
            {
                elem: 'bottom',
                content: [
                    priceJSON, 
                    {
                        elem: 'to-cart',
                        content: [
                            btnToCart
                        ]
                    }
                ]
            }
        ], true)
    })
};
