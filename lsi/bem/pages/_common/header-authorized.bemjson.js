module.exports = [
    {
        block: 'header',
        content: [
            {
                elem: 'top',
                content: [
                    {
                        block: 'container',
                        content: [
                            {
                                block: 'top-line',
                                content: [
                                    {
                                        elem: 'col',
                                        mods: {column: 'one'},
                                        content: [ 
                                            {
                                                block: 'menu-top',
                                                content: [
                                                    {
                                                        block: 'menu-bar',
                                                        mix: [{block: 'menu-top', elem: 'btn'}]
                                                    },
                                                    {
                                                        elem: 'wrap',
                                                        content: [
                                                            {
                                                                elem: 'item',
                                                                mix: [{block: 'dropdown'}],
                                                                content: [
                                                                    {
                                                                        elem: 'link',
                                                                        attrs: {
                                                                            href: '#',
                                                                            'data-toggle': 'dropdown'
                                                                        },
                                                                        content: '<i class="fa fa-map-marker text-danger"></i> Волгоград'
                                                                    },
                                                                    {
                                                                        block: 'dropdown-menu',
                                                                        mods: {ul: true},
                                                                        content: [
                                                                            {
                                                                                elem: 'li',
                                                                                content: 'Уфа'
                                                                            },

                                                                        ]
                                                                    }
                                                                ]
                                                            },
                                                            {
                                                                elem: 'item',
                                                                mix: [{block: 'dropdown'}],
                                                                content: [
                                                                    {
                                                                        elem: 'link',
                                                                        attrs: {
                                                                            href: '#',
                                                                            'data-toggle': 'dropdown',
                                                                        },
                                                                        content: 'Магазины'
                                                                    },
                                                                    {
                                                                        block: 'dropdown-menu',
                                                                        mods: {ul: true},
                                                                        content: [
                                                                            {
                                                                                elem: 'li',
                                                                                content: 'Уфа, Маршала Жукова, 39/2'
                                                                            },
                                                                            {
                                                                                elem: 'li',
                                                                                content: 'Уфа, Маршала Жукова, 39/2'
                                                                            },
                                                                            {
                                                                                elem: 'li',
                                                                                content: 'Уфа, Маршала Жукова, 39/2'
                                                                            },
                                                                            {
                                                                                elem: 'li',
                                                                                content: 'Уфа, Маршала Жукова, 39/2'
                                                                            }
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
                                        mods: {column: 'two'},
                                        content: [
                                            {
                                                block: 'phone',
                                                content: [
                                                    {
                                                        elem: 'num',
                                                        content: '8 800 500 95 01'
                                                    },
                                                    {
                                                        elem: 'label',
                                                        content: 'звонок по России бесплатный'
                                                    }
                                                ]
                                            },
                                            {
                                                block: 'feedback',
                                                content: [
                                                    {
                                                        block: 'btn',
                                                        mods: {'feedback': true},
                                                        content: 'обратный звонок'
                                                    },
                                                ]
                                            }

                                        ]
                                    },
                                    {
                                        elem: 'col',
                                        mods: {column: 'three'},
                                        content: [
                                            {
                                                block: 'schedule',
                                                content: [
                                                    {
                                                        elem: 'label',
                                                        content: 'График работы: 9:00-19:00'
                                                    }
                                                ]
                                            },
                                            {
                                                block: 'authorization',
                                                content: [
                                                    {
                                                        elem: 'user',
                                                        mix: [{block: 'dropdown'}],
                                                        content: [
                                                            {
                                                                elem: 'link',
                                                                attrs: {
                                                                    href: '#',
                                                                    'data-toggle': 'dropdown',
                                                                },
                                                                content: 'Константин Константинопольский'
                                                            },
                                                            {
                                                                block: 'dropdown-menu',
                                                                mix: [{block: 'authorization', elem: 'menu'}],
                                                                mods: {ul:true},
                                                                content: [
                                                                    {
                                                                        elem: 'li',
                                                                        content: 'Профиль пользователя'
                                                                    },
                                                                    {
                                                                        elem: 'li',
                                                                        content: 'Заказы'
                                                                    },
                                                                    {
                                                                        elem: 'li',
                                                                        content: 'Корзина'
                                                                    },
                                                                    {
                                                                        elem: 'li',
                                                                        content: 'Выход'
                                                                    },
                                                                ]
                                                            }
                                                        ]
                                                    },
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
            {
                elem: 'mid',
                content: [
                    {
                        block: 'container',
                        content: [
                            {
                                block: 'header-main-line',
                                content: [
                                    {
                                        elem: 'col',
                                        mods: {column: 'one'},
                                        content: [
                                            {
                                                block: 'logo',
                                                content: [
                                                    {
                                                        block: 'img-responsive',
                                                        mix: [{block: 'logo', elem: 'img'}],
                                                        url: 'logo.png'
                                                    }
                                                ]
                                            }
                                        ]
                                    },
                                    {
                                        elem: 'col',
                                        mods: {column: 'two'},
                                        content: [
                                            {block: 'relative', content: [
                                                {
                                                    block: 'search',
                                                    mods: {header: true},
                                                    placeholder: 'Поиск товара'
                                                },
                                                {
                                                    block: 'search-btn',
                                                    mix: [
                                                        {block: 'fa'},
                                                        {block: 'fa-search'},
                                                        {block: 'btn'},
                                                        {block: 'btn-default'}
                                                    ]
                                                }
                                            ]}
                                        ]
                                    },
                                    {
                                        elem: 'col',
                                        mods: {column: 'three'},
                                        content: [
                                            {
                                                block: 'control-cart',
                                                content: [
                                                    {
                                                        elem: 'basket',
                                                        content: [
                                                            {
                                                                block: 'btn',
                                                                mix: [{
                                                                    block: 'control-cart',
                                                                    elem: 'btn',
                                                                    mods: {type: 'basket'}
                                                                }],
                                                                content: [
                                                                    {
                                                                        block: 'span',
                                                                        mix: [{block: 'hidden-xs'}],
                                                                        content: 'Корзина'
                                                                    }
                                                                ]
                                                            }
                                                        ]
                                                    },
                                                    {
                                                        elem: 'comparison',
                                                        content: [
                                                            {
                                                                block: 'btn',
                                                                mix: [
                                                                    {
                                                                        block: 'control-cart',
                                                                        elem: 'btn',
                                                                        mods: {type: 'comparison'}
                                                                    }, 
                                                                    { 
                                                                        block: 'disabled' 
                                                                    }
                                                                ],
                                                                content: [
                                                                    {
                                                                        block: 'span',
                                                                        mix: [{block: 'hidden-xs'}],
                                                                        content: 'Сравнить'
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
                            }

                        ]
                    }
                ]
            }
        ]
    }

];
