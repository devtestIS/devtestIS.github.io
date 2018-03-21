module.exports = {
    block: 'page',
    title: 'Товар детально',
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
                    content: 'Торсионный сверхпроводник: основные моменты'
                },
                {
                    block: 'product-top-line',
                    content: [
                        {
                            block: 'btn',
                            mods: {color:false, print:true},
                            mix: [{block: 'product-top-line', elem: 'btn'}],
                            content: 'распечатать страницу'
                        },
                        {
                            elem: 'id',
                            content: 'Код товара: <strong>00000017082</strong>'
                        },
                        {
                            elem: 'id',
                            content: 'Артикул поставщика: <strong>DWF0301704</strong>'
                        },
                    ]
                },
                {
                    block: 'product-detail',
                    mix: [{block: 'shadow'}],
                    content: [
                        {
                            elem: 'one',
                            content: [
                                {
                                    elem: 'label-line',
                                    content: [
                                        {
                                            block: 'star-rating',
                                            mods: {disabled: true, 'product-detail':true}
                                        },
                                        {
                                            elem: 'label',
                                            mods: {type: 'new'},
                                            content: 'Новинка'
                                        },
                                        {
                                            elem: 'label',
                                            mods: {type: 'action'},
                                            content: 'Акция'
                                        },
                                        {
                                            elem: 'label',
                                            mods: {type: 'our-choice'},
                                            content: 'Наш выбор'
                                        },
                                        {
                                            elem: 'label',
                                            mods: {type: 'season'},
                                            content: 'Товар сезона'
                                        }
                                    ]
                                },
                                {
                                    block: 'product-slider',
                                    content: [
                                        {
                                            elem: 'item',
                                            url: 'product-slider/img-big-1.jpg'
                                        },
                                        {
                                            elem: 'item',
                                            url: 'product-slider/img-big-2.jpg'
                                        },
                                        {
                                            elem: 'item',
                                            url: 'product-slider/img-big-3.jpg'
                                        },
                                        {
                                            elem: 'item',
                                            url: 'product-slider/img-big-4.jpg'
                                        },
                                        {
                                            elem: 'item',
                                            url: 'product-slider/img-big-5.jpg'
                                        },
                                        {
                                            elem: 'video',
                                            content: [
                                                {
                                                    block: 'video-youtube',
                                                    height: 'auto',
                                                    attrs: {
                                                        id: 'video-youtube'
                                                    }
                                                }
                                            ]
                                        }
                                    ]
                                },
                                {
                                    block: 'product-slider-nav',
                                    content: [
                                        {
                                            elem: 'item',
                                            url: 'product-slider/img-small-1.jpg'
                                        },
                                        {
                                            elem: 'item',
                                            url: 'product-slider/img-small-2.jpg'
                                        },
                                        {
                                            elem: 'item',
                                            url: 'product-slider/img-small-3.jpg'
                                        },
                                        {
                                            elem: 'item',
                                            url: 'product-slider/img-small-4.jpg'
                                        },
                                        {
                                            elem: 'item',
                                            url: 'product-slider/img-small-5.jpg'
                                        },
                                        {
                                            elem: 'item',
                                            mods: {video: true},
                                            url: 'product-slider/img-small-2.jpg'
                                        },

                                    ]
                                }
                            ]
                        },
                        {
                            elem: 'border',
                        },
                        {
                            elem: 'two',
                            content: [
                                {
                                    block: 'product-control',
                                    content: [
                                        {
                                            elem: 'one',
                                            content: [
                                                {
                                                    elem: 'price',
                                                    mods: {new: true, big:true},
                                                    content: [
                                                        '9 892 590 р',
                                                        {
                                                            elem: 'old-price',
                                                            content: '40 253 р'
                                                        }
                                                    ]
                                                },
                                                {
                                                    block: 'btn',
                                                    mods: {color: 'primary', cart:'lg'},
                                                    content: [
                                                        'КУПИТЬ'
                                                    ]
                                                }
                                            ]
                                        },
                                        {
                                            elem: 'two',
                                            content: [
                                                {
                                                    block: 'buy-one-click',
                                                    content: 'Купить в 1 клик'
                                                },
                                                {
                                                    block: 'btn',
                                                    mods: {color: 'info'},
                                                    mix: [{block: 'card-product', elem: 'comparison'}],
                                                    attrs: {
                                                        'data-toggle': 'tooltip',
                                                        title: 'Добавить в сравнение'
                                                    },
                                                    content: {
                                                        block: 'img',
                                                        url: 'control/comparison_red.png'
                                                    }
                                                }
                                            ]
                                        },

                                    ]
                                },
                                {
                                    block: 'product-info',
                                    mods: {border:true},
                                    content: [
                                        {
                                            elem: 'title',
                                            mods: {icon: 'track'},
                                            content: 'Доставка курьером'
                                        },
                                        {
                                            elem: 'value',
                                            content: '200 рублей'
                                        },
                                        {
                                            elem: 'label',
                                            content: 'В течение дня (или завтра)'
                                        }
                                    ]
                                },
                                {
                                    block: 'product-info',
                                    mods: {border:true},
                                    content: [
                                        {
                                            elem: 'title',
                                            mods: {icon: 'cart'},
                                            content: 'Самовывоз из магазинов Уфы БЕСПЛАТНО'
                                        },
                                        {
                                            elem: 'value',
                                            mods: {available:true},
                                            content: 'В наличии'
                                        },
                                        {
                                            elem: 'label',
                                            content: {
                                                block: 'a',
                                                content: 'Уфа, Новоженова, 88'
                                            }
                                        },
                                        {
                                            elem: 'value',
                                            mods: {available:'none'},
                                            content: 'Через 10 дней <i class="fa fa-question-circle-o" data-toggle="tooltip" data-placement="top" title="Товар в пути"></i>'
                                        },
                                        {
                                            elem: 'label',
                                            content: {
                                                block: 'a',
                                                content: 'Уфа, Менделеева, 134/4'
                                            }
                                        },
                                        {
                                            elem: 'value',
                                            mods: {available:true},
                                            content: 'В наличии'
                                        },
                                        {
                                            elem: 'label',
                                            content: {
                                                block: 'a',
                                                content: 'Уфа, Индустриальное шоссе, 7/1'
                                            }
                                        },

                                    ]
                                },
                                {
                                    block: 'product-info',
                                    mods: {border:true},
                                    content: [
                                        {
                                            elem: 'title',
                                            mods: {icon: 'plane'},
                                            content: 'Доставка в другие регионы'
                                        },
                                        {
                                            elem: 'value',
                                            content: {
                                                elem: 'link',
                                                content: 'Подробнее о доставке'
                                            }
                                        },
                                        {
                                            elem: 'label',
                                            content: 'Через 3-6 дней'
                                        }
                                    ]
                                },
                                {
                                    block: 'product-info',
                                    mods: {border:true},
                                    content: [
                                        {
                                            elem: 'title',
                                            mods: {icon: 'cash'},
                                            content: 'Способы оплаты'
                                        },
                                        {
                                            elem: 'value',
                                            content: {
                                                elem: 'link',
                                                content: 'Курьеру при доставке'
                                            }
                                        },
                                        {
                                            elem: 'label',
                                            content: 'Наличными'
                                        },
                                        {
                                            elem: 'value',
                                            content: 'В магазинах на кассе'
                                        },
                                        {
                                            elem: 'label',
                                            content: 'Наличными'
                                        },
                                        {
                                            elem: 'value',
                                            content: 'В магазинах на кассе'
                                        },
                                        {
                                            elem: 'label',
                                            content: 'Банковской картой'
                                        },
                                        {
                                            elem: 'value',
                                            content: {
                                                elem: 'link',
                                                content: 'Курьеру при доставке'
                                            }
                                        },
                                        {
                                            elem: 'label',
                                            content: 'Банковской картой'
                                        },
                                        {
                                            elem: 'value',
                                            content: {
                                                elem: 'link',
                                                content: 'Для юридических лиц длинный текст'
                                            }
                                        },
                                        {
                                            elem: 'label',
                                            content: 'Безналичным переводом неприлично длинный текст по всей длине'
                                        },
                                        {
                                            elem: 'value',
                                            content: {
                                                elem: 'link',
                                                content: 'Подробнее о кредите'
                                            }
                                        },
                                        {
                                            elem: 'label',
                                            content: 'В кредит'
                                        }

                                    ]
                                },
                            ]
                        }
                    ]
                },
                {
                    block: 'nav-tabs',
                    content: [
                        {
                            elem: 'item',
                            mods: {active:true},
                            for: 'product-description',
                            content: 'Описание'
                        },
                        {
                            elem: 'item',
                            for: 'product-features',
                            content: 'Характеристики'
                        },
                        {
                            elem: 'item',
                            for: 'product-reviews',
                            content: 'Отзывы <span>(2)</span>'
                        },
                        {
                            elem: 'item',
                            for: 'product-service',
                            content: 'Сервисные центры'
                        },
                        {
                            elem: 'item',
                            for: 'product-related',
                            content: 'С этим товаром покупают'
                        }
                    ]
                },
                {
                    block: 'tab-content',
                    content: [
                        {
                            elem: 'item',
                            mods: {active:true},
                            id: 'product-description',
                            content: [
                                {
                                    block: 'row',
                                    content: [
                                        {
                                            elem: 'col',
                                            mods: {sm: '8', md: '9'},
                                            content: [
                                                {
                                                    block: 'article',
                                                    content: [
                                                        '<p>Перфоратор DeWalt D25123K может применяться как в быту, так и на производстве. Он предназначен для создания отверстий в материалах любой плотности: дереве, бетоне, кирпиче, каменной кладке, керамике, металле пр. Это возможно благодаря трем режимам работы инструмента: сверление, сверление с долблением и долбление. Также предусмотрены блокировка вращения и отключение удара. Режим сверления следует использовать при работе по дереву, металлу, керамике, а также для работы с крепежом. Режим долбления потребуется при работе с кирпичом, бетоном, каменной кладкой или гранитом. </p>',
                                                        '<p>Для комфортной эксплуатации, конструкция перфоратора DeWalt D25123K продумана до мелочей: прорезиненная основная ручка обеспечивает надежный хват, а дополнительная — поворачивается на 360 градусов. Система отвода воздуха защищает оператора от пыли. Оптимально сбалансированный корпус имеет эргономичную форму и максимально малый вес. </p>',
                                                        '<p>Перфоратор DeWalt D25123K оснащен электронной системой регулировки скорости вращения бура, а встроенная предохранительная муфта оберегает оператора от травм, а инструмент от поломки в случае заклинивания.</p>'
                                                    ]
                                                }
                                            ]
                                        },
                                        {
                                            elem: 'col',
                                            mods: {sm: '4', md: '3'},
                                            content: [
                                                {
                                                    block: 'manual',
                                                    content: [
                                                        {
                                                            block: 'lightbox-link',
                                                            mix: [{block: 'mbm'}],
                                                            mods: {'icon-zoom': true},
                                                            url: 'article/manual.jpg',
                                                        },
                                                        {
                                                            elem: 'link',
                                                            mods: {icon: 'pdf'},
                                                            content: [
                                                                {
                                                                    block: 'a',
                                                                    content: 'Скачать инструкцию'
                                                                },
                                                                {
                                                                    elem: 'info-size',
                                                                    content: '0,87 Мб'
                                                                }
                                                            ]
                                                        }
                                                    ]
                                                },
                                            ]
                                        },

                                    ]
                                },


                            ]
                        },
                        {
                            elem: 'item',
                            id: 'product-features',
                            content: [
                                {
                                    block: 'row',
                                    content: [
                                        {
                                            elem: 'col',
                                            mods: {sm: '8'},
                                            content: [
                                                {
                                                    block: 'product-info',
                                                    content: [
                                                        {
                                                            elem: 'title',
                                                            content: '<strong>Характеристики</strong>'
                                                        },
                                                        {
                                                            elem: 'value',
                                                            content: '1200 Вт'
                                                        },
                                                        {
                                                            elem: 'label',
                                                            content: 'Мощьность'
                                                        },
                                                        {
                                                            elem: 'value',
                                                            content: '200 В'
                                                        },
                                                        {
                                                            elem: 'label',
                                                            content: 'Напряжение'
                                                        },
                                                        {
                                                            elem: 'title',
                                                            content: '<strong>Общие характеристики</strong>'
                                                        },
                                                        {
                                                            elem: 'value',
                                                            content: '20/25/32/40/50/63 мм'
                                                        },
                                                        {
                                                            elem: 'label',
                                                            content: 'Диаметр'
                                                        },
                                                        {
                                                            elem: 'value',
                                                            content: '2,5 Кг'
                                                        },
                                                        {
                                                            elem: 'label',
                                                            content: 'Вес'
                                                        },
                                                        {
                                                            elem: 'value',
                                                            content: '1 200 Вт'
                                                        },
                                                        {
                                                            elem: 'label',
                                                            content: 'Мощьность'
                                                        },
                                                        {
                                                            elem: 'value',
                                                            content: '280 С'
                                                        },
                                                        {
                                                            elem: 'label',
                                                            content: 'Температура нагрева'
                                                        }

                                                    ]
                                                },
                                            ]
                                        },
                                    ]
                                }
                            ]
                        },
                        {
                            elem: 'item',
                            id: 'product-reviews',
                            content: [
                                {
                                    block: 'reviews-line',
                                    content: [
                                        {
                                            elem: 'one',
                                            content: [
                                                {
                                                    elem: 'name',
                                                    content: 'Денис'
                                                },
                                                {
                                                    elem: 'date',
                                                    content: '25.11.2014 в 15:44'
                                                }
                                            ]
                                        },
                                        {
                                            elem: 'two',
                                            content: [
                                                {
                                                    block: 'star-rating',
                                                    mods: {disabled: true}
                                                },
                                                {
                                                    elem: 'text',
                                                    content: 'Надежный апарат. Плюсы-хорошо сидит в руках ,не перегриваеться,руки от вибрации не устают,мотор не боиться пыли, минус-фиксация кнопки не удобно расположена на рукоятке. Занимаюсь отделкой'
                                                }
                                            ]
                                        }
                                    ]
                                },
                                {
                                    block: 'reviews-line',
                                    content: [
                                        {
                                            elem: 'one',
                                            content: [
                                                {
                                                    elem: 'name',
                                                    content: 'Денис'
                                                },
                                                {
                                                    elem: 'date',
                                                    content: '25.11.2014 в 15:44'
                                                }
                                            ]
                                        },
                                        {
                                            elem: 'two',
                                            content: [
                                                {
                                                    block: 'star-rating',
                                                    mods: {disabled: true}
                                                },
                                                {
                                                    elem: 'text',
                                                    content: 'Надежный апарат. Плюсы-хорошо сидит в руках ,не перегриваеться,руки от вибрации не устают,мотор не боиться пыли, минус-фиксация кнопки не удобно расположена на рукоятке. Занимаюсь отделкой'
                                                }
                                            ]
                                        }
                                    ]
                                },
                                {
                                    block: 'btn',
                                    mods: {color: 'primary', size:'lg'},
                                    mix: [{block: 'mtl'}],
                                    attrs: {
                                        'data-toggle': 'modal',
                                        href: '#modal-write-a-review'
                                    },
                                    content: '<i class="fa fa-pencil" aria-hidden="true"></i> Написать отзыв'
                                }
                            ]
                        },
                        {
                            elem: 'item',
                            id: 'product-service',
                            content: [
                                {
                                    block: 'table-responsive',
                                    content: [
                                        require('../_common/table-product-service.bemjson.js')
                                    ]
                                }
                            ]
                        },
                        {
                            elem: 'item',
                            id: 'product-related',
                            content: [
                                {
                                    block: 'h2',
                                    mix: [{block: 'pbl'}, {block: 'mtx'}],
                                    content: 'Советуем посмотреть'
                                },
                                {
                                    block: 'row',
                                    content: [
                                        {
                                            elem: 'col',
                                            mods: {md: '4', sm: '6'},
                                            content: [
                                                {
                                                    block: 'card-product',
                                                    mods: {'no-shadow':true},
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
                                            mods: {md: '4', sm: '6'},
                                            content: [
                                                {
                                                    block: 'card-product',
                                                    mods: {'no-shadow':true},
                                                    added: true,
                                                    label: {new: 'Новинка'},
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
                                            mods: {md: '4', sm: '6'},
                                            mix: [{block: 'hidden-sm'}],
                                            content: [
                                                {
                                                    block: 'card-product',
                                                    mods: {'no-shadow':true},
                                                    label: {action: 'Акция'},
                                                    label2: {availability: 'В наличии'},
                                                    title: 'Дрель безударная 2-скоростная BOSCH GBM 16-2RE',
                                                    img: 'products/img-1.jpg',
                                                    price: '34 224 р',
                                                    features: true
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
        require('../_common/footer.bemjson.js'),
        require('../_common/modal-buy-one-click.bemjson.js'),
        require('../_common/modal-feedback.bemjson.js'),
        require('../_common/modal-write-a-review.bemjson.js'),
    ]
};
