module.exports = {
    block: 'page',
    title: 'О компании',
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
                            content: 'О компании'
                        }
                    ]
                },
                {
                    block: 'title-page',
                    content: 'Компания'
                },
                {
                    block: 'section-tags',
                    tags: [{
                        text: 'О компании',
                        active: true
                    }, {
                        text: 'Работа в “ЛидерСтройИнструмент”',
                        active: false
                    }, {
                        text: 'Сервис-центры',
                        active: false
                    }, {
                        text: 'Новости',
                        active: false
                    },{
                        text: 'Бренды',
                        active: false
                    }, {
                        text: 'Обратная связь',
                        active: false
                    }]
                }
            ]
        },
        {
            block: 'container',
            mix: {
                block: 'overflow-wrapper',
                mods: {
                    company: true
                }
            },
            mods: {fluid: 'off'},
            content: [{
                block: 'company-banner',
                content: [{
                    elem: 'row',
                    content: [{
                        elem: 'column',
                        content: [{
                            elem: 'heading',
                            tag: 'h2',
                            content: 'ЛидерСтройИнструмент'
                        }, {
                            elem: 'title',
                            tag: 'p',
                            content: 'Магазин по продаже инструмента и оборудования для строительства и ремонта. С 2006 года помогаем покупателям подобрать качественный профессиональный и домашний инструмент.'
                        }]
                    
                    }]
                }]
            }, {
                block: 'features',
                content: [{
                    elem: 'item',
                    content: [{
                        elem: 'icon',
                        content: [{
                            tag: 'img',
                            attrs: {
                                src: '../../../images/company/icons/distribution-center.png'
                            }
                        }]
                    }, {
                        elem: 'heading',
                        tag: 'h3',
                        content: 'Распределительный центр в Уфе'
                    }, {
                        elem: 'description',
                        tag: 'p',
                        content: 'Удобное географическое положение позволяет быстро доставлять заказы в любой город России'
                    }]
                }, {
                    elem: 'item',
                    content: [{
                        elem: 'icon',
                        content: [{
                            tag: 'img',
                            attrs: {
                                src: '../../../images/company/icons/delivery-points.png'
                            }
                        }]
                    }, {
                        elem: 'heading',
                        tag: 'h3',
                        content: '37 пунктов выдачи'
                    }, {
                        elem: 'description',
                        tag: 'p',
                        content: ['С бесплатной доставкой при заказе на сумму от 5 000 рублей.', {
                            block: 'a',
                            content: 'Подробнее здесь'
                        }]
                    }]
                }, {
                    elem: 'item',
                    content: [{
                        elem: 'icon',
                        content: [{
                            tag: 'img',
                            attrs: {
                                src: '../../../images/company/icons/retail-stores.png'
                            }
                        }]
                    }, {
                        elem: 'heading',
                        tag: 'h3',
                        content: 'Розничные магазины'
                    }, {
                        elem: 'description',
                        tag: 'p',
                        content: '2 магазина с просторными выставочными залами, где вы можете рассмотреть инструмент и сразу же купить его. Самые популярные товары всегда в наличии'
                    }]
                }, {
                    block: 'worker',
                    tag: 'img',
                    attrs: {
                        src: '../../../images/company/man.png',
                        alt: 'worker'
                    }
                }]
            }]
        },
        {
            block: 'list-marked',
            mix: {
              block: 'grey-section'
            },
            heading: 'А также',
            leftList: [
                'Только оригинальная продукция',
                'Более 20 000 товаров',
                'Собственный сервис-центр',
                'Постгарантийное обслуживание'
            ],
            rightList: [
                'Специальное предложение для корпоративных клиентов',
                'Специалисты по продажам проходят обучение от производителей',
                'Официальная гарантия производителей на все товары'
            ]
        },
        {
            block: 'certificates',
            mix: {
                block: 'container',
                mods: {fluid: 'off'}
            },
            content: [{
                block: 'h2',
                tag: 'h2',
                content: 'Сертификаты'
            }, {
                block: 'slider-certificates',
                content: [{
                    elem: 'item',
                    url: 'hitachi.png',
                    highRes: 'hitachi-jpg.jpg',
                    alt: 'hitachi',
                    title: 'hitachi'
                }, {
                    elem: 'item',
                    url: 'briggs-stratton.png',
                    highRes: 'briggs-stratton-jpg.jpg',
                    alt: 'briggs-stratton',
                    title: 'briggs-stratton'
                }, {
                    elem: 'item',
                    url: 'bosch.png',
                    highRes: 'bosch-jpg.jpg',
                    alt: 'bosch',
                    title: 'bosch'
                }, {
                    elem: 'item',
                    url: 'ballu.png',
                    highRes: 'ballu-jpg.jpg',
                    alt: 'ballu',
                    title: 'ballu'
                }, {
                    elem: 'item',
                    url: 'sumake.png',
                    highRes: 'sumake-jpg.jpg',
                    alt: 'sumake',
                    title: 'sumake'
                }, {
                    elem: 'item',
                    url: 'hitachi.png',
                    highRes: 'hitachi-jpg.jpg',
                    alt: 'hitachi',
                    title: 'hitachi'
                }, {
                    elem: 'item',
                    url: 'briggs-stratton.png',
                    highRes: 'briggs-stratton-jpg.jpg',
                    alt: 'briggs-stratton',
                    title: 'briggs-stratton'
                }, {
                    elem: 'item',
                    url: 'bosch.png',
                    highRes: 'bosch-jpg.jpg',
                    alt: 'bosch',
                    title: 'bosch'
                }, {
                    elem: 'item',
                    url: 'ballu.png',
                    highRes: 'ballu-jpg.jpg',
                    alt: 'ballu',
                    title: 'ballu'
                }, {
                    elem: 'item',
                    url: 'sumake.png',
                    highRes: 'sumake-jpg.jpg',
                    alt: 'sumake',
                    title: 'sumake'
                }]
            }]
        },
        {
            block: 'reviews',
            mix: {
                block: 'grey-section'
            },
            content: [{
                mix: {
                    block: 'container',
                    mods: {fluid: 'off'}
                },
                content: [{
                    block: 'h2',
                    tag: 'h2',
                    content: ['Отзывы', {
                        block: 'a',
                        content: 'Все отзывы'
                    }]
                }, {
                    elem: 'wrapper',
                    content: [{
                        elem: 'row',
                        content: [{
                            elem: 'column',
                            name: 'Рогозин Сергей',
                            date: '23 августа',
                            yandexId: '71474125',
                            advantages: 'Очень хороший магазин с отзывчивым персоналом!',
                            disadvantages: 'нет',
                            comment: 'Я уже несколько раз покупал инструмент для собственных нужд и для работы. Хорошие цены при хорошем качестве, а самое главное очень большой выбор как профессионального так и бытового инструмента и аксессуаров к нему.'
                        }, {
                            elem: 'column',
                            name: 'Рогозин Сергей',
                            date: '23 августа',
                            yandexId: '71474125',
                            advantages: 'Очень хороший магазин с отзывчивым персоналом!',
                            disadvantages: 'нет',
                            comment: 'Я уже несколько раз покупал инструмент для собственных нужд и для работы. Хорошие цены при хорошем качестве, а самое главное очень большой выбор как профессионального так и бытового инструмента и аксессуаров к нему.'
                        }, {
                            elem: 'column',
                            name: 'Рогозин Сергей',
                            date: '23 августа',
                            yandexId: '71474125',
                            advantages: 'Очень хороший магазин с отзывчивым персоналом!',
                            disadvantages: 'нет',
                            comment: 'Я уже несколько раз покупал инструмент для собственных нужд и для работы. Хорошие цены при хорошем качестве, а самое главное очень большой выбор как профессионального так и бытового инструмента и аксессуаров к нему.'
                        }, {
                            elem: 'column',
                            name: 'Рогозин Сергей',
                            date: '23 августа',
                            yandexId: '71474125',
                            advantages: 'Очень хороший магазин с отзывчивым персоналом!',
                            disadvantages: 'нет',
                            comment: 'Я уже несколько раз покупал инструмент для собственных нужд и для работы. Хорошие цены при хорошем качестве, а самое главное очень большой выбор как профессионального так и бытового инструмента и аксессуаров к нему.'
                        }]
                    }]
                }]
            }]
        },
        {
            block: 'list-marked',
            mods: {
              small: true
            },
            heading: 'Сведения об организации',
            subheading: 'ООО "ЛидерСтройИнструмент-ТТ"',
            leftList: [
                'Юридический адрес: 450022, Республика Башкортостан, ул. г. Уфа, ул. Менделеева 134/4',
                'Почтовый адрес: 450022, Республика Башкортостан, ул. г. Уфа, ул. Менделеева 134/4',
                'ИНН: 0276904719'
            ],
            rightList: [
                'КПП: 027401001',
                'ГРН: 1150280036862',
                'ОКПО: 32032579'
            ]
        },
        {
            block: 'modal',
            mix: {
                block: 'fade'
            },
            attrs: {
                id: 'imageModal'
            },
            content: [{
                block: 'modal-dialog',
                content: [{
                    block: 'modal-content',
                    content: [{
                        block: 'modal-header',
                        content: [{
                            block: 'close',
                            tag: 'button',
                            attrs: {
                                'data-dismiss': 'modal',
                                'aria-label': 'Close'
                            },
                            content: [{
                                tag: 'span',
                                attrs: {
                                    'aria-hidden': 'true'
                                },
                                content: '&times;'
                            }]
                        }]
                    }, {
                        block: 'modal-body',
                        content: [{
                            block: 'certificate-image',
                            tag: 'img',
                            attrs: {
                                src: ''
                            }
                        }]
                    }]
                }]
            }]
        },
        require('../_common/footer.bemjson.js')
    ]
};
