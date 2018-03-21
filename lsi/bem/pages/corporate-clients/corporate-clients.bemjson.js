module.exports = {
    block: 'page',
    title: 'Корпоративным клиентам',
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
            tag: 'nav',
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
                            content: 'Корпоративным клиентам'
                        }
                    ]
                },
                {
                    block: 'title-page',
                    content: 'Корпоративным клиентам'
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
                block: 'corporate-banner',
                tag: 'section',
                content: [{
                    elem: 'row',
                    content: [{
                        elem: 'heading',
                        tag: 'h2',
                        content: 'Компания «ЛидерСтройИнструмент» - это:\n'
                    }, {
                        elem: 'column',
                        content: [{
                            elem: 'icons',
                            tag: 'img',
                            attrs: {
                                src: '../../../images/corporate/feature1.png',
                                alt: 'Только оригинальная продукция'
                            }
                        }, {
                            tag: 'span',
                            content: 'Только оригинальная продукция'
                        }]
                    }, {
                        elem: 'column',
                        content: [{
                            elem: 'icons',
                            tag: 'img',
                            attrs: {
                                src: '../../../images/corporate/feature2.png',
                                alt: 'Cобственный сервис-центр, розничные магазины'
                            }
                        }, {
                            tag: 'span',
                            content: 'Cобственный сервис-центр, розничные магазины'
                        }]
                    }, {
                        elem: 'column',
                        content: [{
                            elem: 'icons',
                            tag: 'img',
                            attrs: {
                                src: '../../../images/corporate/feature3.png',
                                alt: 'Доставка транспортными компаниями и собственной службой доставки'
                            }
                        }, {
                            tag: 'span',
                            content: 'Доставка транспортными компаниями и собственной службой доставки'
                        }]
                    }, {
                        elem: 'column',
                        content: [{
                            elem: 'icons',
                            tag: 'img',
                            attrs: {
                                src: '../../../images/corporate/feature4.png',
                                alt: '10 лет на рынке строительного оборудования и инструмента'
                            }
                        }, {
                            tag: 'span',
                            content: '10 лет на рынке строительного оборудования и инструмента'
                        }]
                    }, {
                        elem: 'description',
                        tag: 'p',
                        content: [{
                            tag: 'a',
                            attrs: {
                              href: 'javascript:void(0);'
                            },
                            content: 'Наши клиенты'
                        }, ' – государственные и частные компании, для которых мы – надежный поставщик станков, профессионального инструмента, расходных материалов']
                    }]
                }]
            }, {
                block: 'corporate-features',
                tag: 'section',
                content: [{
                    tag: 'h2',
                    content: 'Почему выбирают нас'
                }, {
                    elem: 'row',
                    content: [{
                        elem: 'item',
                        content: [{
                            elem: 'icon',
                            content: [{
                                tag: 'img',
                                attrs: {
                                    src: '../../../images/corporate/features/manager.png'
                                }
                            }]
                        }, {
                            elem: 'text',
                            content: [{
                                elem: 'heading',
                                tag: 'h3',
                                content: 'Персональный менеджер'
                            }, {
                                elem: 'description',
                                tag: 'p',
                                content: 'Поможет разобраться в технических характеристиках, подберет оборудование для любых работ.'
                            }]
                        }]
                    }, {
                        elem: 'item',
                        content: [{
                            elem: 'icon',
                            content: [{
                                tag: 'img',
                                attrs: {
                                    src: '../../../images/corporate/features/sales.png'
                                }
                            }]
                        }, {
                            elem: 'text',
                            content: [{
                                elem: 'heading',
                                tag: 'h3',
                                content: 'Индивидуальные скидки'
                            }, {
                                elem: 'description',
                                tag: 'p',
                                content: 'Удобное географическое положение позволяет быстро доставлять заказы в любой город России. Размер скидки зависит от объемов закупки.'
                            }]
                        }]
                    }, {
                        elem: 'item',
                        content: [{
                            elem: 'icon',
                            content: [{
                                tag: 'img',
                                attrs: {
                                    src: '../../../images/corporate/features/shipments.png'
                                }
                            }]
                        }, {
                            elem: 'text',
                            content: [{
                                elem: 'heading',
                                tag: 'h3',
                                content: 'Оптовые отгрузки'
                            }, {
                                elem: 'description',
                                tag: 'p',
                                content: 'Из распределительного центра в Уфе в любой город России'
                            }]
                        }]
                    }, {
                        elem: 'item',
                        content: [{
                            elem: 'icon',
                            content: [{
                                tag: 'img',
                                attrs: {
                                    src: '../../../images/corporate/features/stock.png'
                                }
                            }]
                        }, {
                            elem: 'text',
                            content: [{
                                elem: 'heading',
                                tag: 'h3',
                                content: 'Ассортимент товаров'
                            }, {
                                elem: 'description',
                                tag: 'p',
                                content: 'Более 20 000 наименований. Самые популярные товары всегда в наличии'
                            }]
                        }]
                    }, {
                        elem: 'item',
                        content: [{
                            elem: 'icon',
                            content: [{
                                tag: 'img',
                                attrs: {
                                    src: '../../../images/corporate/features/departure.png'
                                }
                            }]
                        }, {
                            elem: 'text',
                            content: [{
                                elem: 'heading',
                                tag: 'h3',
                                content: 'Выезд менеджера'
                            }, {
                                elem: 'description',
                                tag: 'p',
                                content: 'Задайте вопросы специалисту по работе с корпоративными клиентами лично'
                            }]
                        }]
                    }, {
                        elem: 'item',
                        content: [{
                            elem: 'icon',
                            content: [{
                                tag: 'img',
                                attrs: {
                                    src: '../../../images/corporate/features/delivery.png'
                                }
                            }]
                        }, {
                            elem: 'text',
                            content: [{
                                elem: 'heading',
                                tag: 'h3',
                                content: 'Курьерская доставка'
                            }, {
                                elem: 'description',
                                tag: 'p',
                                content: ['Собственная курьерская служба доставит заказ бесплатно. ', {
                                    tag: 'a',
                                    content: 'Подробности здесь'
                                }]
                            }]
                        }]
                    }]
                }]
            }]
        },
        {
            block: 'certificates',
            tag: 'section',
            mix: {
                block: 'container',
                mods: {fluid: 'off'}
            },
            content: [{
                block: 'h2',
                tag: 'h2',
                content: 'Корпоративный отдел'
            }, {
                block: 'slider-corporate',
                content: [{
                    elem: 'item',
                    url: 'slide1.jpg',
                    highRes: 'slide1.jpg',
                    alt: 'slide1',
                    title: 'slide1'
                }, {
                    elem: 'item',
                    url: 'slide2.jpg',
                    highRes: 'slide2.jpg',
                    alt: 'slide2',
                    title: 'slide2'
                }, {
                    elem: 'item',
                    url: 'slide3.jpg',
                    highRes: 'slide3.jpg',
                    alt: 'slide3',
                    title: 'slide3'
                }, {
                    elem: 'item',
                    url: 'slide4.jpg',
                    highRes: 'slide4.jpg',
                    alt: 'slide4',
                    title: 'slide4'
                }, {
                    elem: 'item',
                    url: 'slide5.jpg',
                    highRes: 'slide5.jpg',
                    alt: 'slide5',
                    title: 'slide5'
                }, {
                    elem: 'item',
                    url: 'slide1.jpg',
                    highRes: 'slide1.jpg',
                    alt: 'slide1',
                    title: 'slide1'
                }, {
                    elem: 'item',
                    url: 'slide2.jpg',
                    highRes: 'slide2.jpg',
                    alt: 'slide2',
                    title: 'slide2'
                }, {
                    elem: 'item',
                    url: 'slide3.jpg',
                    highRes: 'slide3.jpg',
                    alt: 'slide3',
                    title: 'slide3'
                }, {
                    elem: 'item',
                    url: 'slide4.jpg',
                    highRes: 'slide4.jpg',
                    alt: 'slide4',
                    title: 'slide4'
                }, {
                    elem: 'item',
                    url: 'slide5.jpg',
                    highRes: 'slide5.jpg',
                    alt: 'slide5',
                    title: 'slide5'
                }]
            }]
        },
        {
            block: 'reviews',
            tag: 'section',
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
            block: 'company-clients',
            tag: 'section',
            mix: {
                block: 'container',
                mods: {fluid: 'off'}
            },
            tag: 'section',
            content: [{
                tag: 'h2',
                content: 'Клиенты компании'
            }, {
                elem: 'wrapper',
                content: [{
                    elem: 'row',
                    content: [{
                        elem: 'item',
                        tag: 'a',
                        attrs: {
                          href: '#'
                        },
                        content: [{
                            elem: 'logo',
                            tag: 'img',
                            attrs: {
                                src: '../../../images/clients/makita.png',
                                alt: 'makita'
                            }
                        }]
                    }, {
                        elem: 'item',
                        tag: 'a',
                        attrs: {
                            href: '#'
                        },
                        content: [{
                            elem: 'logo',
                            tag: 'img',
                            attrs: {
                                src: '../../../images/clients/palisad.png',
                                alt: 'palisad'
                            }
                        }]
                    }, {
                        elem: 'item',
                        tag: 'a',
                        attrs: {
                            href: '#'
                        },
                        content: [{
                            elem: 'logo',
                            tag: 'img',
                            attrs: {
                                src: '../../../images/clients/uni.png',
                                alt: 'ЮниМастер'
                            }
                        }]
                    }, {
                        elem: 'item',
                        tag: 'a',
                        attrs: {
                            href: '#'
                        },
                        content: [{
                            elem: 'logo',
                            tag: 'img',
                            attrs: {
                                src: '../../../images/clients/carver.png',
                                alt: 'carver'
                            }
                        }]
                    }, {
                        elem: 'item',
                        tag: 'a',
                        attrs: {
                            href: '#'
                        },
                        content: [{
                            elem: 'logo',
                            tag: 'img',
                            attrs: {
                                src: '../../../images/clients/kobelco.png',
                                alt: 'kobelco'
                            }
                        }]
                    }, {
                        elem: 'item',
                        tag: 'a',
                        attrs: {
                            href: '#'
                        },
                        content: [{
                            elem: 'logo',
                            tag: 'img',
                            attrs: {
                                src: '../../../images/clients/makita.png',
                                alt: 'makita'
                            }
                        }]
                    }, {
                        elem: 'item',
                        tag: 'a',
                        attrs: {
                            href: '#'
                        },
                        content: [{
                            elem: 'logo',
                            tag: 'img',
                            attrs: {
                                src: '../../../images/clients/palisad.png',
                                alt: 'palisad'
                            }
                        }]
                    }, {
                        elem: 'item',
                        tag: 'a',
                        attrs: {
                            href: '#'
                        },
                        content: [{
                            elem: 'logo',
                            tag: 'img',
                            attrs: {
                                src: '../../../images/clients/uni.png',
                                alt: 'ЮниМастер'
                            }
                        }]
                    }, {
                        elem: 'item',
                        tag: 'a',
                        attrs: {
                            href: '#'
                        },
                        content: [{
                            elem: 'logo',
                            tag: 'img',
                            attrs: {
                                src: '../../../images/clients/carver.png',
                                alt: 'carver'
                            }
                        }]
                    }, {
                        elem: 'item',
                        tag: 'a',
                        attrs: {
                            href: '#'
                        },
                        content: [{
                            elem: 'logo',
                            tag: 'img',
                            attrs: {
                                src: '../../../images/clients/kobelco.png',
                                alt: 'kobelco'
                            }
                        }]
                    }]
                }]
            }]
        },
        {
            block: 'become-customer',
            tag: 'section',
            mix: {
                block: 'container',
                mods: {fluid: 'off'}
            },
            content: [{
                elem: 'panel',
                content: [{
                    elem: 'information',
                    content: [{
                        elem: 'row',
                        content: [{
                            elem: 'wrapper',
                            content: [{
                                tag: 'h2',
                                content: 'Как стать клиентом компании «ЛидерСтройИнструмент»'
                            }, {
                                elem: 'contact',
                                content: [{
                                    tag: 'img',
                                    attrs: {
                                        src: '../../../images/contacts/email.png',
                                        alt: ''
                                    }
                                }, {
                                    tag: 'p',
                                    content: ['Отправьте письмо \n' +
                                    'на почту ', {
                                        tag: 'a',
                                        attrs: {
                                            href: 'mailto:zakaz@lsiufa.ru'
                                        },
                                        content: 'zakaz@lsiufa.ru'
                                    }]
                                }]
                            }, {
                                elem: 'contact',
                                content: [{
                                    tag: 'img',
                                    attrs: {
                                        src: '../../../images/contacts/phone.png',
                                        alt: ''
                                    }
                                }, {
                                    tag: 'p',
                                    content: ['Позвоните по телефону', {
                                        elem: 'phone',
                                        tag: 'span',
                                        content: '8 (800) 500-95-01'
                                    }]
                                }]
                            }]
                        }]
                    }]
                }, {
                    elem: 'picture',
                    tag: 'img',
                    attrs: {
                        src: '../../../images/corporate/become-customer.png',
                        alt: ''
                    }
                }]
            }]
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
