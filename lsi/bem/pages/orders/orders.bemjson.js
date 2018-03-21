module.exports = {
    block: 'page',
    title: 'Корзина',
    head: [{elem: 'meta', attrs: {name: 'format-detection', content: 'telephone=no'}}],
    head: [{
        elem: 'link',
        attrs: {
            href: 'https://fonts.googleapis.com/css?family=PT+Sans:400,700',
            rel: 'stylesheet',
            type: 'text/css'
        }
    }],
    styles: [{elem: 'css', url: '../_merged/_merged.css'}],
    scripts: [{elem: 'js', url: '../_merged/_merged.js'}, {elem: 'js', url: '../_merged/_merged.i18n.ru.js'}],
    content: [
        require('../_common/header.bemjson.js'),
        require('../_common/menu.bemjson.js'),
        {
            block: 'container',
            content: [
                {
                    block: 'breadcrumb',
                    content: [
                        {
                            elem: 'item',
                            content: 'Главная'
                        },
                        {
                            elem: 'active',
                            content: 'Корзина'
                        }
                    ]
                },
                {
                    block: 'title-page',
                    mods: {inner: true},
                    content: 'Корзина'
                },
                {
                    block: 'list-orders',
                    content: [
                        {
                            elem: 'item',
                            mods: {product:true},
                            content: [
                                {
                                    elem: 'img',
                                    content: {
                                        block: 'img-responsive',
                                        url: 'products/img-1.jpg'
                                    },
                                },
                                {
                                    elem: 'content',
                                    content: [
                                        {
                                            elem: 'title',
                                            content: 'Дрель-шуруповерт аккумуляторная HITACHI DS 12DVC'
                                        },
                                        {
                                            elem: 'id',
                                            content: 'Код товара: <span>УТ000015832</span>'
                                        }
                                    ]
                                },
                                {
                                    elem: 'control',
                                    content: [
                                        {
                                            elem: 'price',
                                            content: '994 555 р'
                                        },
                                        {
                                            elem: 'number',
                                            content: {
                                                block: 'cart-control'
                                            }
                                        }
                                    ]
                                },
                                {
                                    elem: 'remove',
                                    content: '&times;'
                                }
                            ]
                        },
                        {
                            elem: 'item',
                            mods: {product:true},
                            content: [
                                {
                                    elem: 'img',
                                    content: {
                                        block: 'img-responsive',
                                        url: 'products/img-1.jpg'
                                    },
                                },
                                {
                                    elem: 'content',
                                    content: [
                                        {
                                            elem: 'title',
                                            content: 'Дрель-шуруповерт аккумуляторная HITACHI DS 12DVC'
                                        },
                                        {
                                            elem: 'id',
                                            content: 'Код товара: <span>УТ000015832</span>'
                                        }
                                    ]
                                },
                                {
                                    elem: 'control',
                                    content: [
                                        {
                                            elem: 'price',
                                            content: '994 555 р'
                                        },
                                        {
                                            elem: 'old-price',
                                            content: '574 555 р'
                                        },
                                        {
                                            elem: 'number',
                                            content: {
                                                block: 'cart-control'
                                            }
                                        }
                                    ]
                                },
                                {
                                    elem: 'remove',
                                    content: '&times;'
                                }
                            ]
                        },
                        {
                            elem: 'item',
                            content: [
                                {
                                    elem: 'shipping',
                                    content: 'Доставка: <span>200 р</span>'
                                },
                                {
                                    elem: 'total',
                                    content: [
                                        {
                                            elem: 'total-label',
                                            content: 'Итого:'
                                        },
                                        {
                                            elem: 'total-price',
                                            content: [
                                                {
                                                    elem: 'price',
                                                    content: '994 555 р'
                                                },
                                                {
                                                    elem: 'old-price',
                                                    content: '574 555 р'
                                                },
                                            ]
                                        }
                                    ]
                                }
                            ]
                        }
                    ]
                },
                {
                    block: 'checkout',
                    content: [
                        {
                            block: 'row',
                            content: [
                                {
                                    elem: 'col',
                                    mods: {lg: '8', 'lg-offset': '2'},
                                    content: [
                                        {
                                            block: 'checkout-title',
                                            content: 'Тип плательщика'
                                        },
                                        {
                                            block: 'radio',
                                            mods: {custom:true, inline:true},
                                            name: 'radio-1',
                                            content: 'Физическое лицо'
                                        },
                                        {
                                            block: 'radio',
                                            mods: {custom:true, inline:true},
                                            name: 'radio-1',
                                            content: 'Физическое лицо'
                                        },
                                        {block: 'link-dashed', tag: 'a', attrs: {
                                            href: '#select-city',
                                            'data-toggle': 'modal'
                                        }, content: 'Другой'},
                                        {
                                            block: 'checkout-line',
                                            content: [
                                                {
                                                    elem: 'label',
                                                    content: 'Выберите профиль'
                                                },
                                                {
                                                    elem: 'input',
                                                    content: [
                                                        {
                                                            block: 'select',
                                                            mods: {chosen:true},
                                                            content: [
                                                                {
                                                                    elem: 'option',
                                                                    content: 'профиль 1'
                                                                },
                                                                { 
                                                                    elem: 'option',
                                                                    content: 'профиль 2'
                                                                },
                                                                {
                                                                    elem: 'option',
                                                                    content: 'профиль 3'
                                                                },

                                                            ]
                                                        }
                                                    ]
                                                }
                                            ]
                                        },
                                        {
                                            block: 'checkout-title',
                                            content: 'Контактные данные'
                                        },
                                        {
                                            block: 'checkout-line',
                                            content: [
                                                {
                                                    elem: 'label',
                                                    mix: [{block: 'required'}],
                                                    content: 'ФИО'
                                                },
                                                {
                                                    elem: 'input',
                                                    content: [
                                                        {
                                                            block: 'input',
                                                            mods: {control:true}
                                                        }
                                                    ]
                                                }
                                            ]
                                        },
                                        {
                                            block: 'checkout-line',
                                            content: [
                                                {
                                                    elem: 'label',
                                                    mix: [{block: 'required'}],
                                                    content: 'Телефон'
                                                },
                                                {
                                                    elem: 'input',
                                                    content: [
                                                        {
                                                            block: 'input',
                                                            mods: {control:true}
                                                        }
                                                    ]
                                                }
                                            ]
                                        },
                                        {
                                            block: 'checkout-line',
                                            content: [
                                                {
                                                    elem: 'label',
                                                    mix: [{block: 'required'}],
                                                    content: 'E-Mail'
                                                },
                                                {
                                                    elem: 'input',
                                                    content: [
                                                        {
                                                            block: 'input',
                                                            mods: {control:true}
                                                        }
                                                    ]
                                                }
                                            ]
                                        },
                                        {
                                            block: 'checkout-line',
                                            content: [
                                                {
                                                    elem: 'label',
                                                    content: 'КПП'
                                                },
                                                {
                                                    elem: 'input',
                                                    content: [
                                                        {
                                                            block: 'input',
                                                            mods: {control:true}
                                                        }
                                                    ]
                                                }
                                            ]
                                        },
                                        {
                                            block: 'checkout-title',
                                            content: 'Способы доставки'
                                        },
                                        {
                                            block: 'radio',
                                            mods: {custom:true, inline:true},
                                            name: 'radio-2',
                                            content: 'Самовывоз'
                                        },
                                        {
                                            block: 'radio',
                                            mods: {custom:true, inline:true},
                                            name: 'radio-2',
                                            content: 'Доставка курьером'
                                        },
                                        {
                                            block: 'checkout-address',
                                            content: [
                                                {
                                                    elem: 'info',
                                                    content: [
                                                        {
                                                            elem: 'text',
                                                            content: 'Самовывоз осуществляется по адресу:'
                                                        },
                                                        {
                                                            block: 'radio',
                                                            mods: {custom:true},
                                                            name: 'radio-3',
                                                            content: 'Новоженова, 88'
                                                        },
                                                        {
                                                            block: 'radio',
                                                            mods: {custom:true},
                                                            name: 'radio-3',
                                                            content: 'Новоженова, 88'
                                                        },
                                                        {
                                                            block: 'radio',
                                                            mods: {custom:true},
                                                            name: 'radio-3',
                                                            content: 'Жукова, 39/2'
                                                        },
                                                    ]
                                                },
                                                {
                                                    elem: 'map',
                                                    content: 'тут карта'
                                                }
                                            ]
                                        },
                                        {
                                            block: 'checkout-title',
                                            content: 'Способы оплаты'
                                        },
                                        {
                                            block: 'radio',
                                            mods: {custom:true, inline:true},
                                            name: 'radio-2',
                                            content: 'Наличными в магазине'
                                        },
                                        {
                                            block: 'radio',
                                            mods: {custom:true, inline:true},
                                            name: 'radio-2',
                                            content: 'Наличными в магазине'
                                        },
                                        {
                                            block: 'radio',
                                            mods: {custom:true, inline:true},
                                            name: 'radio-2',
                                            content: 'Сбербанк Онлайн'
                                        },
                                        {
                                            block: 'checkout-info',
                                            content: 'Оплата наличными при самовывозе заказа из магазина'
                                        },
                                        {
                                            block: 'textarea',
                                            mix: [{block: 'mbl'}],
                                            rows: '6'
                                        },
                                        {
                                            block: 'checkout-catalog',
                                            tag: 'a',
                                            attrs: {
                                                href: '#'
                                            },
                                            content: 'Каталог товаров'
                                        },
                                        {
                                            block: 'btn',
                                            mods: {color: 'primary', size: 'lg'},
                                            content: 'ОФОРМИТЬ ЗАКАЗ'
                                        }
                                    ]
                                }
                            ]
                        }
                    ]
                }
              

                
            ]
        },
        require('../_common/footer.bemjson.js')
    ]
};