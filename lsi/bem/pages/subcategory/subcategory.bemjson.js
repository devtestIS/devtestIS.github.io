module.exports = {
    block: 'page',
    title: 'Подкатегории',
    head: [{elem: 'meta', attrs: {name: 'format-detection', content: 'telephone=no'}}],
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
                                    block: 'btn',
                                    mods: {color: 'primary'},
                                    mix: [{block: 'visible-xs-block collapsed'}, {block: 'mbs'}],
                                    attrs: {
                                        href: '#fast-filter-1',
                                        'data-text': '<i class="fa fa-filter" aria-hidden="true"></i> Скрыть быстрый фильтр',
                                        'data-toggle': 'collapse'
                                    },
                                    content: '<i class="fa fa-filter" aria-hidden="true"></i> Показать быстрый фильтр'
                                },
                                {
                                    block: 'collapse',
                                    mods: {'fast-filter_xs': true},
                                    attrs: {
                                        id: 'fast-filter-1'
                                    },
                                    content: [
                                        {block: 'filter-fast', content: [
                                            {mix: {block: 'row'}, content: [
                                                {mix: {block: 'row', elem: 'col', mods: {xs: 12, sm: 12, md: 6, lg: 3}}, content: [
                                                    {elem: 'item', mix: {block: 'active'}, tag: 'a', attrs: {href: '#'}, content: [
                                                        {elem: 'image', content: [
                                                            {tag: 'img', attrs: {src: 'https://placehold.it/50x50'}}
                                                        ]},
                                                        {elem: 'text', content: [
                                                            'Дрель безударная 2-скоростная BOSCH GBM 16 безударная 2-скоростная'
                                                        ]}
                                                    ]}
                                                ]},
                                                (function (item) {
                                                    return [item, item, item]
                                                })(
                                                    {mix: {block: 'row', elem: 'col', mods: {xs: 12, sm: 12, md: 6, lg: 3}}, content: [
                                                        {elem: 'item', tag: 'a', attrs: {href: '#'}, content: [
                                                            {elem: 'image', content: [
                                                                {tag: 'img', attrs: {src: 'https://placehold.it/50x50'}}
                                                            ]},
                                                            {elem: 'text', content: [
                                                                'Дрель безударная 2-скоростная BOSCH GBM 16 безударная 2-скоростная'
                                                            ]}
                                                        ]}
                                                    ]}
                                                )
                                            ]}
                                        ]}
                                    ]},
                                {
                                    block: 'btn',
                                    mods: {color: 'primary'},
                                    mix: [{block: 'visible-xs-block'}, {block: 'mbl collapsed'}],
                                    attrs: {
                                        href: '#smart-filter',
                                        'data-text': '<i class="fa fa-filter" aria-hidden="true"></i> Скрыть фильтр',
                                        'data-toggle': 'collapse'
                                    },
                                    content: '<i class="fa fa-filter" aria-hidden="true"></i> Показать фильтр'
                                },
                                {
                                    block: 'collapse',
                                    mods: {'smart-filter': true},
                                    attrs: {
                                        id: 'smart-filter'
                                    },
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
                                                                    min: '500',
                                                                    value: '807'
                                                                },
                                                                {
                                                                    elem: 'label',
                                                                    content: '—'
                                                                },
                                                                {
                                                                    elem: 'input-max',
                                                                    max: '5000',
                                                                    value: '3824'
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
                                                            content: 'Наш выбор'
                                                        },
                                                        {
                                                            block: 'ul',
                                                            mods: {unstyled: true},
                                                            mix: [{block: 'options-hide'}],
                                                            attrs: {
                                                                'data-options-hide': 'true'
                                                            },
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
                                                            mix: [{block: 'options-hide'}],
                                                            attrs: {
                                                                'data-options-hide': 'true'
                                                            },
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
                                                                            'DeWalt-DeWalt DeWalt DeWalt (Деволт)',
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
                                                                    value: ''
                                                                },
                                                                {
                                                                    elem: 'label',
                                                                    content: '—'
                                                                },
                                                                {
                                                                    elem: 'input-max',
                                                                    max: '15000',
                                                                    value: ''
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
                                                                'Обороты (об/мин)',
                                                                {
                                                                    elem: 'question',
                                                                    content: [
                                                                        {
                                                                            block: 'fa-question-circle-o',
                                                                        }
                                                                    ]
                                                                }
                                                            ]
                                                        },
                                                        {
                                                            block: 'filter-slider',
                                                            mods: {float: true},
                                                            content: [
                                                                {
                                                                    elem: 'slider'
                                                                },
                                                                {
                                                                    elem: 'input-min',
                                                                    min: '0.5',
                                                                    value: ''
                                                                },
                                                                {
                                                                    elem: 'label',
                                                                    content: '—'
                                                                },
                                                                {
                                                                    elem: 'input-max',
                                                                    max: '2.2',
                                                                    value: ''
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
                                                                'Хвостовик',
                                                                {
                                                                    elem: 'question',
                                                                    content: {
                                                                        block: 'fa-question-circle-o'
                                                                    }
                                                                }
                                                            ]
                                                        },
                                                        {
                                                            block: 'ul',
                                                            mods: {unstyled: true},
                                                            mix: [{block: 'options-hide'}],
                                                            attrs: {
                                                                'data-options-hide': 'true'
                                                            },
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
                                                {
                                                    elem: 'popover',
                                                    content: [
                                                        {
                                                            block: 'btn',
                                                            mods: {color: 'primary'},
                                                            content: [
                                                                'Показать',
                                                                {
                                                                    elem: 'count',
                                                                    mix: [{block: 'smart-filter', elem: 'count'}]
                                                                },
                                                            ]

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
                                                    mods: {view: 'line'}
                                                }
                                            ]
                                        }
                                    ]
                                },
                                {
                                    block: 'btn',
                                    mods: {color: 'primary'},
                                    mix: [{block: 'visible-sm-block collapsed'}, {block: 'mbs'}],
                                    attrs: {
                                        href: '#fast-filter',
                                        'data-text': '<i class="fa fa-filter" aria-hidden="true"></i> Скрыть быстрый фильтр',
                                        'data-toggle': 'collapse'
                                    },
                                    content: '<i class="fa fa-filter" aria-hidden="true"></i> Показать быстрый фильтр'
                                },
                                {
                                    block: 'collapse',
                                    mods: {'fast-filter': true},
                                    attrs: {
                                        id: 'fast-filter'
                                    },
                                    content: [
                                        {block: 'filter-fast', content: [
                                            {mix: {block: 'row'}, content: [
                                                {mix: {block: 'row', elem: 'col', mods: {xs: 12, sm: 12, md: 6, lg: 3}}, content: [
                                                    {elem: 'item', mix: {block: 'active'}, tag: 'a', attrs: {href: '#'}, content: [
                                                        {elem: 'image', content: [
                                                            {tag: 'img', attrs: {src: 'https://placehold.it/50x50'}}
                                                        ]},
                                                        {elem: 'text', content: [
                                                            'Дрель безударная 2-скоростная BOSCH GBM 16 безударная 2-скоростная'
                                                        ]}
                                                    ]}
                                                ]},
                                                (function (item) {
                                                    return [item, item, item]
                                                })(
                                                    {mix: {block: 'row', elem: 'col', mods: {xs: 12, sm: 12, md: 6, lg: 3}}, content: [
                                                        {elem: 'item', tag: 'a', attrs: {href: '#'}, content: [
                                                            {elem: 'image', content: [
                                                                {tag: 'img', attrs: {src: 'https://placehold.it/50x50'}}
                                                            ]},
                                                            {elem: 'text', content: [
                                                                'Дрель безударная 2-скоростная BOSCH GBM 16 безударная 2-скоростная'
                                                            ]}
                                                        ]}
                                                    ]}
                                                )
                                            ]}
                                        ]}       
                                ]},
                                {
                                    block: 'card-control-small',
                                    content: [
                                        'Сортировать по:',
                                        {
                                            block: 'card-sorting-small',
                                            mix: [{block: 'dropdown'}],
                                            content: [
                                                {
                                                    elem: 'toggle',
                                                    mix: [{block: 'btn', mods: {color: 'info'}}],
                                                    attrs: {
                                                        'data-toggle': 'dropdown'
                                                    },
                                                    content: 'Новизне <i class="fa fa-caret-down" aria-hidden="true"></i>'
                                                },
                                                {
                                                    elem: 'list',
                                                    content: [
                                                        'Новизне <i class="fa fa-caret-down" aria-hidden="true"></i>',
                                                        'Новизне <i class="fa fa-caret-up" aria-hidden="true"></i>',
                                                        'Популярности <i class="fa fa-caret-down" aria-hidden="true"></i>',
                                                        'Популярности <i class="fa fa-caret-up" aria-hidden="true"></i>',
                                                        'Цене <i class="fa fa-caret-down" aria-hidden="true"></i>',
                                                        'Цене <i class="fa fa-caret-up" aria-hidden="true"></i>',
                                                        'По наличию <i class="fa fa-caret-down" aria-hidden="true"></i>',
                                                        'По наличию <i class="fa fa-caret-up" aria-hidden="true"></i>',

                                                    ]
                                                }
                                            ]
                                        }
                                    ]
                                },
                                {
                                    block: 'row',
                                    attrs: {
                                        'data-height': 'equal',
                                        'data-target': '.card-product__features'
                                    },
                                    content: [
                                        {
                                            elem: 'col',
                                            mods: {lg: '12', md: '12'},
                                            content: [
                                                {
                                                    block: 'pagination-nav',
                                                    content: [
                                                        {
                                                            elem: 'numb',
                                                            content: [
                                                                {
                                                                    block: 'pagination',
                                                                    mix: [{block: 'mvx'}],
                                                                    content: [
                                                                        {
                                                                            elem: 'prev',
                                                                            mods: {disabled: true},
                                                                            content: '<i class="fa fa-angle-left"></i><span>Предыдущая</span>'
                                                                        },
                                                                        {
                                                                            elem: 'item',
                                                                            cls: 'active',
                                                                            content: '1'
                                                                        },
                                                                        {
                                                                            elem: 'item',
                                                                            content: '2'
                                                                        },
                                                                        {
                                                                            elem: 'item',
                                                                            content: '3'
                                                                        },
                                                                        {
                                                                            elem: 'item',
                                                                            content: '4'
                                                                        },
                                                                        {
                                                                            elem: 'item',
                                                                            content: '5'
                                                                        },
                                                                        {
                                                                            elem: 'next',
                                                                            content: '<i class="fa fa-angle-right"></i><span>Следующая</span>'
                                                                        }
                                                                    ]
                                                                },
                                                            ]
                                                        },
                                                        {
                                                            elem: 'btn',
                                                            content: [
                                                                {
                                                                    block: 'btn',
                                                                    mods: {size: 'lg'},
                                                                    content: 'Предыдущая страница'
                                                                }
                                                            ]
                                                        },

                                                    ]
                                                },
                                            ]
                                        },
                                        {
                                            elem: 'col',
                                            mods: {lg: '4', md: '6'},
                                            content: [
                                                {
                                                    block: 'card-product',
                                                    label2: {availability: 'В наличии'},
                                                    title: 'Дрель безударная 2-скоростная BOSCH GBM 16-2RE',
                                                    img: 'products/img-1.jpg',
                                                    price: '34 224 р',
                                                    features: true
                                                }
                                            ]
                                        },
                                        {
                                            elem: 'col',
                                            mods: {lg: '4', md: '6'},
                                            content: [
                                                {
                                                    block: 'card-product',
                                                    added: true,
                                                    label: {new: 'Новинка'},
                                                    label2: {availability: 'В наличии'},
                                                    title: 'Дрель безударная 2-скоростная BOSCH GBM 16 безударная 2-скоростная BOSCH GBM 16-2RE',
                                                    img: 'products/img-1.jpg',
                                                    price: '34 224 р',
                                                    features: true
                                                }
                                            ]
                                        },
                                        {
                                            elem: 'col',
                                            mods: {lg: '4', md: '6'},
                                            content: [
                                                {
                                                    block: 'card-product',
                                                    label: {action: 'Акция'},
                                                    label2: {availability: 'В наличии'},
                                                    title: 'Дрель безударная 2-скоростная BOSCH GBM 16-2RE',
                                                    img: 'products/img-1.jpg',
                                                    price: '34 224 р',
                                                    features: true
                                                }
                                            ]
                                        },
                                        {
                                            elem: 'col',
                                            mods: {lg: '4', md: '6'},
                                            content: [
                                                {
                                                    block: 'card-product',
                                                    label: {'our-choice': 'Наш выбор'},
                                                    label2: {'not-available': 'Нет в наличии'},
                                                    title: 'Дрель безударная 2-скоростная BOSCH GBM 16-2RE',
                                                    img: 'products/img-1.jpg',
                                                    price: '34 224 р',
                                                    features: true
                                                }
                                            ]
                                        },
                                        {
                                            elem: 'col',
                                            mods: {lg: '4', md: '6'},
                                            content: [
                                                {
                                                    block: 'card-product',
                                                    label: {action: 'Акция'},
                                                    label2: {availability: 'В наличии'},
                                                    title: 'Дрель безударная 2-скоростная BOSCH GBM 16-2RE',
                                                    img: 'products/img-1.jpg',
                                                    price: '34 224 р',
                                                    features: true
                                                }
                                            ]
                                        },
                                        {
                                            elem: 'col',
                                            mods: {lg: '4', md: '6'},
                                            content: [
                                                {
                                                    block: 'card-product',
                                                    label: {action: 'Акция'},
                                                    label2: {availability: 'В наличии'},
                                                    title: 'Дрель безударная 2-скоростная BOSCH GBM 16-2RE',
                                                    img: 'products/img-1.jpg',
                                                    price: '34 224 р',
                                                    features: true
                                                }
                                            ]
                                        },
                                        {
                                            elem: 'col',
                                            mods: {xs: '12'},
                                            content: [
                                                {
                                                    block: 'pagination-nav',
                                                    content: [
                                                        {
                                                            elem: 'btn',
                                                            content: [
                                                                {
                                                                    block: 'btn',
                                                                    mods: {size: 'lg'},
                                                                    content: 'Показать ещё'
                                                                }
                                                            ]
                                                        },
                                                        {
                                                            elem: 'numb',
                                                            content: [
                                                                {
                                                                    block: 'pagination',
                                                                    mix: [{block: 'mvx'}],
                                                                    content: [
                                                                        {
                                                                            elem: 'prev',
                                                                            mods: {disabled: true},
                                                                            content: '<i class="fa fa-angle-left"></i><span>Предыдущая</span>'
                                                                        },
                                                                        {
                                                                            elem: 'item',
                                                                            cls: 'active',
                                                                            content: '1'
                                                                        },
                                                                        {
                                                                            elem: 'item',
                                                                            content: '2'
                                                                        },
                                                                        {
                                                                            elem: 'item',
                                                                            content: '3'
                                                                        },
                                                                        {
                                                                            elem: 'item',
                                                                            content: '4'
                                                                        },
                                                                        {
                                                                            elem: 'item',
                                                                            content: '5'
                                                                        },
                                                                        {
                                                                            elem: 'next',
                                                                            content: '<i class="fa fa-angle-right"></i><span>Следующая</span>'
                                                                        }
                                                                    ]
                                                                },
                                                            ]
                                                        }
                                                    ]
                                                }
                                            ]
                                        }
                                    ]
                                },

                            ]
                        }
                    ]
                },
                {content: [
                    {
                        block: 'slider-article',
                        attrs: {
                            'data-ex': '1',
                            'data-xs': '1',
                            'data-sm': '2',
                            'data-md': '3',
                            'data-lg': '3'

                        },
                        content: [
                            (function(item){
                                return [item, item, item, item, item, item, item, item, item, item, item, item, item, item, item, item]
                            })({
                                elem: 'item', content: [
                                    {elem: 'inner', content: [
                                        {elem: 'image', content: [
                                            {block: 'img', mix: {block: 'img-responsive'}, attrs: {
                                                'src': 'https://placehold.it/80x100'
                                            }}
                                        ]},
                                        {elem: 'body', content: [
                                            {elem: 'title', content: 'Рассрочка на мотоблоки 0-0-6! Рассрочка на мотоблоки 0-0-6! Рассрочка на мотоблоки 0-0-6!'},
                                            {elem: 'description', content: 'До 23 марта вы можете купить мотоблок Caiman, MasterYard, Нева, Husqvarna и других производителей в рассрочку на полгода без...'}
                                        ]}
                                    ]}
                                ]
                            })
                        ]
                    }
                ]}
            ]
        },
        {
            block: 'recommend-products',
            mix: [{block: 'hidden-xs'}],
            content: [
                {
                    block: 'container',
                    content: [
                        {
                            block: 'h2',
                            content: 'Также рекомендуем посмотреть:'
                        },
                    ]
                },
                {
                    block: 'catalog',
                    mods: {recommend: true},
                    content: [
                        {
                            elem: 'container',
                            mix: [{block: 'container', mods: {fluid: 'off'}}],
                            content: [
                                {
                                    elem: 'list',
                                    content: [
                                        {
                                            elem: 'item',
                                            content: [
                                                {
                                                    elem: 'img',
                                                    url: 'catalog/img-1.jpg'
                                                },
                                                {
                                                    elem: 'title',
                                                    content: 'Электроинструмент'
                                                }
                                            ]
                                        },
                                        {
                                            elem: 'item',
                                            content: [
                                                {
                                                    elem: 'img',
                                                    url: 'catalog/img-2.jpg'
                                                },
                                                {
                                                    elem: 'title',
                                                    content: 'Строительная и дорожная техника'
                                                }
                                            ]
                                        },
                                        {
                                            elem: 'item',
                                            content: [
                                                {
                                                    elem: 'img',
                                                    url: 'catalog/img-3.jpg'
                                                },
                                                {
                                                    elem: 'title',
                                                    content: 'Садовая техника'
                                                }
                                            ]
                                        },
                                        {
                                            elem: 'item',
                                            content: [
                                                {
                                                    elem: 'img',
                                                    url: 'catalog/img-4.jpg'
                                                },
                                                {
                                                    elem: 'title',
                                                    content: 'Электростанции'
                                                }
                                            ]
                                        },
                                        {
                                            elem: 'item',
                                            content: [
                                                {
                                                    elem: 'img',
                                                    url: 'catalog/img-5.jpg'
                                                },
                                                {
                                                    elem: 'title',
                                                    content: 'Сварочное и силовое оборудование'
                                                }
                                            ]
                                        },
                                        {
                                            elem: 'item',
                                            content: [
                                                {
                                                    elem: 'img',
                                                    url: 'catalog/img-6.jpg'
                                                },
                                                {
                                                    elem: 'title',
                                                    content: 'Автомоечное и автосервисное оборудование'
                                                }
                                            ]
                                        }
                                    ]
                                }
                            ]
                        }
                    ]
                }
            ]
        },
        {
            block: 'container',
            content: [
                {
                    block: 'article',
                    content: [
                        {
                            block: 'h2',
                            content: 'Главный инструмент строителя - перфоратор'
                        },
                        '<strong>Перфоратор</strong> – это специальный многофункциональный строительный прибор, который позволяет формировать отверстия в самых разных материалах, в том числе и в железобетонных конструкциях.',
                        '<br>Эти устройства имеют несколько режимов работы, таких как:<br>',
                        '<ul><li>вращение без удара;</li><li>вращение с ударом;</li><li>режим отбойного молотка (удар без вращения).</li></ul>',
                        'Многие считают, что перфоратор купить стоит исключительно профессиональным строителям. Но это не так. Эти механизмы прекрасно могут быть использованы и в бытовых условиях для решения самых разных задач. По крайней мере, настоящий хозяин применение этому инструменту найдет всегда.',
                        '<h2>Перфораторы SDS-плюс</h2>',
                        'Необходимо отметить, что эти устройства наиболее распространены. Связано это с тем, что они достаточно легки и могут быть использованы в большинстве строительных операций. SDS-plus используют особый тип патрона, который фиксирует хвостовик D=10 мм. Стоит понимать, что речь идет не о диаметре сверла, а именно о той части, которая помещается в патрон. Сам хвостовик, предназначенный для использования в перфораторах SDS-plus, имеет 4 паза. Два из них являются направляющими и предназначены для помещения правильным образом сверла в патроне. Еще два – для фиксации с помощью специальных шариков внутри патрона. Они являются закрытыми, то есть не имеют выхода на торец. Рассматриваемые модели относятся к легкому и среднему классу, и способны делать отверстия до 26 мм. Для больших отверстий используются специальные полые насадки.',
                        '<br><br><br><h2>Есть вопросы? Звоните:  <strong class="phone-bottom">8 800 500 95 01</strong></h2><br><br><br>'
                    ]
                }
            ]
        },
        require('../_common/footer.bemjson.js')
    ]
};