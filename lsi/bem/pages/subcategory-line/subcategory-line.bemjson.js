module.exports = {
    block: 'page',
    title: 'Подкатегории список',
    head: [{elem: 'meta', attrs: {name: 'format-detection', content: 'telephone=no'}}],
    head: [{
        elem: 'link',
        attrs: {
            href: 'https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800',
            rel: 'stylesheet',
            type: 'text/css'
        }
    }],
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
                            content: 'Каталог товаров'
                        }
                    ]
                },
                {
                    block: 'title-page',
                    mods: {inner: true},
                    content: 'Перфораторы'
                },
                {
                    block: 'row',
                    content: [
                        {
                            elem: 'col',
                            mods: {lg: '3', md: '4', sm: '5'},
                            content: [
                                {
                                    block: 'smart-filter',
                                    content: [
                                        {
                                            elem: 'title',
                                            content: 'Поиск по характеристикам'
                                        },
                                        {
                                            elem: 'block',
                                            content: [
                                                {
                                                    elem: 'subtitle',
                                                    content: 'Цена товара'
                                                },
                                                {
                                                    block: 'filter-slider',
                                                    content: [
                                                        {
                                                            elem: 'slider'
                                                        },
                                                        {
                                                            elem: 'input-min',
                                                            min: '50',
                                                            value: '806'
                                                        },
                                                        {
                                                            elem: 'label',
                                                            content: '—'
                                                        },
                                                        {
                                                            elem: 'input-max',
                                                            max: '5000',
                                                            value: '3000'
                                                        },
                                                    ]
                                                }
                                            ]
                                        },
                                        {
                                            elem: 'block',
                                            content: [
                                                {
                                                    elem: 'subtitle',
                                                    content: [
                                                        'Наш выбор',
                                                        {elem: 'question', content: [
                                                            {block: 'fa-question-circle-o'}
                                                        ]}
                                                    ]
                                                },
                                                {
                                                    block: 'ul',
                                                    mods: {unstyled: true},
                                                    content: [
                                                        {
                                                            elem: 'li',
                                                            content: {
                                                                block: 'checkbox',
                                                                mods: {custom: true},
                                                                content: [
                                                                    'Да',
                                                                    {
                                                                        elem: 'info',
                                                                        content: '(16)'
                                                                    }
                                                                ]
                                                            }
                                                        }
                                                    ]
                                                }
                                            ]
                                        },
                                        {
                                            elem: 'block',
                                            content: [
                                                {
                                                    elem: 'subtitle',
                                                    content: 'Бренд'
                                                },
                                                {
                                                    block: 'ul',
                                                    mods: {unstyled: true},
                                                    content: [
                                                        {
                                                            elem: 'li',
                                                            content: {
                                                                block: 'checkbox',
                                                                mods: {custom: true},
                                                                content: [
                                                                    'Bosch (Бош)',
                                                                    {
                                                                        elem: 'info',
                                                                        content: '(22)'
                                                                    }
                                                                ]
                                                            }
                                                        },
                                                        {
                                                            elem: 'li',
                                                            content: {
                                                                block: 'checkbox',
                                                                mods: {custom: true},
                                                                content: [
                                                                    'DeWalt (Деволт)',
                                                                    {
                                                                        elem: 'info',
                                                                        content: '(22)'
                                                                    }
                                                                ]
                                                            }
                                                        },
                                                        {
                                                            elem: 'li',
                                                            content: {
                                                                block: 'checkbox',
                                                                mods: {custom: true},
                                                                content: [
                                                                    'METABO',
                                                                    {
                                                                        elem: 'info',
                                                                        content: '(22)'
                                                                    }
                                                                ]
                                                            }
                                                        },
                                                        {
                                                            elem: 'li',
                                                            content: {
                                                                block: 'checkbox',
                                                                mods: {custom: true},
                                                                content: [
                                                                    'Makita (Макита)',
                                                                    {
                                                                        elem: 'info',
                                                                        content: '(22)'
                                                                    }
                                                                ]
                                                            }
                                                        },
                                                        {
                                                            elem: 'li',
                                                            content: {
                                                                block: 'checkbox',
                                                                mods: {custom: true},
                                                                content: [
                                                                    'Интерскол (Interskol)',
                                                                    {
                                                                        elem: 'info',
                                                                        content: '(22)'
                                                                    }
                                                                ]
                                                            }
                                                        },
                                                        {
                                                            elem: 'li',
                                                            content: {
                                                                block: 'checkbox',
                                                                mods: {custom: true},
                                                                content: [
                                                                    'Bosch (Бош)',
                                                                    {
                                                                        elem: 'info',
                                                                        content: '(22)'
                                                                    }
                                                                ]
                                                            }
                                                        },
                                                        {
                                                            elem: 'li',
                                                            content: {
                                                                block: 'checkbox',
                                                                mods: {custom: true},
                                                                content: [
                                                                    'DeWalt (Деволт)',
                                                                    {
                                                                        elem: 'info',
                                                                        content: '(22)'
                                                                    }
                                                                ]
                                                            }
                                                        },
                                                        {
                                                            elem: 'li',
                                                            content: {
                                                                block: 'checkbox',
                                                                mods: {custom: true},
                                                                content: [
                                                                    'METABO',
                                                                    {
                                                                        elem: 'info',
                                                                        content: '(22)'
                                                                    }
                                                                ]
                                                            }
                                                        },
                                                        {
                                                            elem: 'li',
                                                            content: {
                                                                block: 'checkbox',
                                                                mods: {custom: true},
                                                                content: [
                                                                    'Makita (Макита)',
                                                                    {
                                                                        elem: 'info',
                                                                        content: '(22)'
                                                                    }
                                                                ]
                                                            }
                                                        },
                                                        {
                                                            elem: 'li',
                                                            content: {
                                                                block: 'checkbox',
                                                                mods: {custom: true},
                                                                content: [
                                                                    'Интерскол (Interskol)',
                                                                    {
                                                                        elem: 'info',
                                                                        content: '(22)'
                                                                    }
                                                                ]
                                                            }
                                                        },
                                                    ]
                                                }

                                            ]
                                        },
                                        {
                                            elem: 'block',
                                            content: [
                                                {
                                                    elem: 'subtitle',
                                                    content: 'Мощность (Вт)'
                                                },
                                                {
                                                    block: 'filter-slider',
                                                    content: [
                                                        {
                                                            elem: 'slider'
                                                        },
                                                        {
                                                            elem: 'input-min',
                                                            min: '5000',
                                                            value: '5000'
                                                        },
                                                        {
                                                            elem: 'label',
                                                            content: '—'
                                                        },
                                                        {
                                                            elem: 'input-max',
                                                            max: '15000',
                                                            value: '15000'
                                                        },
                                                    ]
                                                }
                                            ]
                                        },
                                        {
                                            elem: 'block',
                                            content: [
                                                {
                                                    elem: 'subtitle',
                                                    content: 'Обороты (об/мин)'
                                                },
                                                {
                                                    block: 'filter-slider',
                                                    content: [
                                                        {
                                                            elem: 'slider'
                                                        },
                                                        {
                                                            elem: 'input-min',
                                                            min: '5000',
                                                            value: '5000'
                                                        },
                                                        {
                                                            elem: 'label',
                                                            content: '—'
                                                        },
                                                        {
                                                            elem: 'input-max',
                                                            max: '15000',
                                                            value: '15000'
                                                        },
                                                    ]
                                                }
                                            ]
                                        },
                                        {
                                            elem: 'block',
                                            content: [
                                                {
                                                    elem: 'subtitle',
                                                    content: 'Хвостовик'
                                                },
                                                {
                                                    block: 'ul',
                                                    mods: {unstyled: true},
                                                    content: [
                                                        {
                                                            elem: 'li',
                                                            content: {
                                                                block: 'checkbox',
                                                                mods: {custom: true},
                                                                content: [
                                                                    'SDS-Plus',
                                                                    {
                                                                        elem: 'info',
                                                                        content: '(12)'
                                                                    }
                                                                ]
                                                            }
                                                        },
                                                        {
                                                            elem: 'li',
                                                            content: {
                                                                block: 'checkbox',
                                                                mods: {custom: true},
                                                                content: [
                                                                    'SDS-Max',
                                                                    {
                                                                        elem: 'info',
                                                                        content: '(1)'
                                                                    }
                                                                ]
                                                            }
                                                        }
                                                    ]
                                                }
                                            ]
                                        },
                                    ]
                                }
                            ]
                        },
                        {
                            elem: 'col',
                            mods: {lg: '9', md: '8', sm: '7'},
                            content: [
                                {
                                    block: 'card-control',
                                    content: [
                                        {
                                            elem: 'label',
                                            content: 'сортировать по'
                                        },
                                        {
                                            elem: 'sorting',
                                            content: 'Новизне'
                                        },
                                        {
                                            elem: 'sorting',
                                            mods: {active: true, choice: 'down'},
                                            content: 'Популярности'
                                        },
                                        {
                                            elem: 'sorting',
                                            content: 'Цене'
                                        },
                                        {
                                            elem: 'sorting',
                                            content: 'По наличию'
                                        },
                                        {
                                            elem: 'view',
                                            content: [
                                                {
                                                    elem: 'label',
                                                    mix: [{block: 'visible-lg-inline-block'}],
                                                    content: 'Вид каталога'
                                                },
                                                {
                                                    elem: 'grid',
                                                    mods: {view: 'box'},
                                                    mix: [{block: 'active'}],
                                                },
                                                {
                                                    elem: 'grid',
                                                    mods: {view: 'line'},
                                                },
                                            ]
                                        }
                                    ]
                                },
                                {
                                    block: 'card-line',
                                    content: [
                                        {
                                            block: 'card-product-line',
                                            label2: {availability: 'В наличии'},
                                            title: 'Дрель безударная 2-скоростная BOSCH GBM 16-2RE',
                                            img: 'products/img-1.jpg',
                                            price: '34 224 р',
                                            features: true
                                        },
                                        {
                                            block: 'card-product-line',
                                            added: true,
                                            label: {new: 'Новинка'},
                                            label2: {availability: 'В наличии'},
                                            title: 'Дрель 2-скоростная BOSCH 16-2RE',
                                            img: 'products/img-1.jpg',
                                            price: '34 224 р',
                                            features: true
                                        },
                                        {
                                            block: 'card-product-line',
                                            label: {action: 'Акция'},
                                            label2: {availability: 'В наличии'},
                                            title: 'Дрель безударная BOSCH GBM 16-2RE',
                                            img: 'products/img-1.jpg',
                                            price: '34 224 р',
                                            features: true
                                        },
                                        {
                                            block: 'card-product-line',
                                            label: {'our-choice': 'Наш выбор'},
                                            label2: {'not-available': 'Нет в наличии'},
                                            title: 'Дрель безударная GBM 16-2RE',
                                            img: 'products/img-1.jpg',
                                            price: '34 224 р',
                                            features: true
                                        },
                                        {
                                            block: 'card-product-line',
                                            label: {action: 'Акция'},
                                            label2: {availability: 'В наличии'},
                                            title: 'Дрель 2-скоростная BOSCH GBM 16-2RE',
                                            img: 'products/img-1.jpg',
                                            price: '34 224 р',
                                            features: true
                                        }
                                    ]
                                }
                            ]
                        },
                    ]
                }
            ]
        },
        require('../_common/footer.bemjson.js')
    ]
}