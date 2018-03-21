module.exports = {
    block: 'page',
    title: 'Главная авторизирован',
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
        require('../_common/header-authorized.bemjson.js'),
        require('../_common/menu.bemjson.js'),
        {
            block: 'container',
            content: [
                {
                    block: 'row',
                    content: [
                        {
                            elem: 'col',
                            mods: {md: '3'},
                            mix: [{block: 'visible-lg-block'}],
                            content: [
                                {
                                    block: 'card-product',
                                    mods: {special:true},
                                    label: {season: 'товар сезона'},
                                    title: 'Дрель безударная 2-скоростная BOSCH GBM 16-2RE',
                                    img: 'products/img-1.jpg',
                                    price: '34 224 р',
                                }
                            ]
                        },
                        {
                            elem: 'col',
                            mods: {lg: '9'},
                            content: [
                                {
                                    block: 'slider',
                                    content: [
                                        {
                                            elem: 'item',
                                            url: 'slider/img-1.jpg'
                                        },
                                        {
                                            elem: 'item',
                                            url: 'slider/img-2.jpg'
                                        }
                                    ]
                                }
                            ]
                        }
                    ]
                },
                {
                    block: 'title-line',
                    content: [
                        {
                            elem: 'title',
                            content: 'Новинки'
                        },
                        {
                            elem: 'link',
                            content: 'Посмотреть все новинки'
                        }
                    ]
                },
                {
                    block: 'row',
                    content: require('../_common/products-main-new.bemjson.js'),
                },
                {
                    block: 'title-line',
                    content: [
                        {
                            elem: 'title',
                            content: 'Наш выбор'
                        },
                        {
                            elem: 'link',
                            content: 'Посмотреть все избранные товары'
                        }
                    ]
                },
                {
                    block: 'row',
                    content: require('../_common/products-main-choice.bemjson.js'),
                },
                {
                    block: 'title-line',
                    content: [
                        {
                            elem: 'title',
                            content: 'Акции'
                        },
                        {
                            elem: 'link',
                            content: 'Посмотреть все акции'
                        }
                    ]
                },
                {
                    block: 'row',
                    content: require('../_common/products-main-actions.bemjson.js'),
                },
                {
                    block: 'title-line',
                    content: [
                        {
                            elem: 'title',
                            content: 'Бренды'
                        },
                        {
                            elem: 'link',
                            content: 'Посмотреть все бренды'
                        }
                    ]
                },
                {
                    block: 'slider-brand',
                    content: [
                        {
                            elem: 'item',
                            content: {
                                block: 'img',
                                url: 'slider-brand/img-1.jpg'
                            }
                        },
                        {
                            elem: 'item',
                            content: {
                                block: 'img',
                                url: 'slider-brand/img-2.jpg'
                            }
                        },
                        {
                            elem: 'item',
                            content: {
                                block: 'img',
                                url: 'slider-brand/img-3.jpg'
                            }
                        },
                        {
                            elem: 'item',
                            content: {
                                block: 'img',
                                url: 'slider-brand/img-4.jpg'
                            }
                        },
                        {
                            elem: 'item',
                            content: {
                                block: 'img',
                                url: 'slider-brand/img-5.jpg'
                            }
                        },
                        {
                            elem: 'item',
                            content: {
                                block: 'img',
                                url: 'slider-brand/img-1.jpg'
                            }
                        },
                        {
                            elem: 'item',
                            content: {
                                block: 'img',
                                url: 'slider-brand/img-4.jpg'
                            }
                        },
                        {
                            elem: 'item',
                            content: {
                                block: 'img',
                                url: 'slider-brand/img-2.jpg'
                            }
                        },
                    ]
                },
                {
                    block: 'row',
                    attrs: {
                        'data-height': 'equal',
                        'data-target': '.panel-block'
                    },
                    content: [
                        {
                            elem: 'col',
                            mods: {md: '4'},
                            content: [
                                {
                                    block: 'title-line',
                                    content: [
                                        {
                                            elem: 'title',
                                            content: 'Видео'
                                        },
                                        {
                                            elem: 'link',
                                            content: 'Все видео'
                                        }
                                    ]
                                },
                                {
                                    block: 'panel-block',
                                    content: [
                                        {
                                            block: 'video-link',
                                            content: [
                                                {
                                                    block: 'img-responsive',
                                                    url: 'video.jpg'
                                                }
                                            ]
                                        }
                                    ]
                                }
                            ]
                        },
                        {
                            elem: 'col',
                            mods: {md: '4'},
                            content: [
                                {
                                    block: 'title-line',
                                    content: [
                                        {
                                            elem: 'title',
                                            content: 'Новости'
                                        },
                                        {
                                            elem: 'link',
                                            content: 'Все новости'
                                        }
                                    ]
                                },
                                {
                                    block: 'panel-block',
                                    content: [
                                        {
                                            block: 'news-list',
                                            content: [
                                                {
                                                    elem: 'item',
                                                    content: [
                                                        {
                                                            elem: 'date',
                                                            content: '24-08-2015'
                                                        },
                                                        {
                                                            elem: 'link',
                                                            content: 'С 1 мая 2015года для Вашего удобства открывается магазин на Индустриальном шоссе, 7/1'
                                                        }
                                                    ]
                                                },
                                                {
                                                    elem: 'item',
                                                    content: [
                                                        {
                                                            elem: 'date',
                                                            content: '29-04-2015'
                                                        },
                                                        {
                                                            elem: 'link',
                                                            content: 'АКЦИЯ на Тепловые пушки «ИНТЕРСКОЛ» сделано в России специально для России!'
                                                        }
                                                    ]
                                                },

                                            ]
                                        }
                                    ]
                                }
                            ]
                        },
                        {
                            elem: 'col',
                            mods: {md: '4'},
                            content: [
                                {
                                    block: 'title-line',
                                    content: [
                                        {
                                            elem: 'title',
                                            content: 'Статьи'
                                        },
                                        {
                                            elem: 'link',
                                            content: 'Все статьи'
                                        }
                                    ]
                                },
                                {
                                    block: 'panel-block',
                                    content: [
                                        {
                                            block: 'article-list',
                                            content: [
                                                {
                                                    elem: 'item',
                                                    content: 'Как выбрать электропилу'
                                                },
                                                {
                                                    elem: 'item',
                                                    content: 'Что выбрать: электрическую или бензиновую пилу?'
                                                },
                                                {
                                                    elem: 'item',
                                                    content: 'Удобство применения перфоратора с пылесосом'
                                                },
                                                {
                                                    elem: 'item',
                                                    content: 'Болгарка с регулировкой оборотов'
                                                },
                                                {
                                                    elem: 'item',
                                                    content: 'Как пользоваться бензопилой'
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
        require('../_common/footer.bemjson.js')
    ]
};
