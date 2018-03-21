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
                                                                        mods: {arrow: 'none', popover: true},
                                                                        attrs: {
                                                                            href: '#select-city',
                                                                            'data-toggle': 'modal',
                                                                            "data-content": "<div class='nowrap'>Волгоград это ваш город? <div><a id='YES_CITY' class='btn btn-primary btn-xs' href='#'>Да</a> <a id='NO_CITY' class='btn btn-primary btn-xs' href='#'>Нет</a></div></div>"
                                                                        },
                                                                        content: '<i class="fa fa-map-marker text-danger"></i> <span>Волгоград</span>'
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
                                                        mods: {'feedback': true, color: false},
                                                        url: '#feedback',
                                                        attrs: {
                                                            'data-toggle': 'modal'
                                                        },
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
                                                    },
                                                ]
                                            },
                                            {
                                                block: 'authorization',
                                                content: [
                                                    {
                                                        block: 'btn',
                                                        mods: {'authorization': true, color: false},
                                                        content: 'войти'
                                                    },
                                                    {
                                                        block: 'btn',
                                                        mods: {'authorization': true, color: false},
                                                        content: 'регистрация'
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
                                            {block: "relative", content: [
                                                {
                                                    block: 'search',
                                                    mods: {header: true},
                                                    placeholder: 'Поиск товара'
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
                                                        elem: 'comparison',
                                                        content: [
                                                            {
                                                                block: 'btn',
                                                                mix: [{
                                                                    block: 'control-cart',
                                                                    elem: 'btn',
                                                                    mods: {type: 'star'}
                                                                }],
                                                                content: [
                                                                    {
                                                                        block: 'span',
                                                                        mix: [{block: 'hidden-xs'}, {block: 'hidden-sm'}, {block: 'hidden-md'}],
                                                                        content: 'Избранное'
                                                                    },
                                                                    {
                                                                        elem: 'count',
                                                                        content: '2'
                                                                    }
                                                                ]
                                                            },
                                                            {block: 'popup-header', content: [
                                                                {elem: 'inner', content: [
                                                                    {elem: 'body', content: [
                                                                        {block: 'teaser-product', content: [
                                                                            {elem: 'image'},
                                                                            {elem: 'body', content: [
                                                                                {elem: 'title', content: 'Дрель безударная 2-скоростная BOSCH GBM 16-2RE Дрель безударная 2-скоростная '},
                                                                                {elem: 'price', content: [
                                                                                    {block: 'span', content: '22 000 р'},
                                                                                    {block: 'span', mix: {block: 'old'}, content: '1 000 000 р'}
                                                                                ]}
                                                                            ]},
                                                                            {elem: 'close', content: [
                                                                                {block: 'fa', mix: {block: 'fa-times-circle'}}
                                                                            ]}
                                                                        ]},
                                                                        {block: 'teaser-product', mix: {block: 'fade'}, content: [
                                                                            {elem: 'image'},
                                                                            {elem: 'body', content: [
                                                                                {elem: 'title', content: 'Дрель безударная 2-скоростная BOSCH GBM 16-2RE Дрель безударная 2-скоростная '},
                                                                                {elem: 'price', content: [
                                                                                    {block: 'span', content: '22 000 р'},
                                                                                    {block: 'span', mix: {block: 'old'}, content: '1 000 000 р'}
                                                                                ]}
                                                                            ]},
                                                                            {elem: 'close', content: [
                                                                                {block: 'fa', mix: {block: 'fa-times-circle'}}
                                                                            ]}
                                                                        ]}

                                                                    ]},
                                                                    {elem: 'footer', content: [
                                                                        {elem: 'total', content: [
                                                                            {block: 'span', content: 'Итого: '},
                                                                            {tag: 'b', content: '22 000 р'},
                                                                            {block: 'span', mix: {block: 'old'}, content: '1 000 000 р'}
                                                                        ]},
                                                                        {block: 'btn', mods: {color: 'primary', block: true}, content: [
                                                                            'Перейти в избранное'
                                                                        ]}
                                                                    ]}  
                                                                ]}
                                                            ]}
                                                        ]
                                                    },
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
                                                                        mix: [{block: 'hidden-xs'}, {block: 'hidden-sm'}, {block: 'hidden-md'}],
                                                                        content: 'Корзина'
                                                                    },
                                                                    {
                                                                        elem: 'count',
                                                                        content: '1'
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
                                                                mix: [{
                                                                    block: 'control-cart',
                                                                    elem: 'btn',
                                                                    mods: {type: 'comparison'}
                                                                }],
                                                                content: [
                                                                    {
                                                                        block: 'span',
                                                                        mix: [{block: 'hidden-xs'}, {block: 'hidden-sm'}, {block: 'hidden-md'}],
                                                                        content: 'Сравнить'
                                                                    },
                                                                    {
                                                                        elem: 'count',
                                                                        content: '2'
                                                                    }
                                                                ]
                                                            }
                                                        ]
                                                    },
                                                    {
                                                        elem: 'comparison',
                                                        mix: {block: 'visible-xs'},
                                                        content: [
                                                            {
                                                                block: 'search-btn',
                                                                attrs: {
                                                                    href: '#search-mob',
                                                                    'data-toggle': 'collapse'
                                                                },
                                                                mix: [
                                                                    {block: 'fa'},
                                                                    {block: 'fa-search'},
                                                                    {block: 'btn'},
                                                                    {block: 'btn-default'}
                                                                ]
                                                            }
                                                        ]
                                                    }
                                                ]
                                            }
                                        ]
                                    },
                                    {
                                        elem: 'col',
                                        mods: {column: 'product'},
                                        content: [
                                            {block: 'product-short-line', content: [
                                                {elem: 'image', content: [
                                                    {block: 'product-slider-nav', elem: 'item', url: 'product-slider/img-small-1.jpg'}
                                                ]},
                                                {elem: 'description', content: [
                                                    {block: 'mbx', content: [
                                                        'Торсионный сверхпроводник: основные моменты'
                                                    ]},
                                                    {
                                                        block: 'star-rating',
                                                        mods: {disabled: true}
                                                    } 
                                                ]},
                                                {elem: 'price', content: [
                                                    {elem: 'new', content: '999 999 р.'},
                                                    {elem: 'old', content: '999 999 р.'}
                                                ]},
                                                {elem: 'control', content: [
                                                    {
                                                        block: 'btn',
                                                        mods: {color: 'primary', cart:true},
                                                        url: '#modal_buy',
                                                        attrs: {
                                                            'data-toggle': 'modal'
                                                        },
                                                        content: [
                                                            'В КОРЗИНУ'
                                                        ]
                                                    }
                                                ]}
                                            ]}
                                        ] 
                                    }
                                ]
                            },
                            {
                                block: 'collapse',
                                attrs: {
                                    id: 'search-mob'
                                },
                                content: [
                                    {
                                        block: 'search',
                                        mods: {mob:true},
                                        placeholder: 'Поиск товара'
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
