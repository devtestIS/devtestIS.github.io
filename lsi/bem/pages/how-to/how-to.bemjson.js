module.exports = {
    block: 'page',
    title: 'Как оформить заказ',
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
                            content: 'Как оформить заказ'
                        }
                    ]
                },
                {
                    block: 'title-page',
                    content: 'Как оформить заказ'
                },
                {
                    block: 'section-tags',
                    tags: [{
                        text: 'О компании',
                        active: true
                    }, {
                        text: 'Работа в “ЛидерСтройИнструмент” ',
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
            mods: {fluid: 'off'},
            content: [{
                block: 'ordering-points',
                content: [{
                    elem: 'column',
                    content: [{
                        elem: 'thumbnail',
                        tag: 'figure',
                        content: [{
                            elem: 'wrapper',
                            tag: 'a',
                            attrs: {
                                href: '../../../images/ordering-points/point1.png',
                                'data-lightbox': 'point1'
                            },
                            content: [ {
                                tag: 'img',
                                attrs: {
                                    src: '../../../images/ordering-points/point1.png',
                                    alt: '',
                                    'data-lightbox': 'point1'
                                }
                            }]
                        }, {
                            elem: 'caption',
                            tag: 'figcaption',
                            content: 'Выберите свой город в меню слева вверху, если этого не произошло автоматически. Это необходимо, чтобы сайт отображал актуальную информацию о наличии товара и сроках доставки в ваш город. Если вашего города в списке нет, сразу переходите ко второму пункту.'
                        }]
                    }]
                }, {
                    elem: 'column',
                    content: [{
                        elem: 'thumbnail',
                        tag: 'figure',
                        content: [{
                            elem: 'wrapper',
                            tag: 'a',
                            attrs: {
                                href: '../../../images/ordering-points/point2.png',
                                'data-lightbox': 'point2'
                            },
                            content: [ {
                                tag: 'img',
                                attrs: {
                                    src: '../../../images/ordering-points/point2.png',
                                    alt: '',
                                    'data-lightbox': 'point2'
                                }
                            }]
                        }, {
                            elem: 'caption',
                            tag: 'figcaption',
                            content: 'Перейдите в  карточку интересующего вас товара и нажмите кнопку «Купить».'
                        }]
                    }]
                }, {
                    elem: 'column',
                    content: [{
                        elem: 'thumbnail',
                        tag: 'figure',
                        content: [{
                            elem: 'wrapper',
                            tag: 'a',
                            attrs: {
                                href: '../../../images/ordering-points/point3.png',
                                'data-lightbox': 'point3'
                            },
                            content: [ {
                                tag: 'img',
                                attrs: {
                                    src: '../../../images/ordering-points/point3.png',
                                    alt: ''
                                }
                            }]
                        }, {
                            elem: 'caption',
                            tag: 'figcaption',
                            content: ['На экране появится окно:', {
                                tag: 'br'
                            }, 'Если вы нажмете кнопку «Продолжить покупки», окно исчезнет, и вы вернетесь в карточку товара. Если хотите сразу перейти к оформлению заказа, нажмите на соответствующую кнопку, и вы окажетесь на странице оформления заказа']
                        }]
                    }]
                }, {
                    elem: 'column',
                    content: [{
                        elem: 'thumbnail',
                        tag: 'figure',
                        content: [{
                            elem: 'wrapper',
                            tag: 'picture',
                            content: [{
                                tag: 'img',
                                attrs: {
                                    src: '../../../images/ordering-points/point4.png',
                                    alt: ''
                                }
                            }]
                        }, {
                            elem: 'caption',
                            tag: 'figcaption',
                            content: 'Укажите тип плательщика, свои контактные данные'
                        }]
                    }]
                }, {
                    elem: 'column',
                    content: [{
                        elem: 'thumbnail',
                        tag: 'figure',
                        content: [{
                            elem: 'wrapper',
                            tag: 'picture',
                            content: [{
                                tag: 'img',
                                attrs: {
                                    src: '../../../images/ordering-points/point5.png',
                                    alt: ''
                                }
                            }]
                        }, {
                            elem: 'caption',
                            tag: 'figcaption',
                            content: 'Выберите город, способ доставки и оплаты'
                        }]
                    }]
                }, {
                    elem: 'column',
                    content: [{
                        elem: 'thumbnail',
                        tag: 'figure',
                        content: [{
                            elem: 'wrapper',
                            tag: 'picture',
                            content: [{
                                tag: 'img',
                                attrs: {
                                    src: '../../../images/ordering-points/point6.png',
                                    alt: ''
                                }
                            }]
                        }, {
                            elem: 'caption',
                            tag: 'figcaption',
                            content: 'При необходимости добавьте комментарий в специальное поле в самом низу страницы. После того, как все поля будут заполнены, нажмите кнопку «Оформить заказ».'
                        }]
                    }]
                }, {
                    elem: 'column',
                    content: [{
                        elem: 'thumbnail',
                        tag: 'figure',
                        content: [{
                            elem: 'wrapper',
                            tag: 'picture',
                            content: [{
                                tag: 'img',
                                attrs: {
                                    src: '../../../images/ordering-points/point7.png',
                                    alt: ''
                                }
                            }]
                        }, {
                            elem: 'caption',
                            tag: 'figcaption',
                            content: 'После вы окажетесь на этой странице\n'
                        }]
                    }]
                }, {
                    elem: 'column',
                    content: [{
                        elem: 'thumbnail',
                        tag: 'figure',
                        content: [{
                            elem: 'wrapper',
                            tag: 'picture',
                            content: [{
                                tag: 'img',
                                attrs: {
                                    src: '../../../images/ordering-points/point8.png',
                                    alt: ''
                                }
                            }]
                        }, {
                            elem: 'caption',
                            tag: 'figcaption',
                            content: 'В течение часа с вами свяжется специалист по работе с клиентами для подтверждения заказа.\n' +
                            'Чтобы просмотреть свой заказ, выберите пункт «Мои заказы»'
                        }]
                    }]
                }, {
                    elem: 'column',
                    content: [{
                        elem: 'thumbnail',
                        tag: 'figure',
                        content: [{
                            elem: 'wrapper',
                            tag: 'picture',
                            content: [{
                                tag: 'img',
                                attrs: {
                                    src: '../../../images/ordering-points/point9.png',
                                    alt: ''
                                }
                            }]
                        }, {
                            elem: 'caption',
                            tag: 'figcaption',
                            content: 'Если вы не авторизованы, сайт предложит войти под своим адресом электронной почты и паролем.'
                        }]
                    }]
                }]
            }, {
                block: 'ordering-alert',
                content: [{
                    elem: 'sign',
                    content: [{
                        elem: 'exclamation',
                        tag: 'span',
                        content: [{
                            block: 'icomoon',
                            icon: 'exclamation'
                        }]
                    }]
                }, {
                    elem: 'text',
                    content: [{
                        tag: 'p',
                        content: 'Чтобы сделать заказ, регистрироваться самому не обязательно. При оформлении заказа это произойдёт автоматически и на вашу электронную почту придут регистрационные данные, с которыми вы можете войти в личный кабинет.'
                    }]
                }]
            }]
        },
        require('../_common/footer.bemjson.js')
    ]
};
