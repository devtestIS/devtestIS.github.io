module.exports = {
    block: 'page',
    title: 'Личный кабинет',
    id: 'PERSONAL',
    responsiveDisable: true,
    styles: [{elem: 'css', url: '../_merged/_merged.css'}],
    scripts: [
        {elem: 'js', url: '../_merged/_merged.async.js', async: true},
        {elem: 'js', url: '../_merged/_merged.js'},
        {elem: 'js', url: '../_merged/_merged.i18n.ru.js'}
    ],
    content: [{
            block: 'noresponse',
            content: [
                require('../_common/header.bemjson.js'),
                {
                    block: 'main',
                    content: [
                        {
                            block: 'pattern',
                            mods: {type: 'accent'},
                            mix: [{block: 'pbl'}],
                            content: [
                                {
                                    mix: {
                                        block: 'container',
                                        mods: {
                                            noresponse: true
                                        }
                                        }, content: [
                                    {
                                        block: 'clearfix',
                                        content: [
                                            {
                                                block: 'h', size: '1', mix: {block: 'pull-left'}, content: [
                                                'Личный кабинет'
                                            ]
                                            },
                                            {
                                                block: 'settings',
                                                tag: 'button',
                                                attrs: {
                                                    type: 'button'
                                                },
                                                content: [
                                                    {
                                                        block: 'icomoon',
                                                        icon: 'settings',
                                                        mix: {
                                                            block: 'mrs'
                                                        }
                                                    },
                                                    'Настройки'
                                                ]
                                            }
                                        ]
                                    },
                                    {
                                        block: 'company',
                                        mix: {
                                            block: 'thumbnails'
                                        },
                                        content: [{
                                            mix: {
                                                block: 'row'
                                            },
                                            content: [{
                                                block: 'personal-title',
                                                content: [
                                                    'Моя компания'
                                                ]
                                            },
                                                {
                                                    elem: 'name',
                                                    content: [
                                                        'ООО «ЛУЧ»', {
                                                            block: 'change-button',
                                                            content: 'Редактировать',
                                                            target: '#edit-modal'
                                                        }
                                                    ]
                                                },
                                                {
                                                    mix: {
                                                        block: 'col-xs-6'
                                                    },
                                                    content: [{
                                                        elem: 'property',
                                                        content: [{
                                                            elem: 'subheading',
                                                            content: 'Рубрики каталога:',
                                                        },
                                                            {
                                                                elem: 'value',
                                                                attrs: {
                                                                    'data-tags': true
                                                                },
                                                                content: [
                                                                    {
                                                                        block: 'a',
                                                                        href: '#',
                                                                        content: 'Бизнес, '
                                                                    },
                                                                    {
                                                                        block: 'a',
                                                                        href: '#',
                                                                        content: 'Банк, '
                                                                    },
                                                                    {
                                                                        block: 'a',
                                                                        href: '#',
                                                                        content: 'Работа, '
                                                                    },
                                                                    {
                                                                        block: 'a',
                                                                        href: '#',
                                                                        content: 'Производство'
                                                                    }
                                                                ]
                                                            }]
                                                    }, {
                                                        elem: 'property',
                                                        content: [{
                                                            elem: 'subheading',
                                                            content: 'Анонс'
                                                        },
                                                            {
                                                                elem: 'value',
                                                                content: 'Ква́нтовая фи́зика — раздел теоретической физики, в котором изучаются квантово-механические и квантово-полевые системы и законы их движения. Основные законы квантовой физики. '
                                                            }]
                                                    }, {
                                                        elem: 'property',
                                                        content: [{
                                                            elem: 'subheading',
                                                            content: ['Изображения']
                                                        },
                                                            {
                                                                elem: 'value',
                                                                content: [
                                                                    {
                                                                        block: 'thumbnails-gallery',
                                                                        content: [
                                                                            {
                                                                                elem: 'item',
                                                                                src: '../../../images/tmp/tmp1.jpg',
                                                                                editable: false
                                                                            },
                                                                            {
                                                                                elem: 'item',
                                                                                src: '../../../images/tmp/tmp2.jpg',
                                                                                editable: false
                                                                            },
                                                                            {
                                                                                elem: 'item',
                                                                                src: '../../../images/tmp/tmp3.jpg',
                                                                                editable: false
                                                                            },
                                                                            {
                                                                                elem: 'item',
                                                                                src: '../../../images/tmp/tmp4.jpg',
                                                                                editable: false
                                                                            },
                                                                            {
                                                                                elem: 'item',
                                                                                src: '../../../images/tmp/tmp5.jpg',
                                                                                editable: false
                                                                            }
                                                                        ]
                                                                    }
                                                                ]
                                                            }]
                                                    }]
                                                },
                                                {
                                                    mix: {
                                                        block: 'col-xs-6'
                                                    },
                                                    content: [{
                                                        elem: 'property',
                                                        content: [{
                                                            elem: 'subheading',
                                                            content: 'Описание'
                                                        },
                                                            {
                                                                elem: 'value',
                                                                content: [
                                                                    {
                                                                        block: 'scrollbar-inner',
                                                                        content: 'Ква́нтовая фи́зика — раздел теоретической физики, в котором изучаются квантово-механические и квантово-полевые системы и законы их движения. Основные законы квантовой физики изучаются в рамках квантовой механики и квантовой теории поля и применяются в других разделах физики.Ква́нтовая фи́зика — раздел теоретической физики, в котором изучаются квантово-механические и квантово-полевые системы и законы их движения. Основные законы квантовой физики изучаются в рамках квантовой механики и квантовой теории поля и применяются в других разделах физики.'
                                                                    }
                                                                ]
                                                            }]
                                                    }, {
                                                        elem: 'property',
                                                        content: [{
                                                            elem: 'subheading',
                                                            content: 'Дополнительное описание'
                                                        },
                                                            {
                                                                elem: 'value',
                                                                content: [
                                                                    {
                                                                        block: 'scrollbar-inner',
                                                                        content: 'Ква́нтовая фи́зика — раздел теоретической физики, в котором изучаются квантово-механические и квантово-полевые системы и законы их движения. Основные законы квантовой физики изучаются в рамках квантовой механики и квантовой теории поля и применяются в других разделах физики.Ква́нтовая фи́зика — раздел теоретической физики, в котором изучаются квантово-механические и квантово-полевые системы и законы их движения. Основные законы квантовой физики изучаются в рамках квантовой механики и квантовой теории поля и применяются в других разделах физики.'
                                                                    }
                                                                ]
                                                            }]
                                                    }]
                                                }]
                                        }
                                        ]
                                    }
                                ]
                                }
                            ]
                        }, {
                            mix: {block: 'container', mods: {noresponse: true}}, content: [{
                                block: 'offers-heading',
                                mix: {
                                    block: 'clearfix'
                                },
                                content: [
                                    {
                                        block: 'personal-title',
                                        content: 'Мои предложения',
                                        mix: {
                                            block: 'pull-left'
                                        }
                                    }, {
                                        block: 'add-offer',
                                        content: 'Добавить предложение',
                                        mix: {
                                            block: 'pull-right'
                                        }
                                    }
                                ]
                            },
                                {
                                    block: 'row',
                                    content: [{
                                        block: 'col-xs-6',
                                        content: [{
                                            block: 'thumbnails',
                                            content: [{
                                                block: 'h', size: '5',  content: [
                                                    'Прошли модерацию'
                                                ]
                                            }, {
                                                block: 'collapse-section',
                                                content: [{
                                                    elem: 'title',
                                                    target: 'collapse-first',
                                                    title: [{
                                                        tag: 'span',
                                                        content: 'Купите шапочку'
                                                    }]
                                                }, {
                                                    elem: 'content',
                                                    attrs: {
                                                        id: 'collapse-first'
                                                    },
                                                    content: 'Ква́нтовая фи́зика — раздел теоретической физики, в котором изучаются квантово-механические и квантово-полевые системы и законы их движения. Основные законы квантовой физики изучаются в рамках квантовой механики и квантовой теории поля и применяются в других разделах физики.'
                                                }]
                                            }, {
                                                block: 'collapse-section',
                                                content: [{
                                                    elem: 'title',
                                                    target: 'collapse-second',
                                                    title: [{
                                                        tag: 'span',
                                                        content: 'Продам готовые комплекты касс'
                                                    }, {
                                                        block: 'change-button',
                                                        content: 'Редактировать',
                                                        target: '#edit-post'
                                                    }, {
                                                        block: 'change-button',
                                                        content: 'Удалить'
                                                    }]
                                                }, {
                                                    elem: 'content',
                                                    attrs: {
                                                        id: 'collapse-second'
                                                    },
                                                    content: [{
                                                        block: 'company',
                                                        content: [{
                                                            elem: 'time',
                                                            tag: 'span',
                                                            content: ['Предложение активно до ', {
                                                                tag: 'a',
                                                                content: '09.12.17',
                                                                attrs: {
                                                                    href: 'javascript:void(0);'
                                                                }
                                                            }]
                                                        }, {
                                                            elem: 'property',
                                                            content: [{
                                                                elem: 'subheading',
                                                                content: 'Рубрики каталога:',
                                                            },
                                                                {
                                                                    elem: 'value',
                                                                    attrs: {
                                                                        'data-tags': true
                                                                    },
                                                                    content: [
                                                                        {
                                                                            block: 'a',
                                                                            href: '#',
                                                                            content: 'Бизнес, '
                                                                        },
                                                                        {
                                                                            block: 'a',
                                                                            href: '#',
                                                                            content: 'Банк, '
                                                                        },
                                                                        {
                                                                            block: 'a',
                                                                            href: '#',
                                                                            content: 'Работа, '
                                                                        },
                                                                        {
                                                                            block: 'a',
                                                                            href: '#',
                                                                            content: 'Производство'
                                                                        }
                                                                    ]
                                                                }]
                                                        }, {
                                                            elem: 'property',
                                                            content: [{
                                                                elem: 'subheading',
                                                                content: 'Анонс'
                                                            },
                                                                {
                                                                    elem: 'value',
                                                                    content: 'Ква́нтовая фи́зика — раздел теоретической физики, в котором изучаются квантово-механические и квантово-полевые системы и законы их движения. Основные законы квантовой физики. '
                                                                }]
                                                        }, {
                                                            elem: 'property',
                                                            content: [{
                                                                elem: 'subheading',
                                                                content: 'Описание'
                                                            },
                                                                {
                                                                    elem: 'value',
                                                                    content: [
                                                                        {
                                                                            block: 'scrollbar-inner',
                                                                            content: 'Ква́нтовая фи́зика — раздел теоретической физики, в котором изучаются квантово-механические и квантово-полевые системы и законы их движения. Основные законы квантовой физики изучаются в рамках квантовой механики и квантовой теории поля и применяются в других разделах физики.Ква́нтовая фи́зика — раздел теоретической физики, в котором изучаются квантово-механические и квантово-полевые системы и законы их движения. Основные законы квантовой физики изучаются в рамках квантовой механики и квантовой теории поля и применяются в других разделах физики.'
                                                                        }
                                                                    ]
                                                                }]
                                                        }, {
                                                            elem: 'property',
                                                            content: [
                                                                {
                                                                    elem: 'subheading',
                                                                    content: 'Дополнительное описание'
                                                                },
                                                                {
                                                                    elem: 'value',
                                                                    content: [
                                                                        {
                                                                            block: 'scrollbar-inner',
                                                                            content: 'Ква́нтовая фи́зика — раздел теоретической физики, в котором изучаются квантово-механические и квантово-полевые системы и законы их движения. Основные законы квантовой физики изучаются в рамках квантовой механики и квантовой теории поля и применяются в других разделах физики.Ква́нтовая фи́зика — раздел теоретической физики, в котором изучаются квантово-механические и квантово-полевые системы и законы их движения. Основные законы квантовой физики изучаются в рамках квантовой механики и квантовой теории поля и применяются в других разделах физики.'
                                                                        }
                                                                    ]
                                                                }
                                                            ]
                                                        }, {
                                                            elem: 'property',
                                                            content: [{
                                                                elem: 'subheading',
                                                                content: ['Изображения']
                                                            },
                                                                {
                                                                    elem: 'value',
                                                                    content: [
                                                                        {
                                                                            block: 'thumbnails-gallery',
                                                                            content: [
                                                                                {
                                                                                    elem: 'item',
                                                                                    src: '../../../images/tmp/tmp1.jpg',
                                                                                    editable: false
                                                                                },
                                                                                {
                                                                                    elem: 'item',
                                                                                    src: '../../../images/tmp/tmp2.jpg',
                                                                                    editable: false
                                                                                },
                                                                                {
                                                                                    elem: 'item',
                                                                                    src: '../../../images/tmp/tmp3.jpg',
                                                                                    editable: false
                                                                                },
                                                                                {
                                                                                    elem: 'item',
                                                                                    src: '../../../images/tmp/tmp4.jpg',
                                                                                    editable: false
                                                                                },
                                                                                {
                                                                                    elem: 'item',
                                                                                    src: '../../../images/tmp/tmp5.jpg',
                                                                                    editable: false
                                                                                }
                                                                            ]
                                                                        }
                                                                    ]
                                                                }]
                                                        }, {
                                                            elem: 'property',
                                                            content: [{
                                                                block: 'h', size: '6', mix: [{block: 'text-nowrap'}, {block: 'company__mail-title'}], content: [
                                                                    'E-mail для отправки откликов на предложение:'
                                                                ]
                                                            }, {
                                                                elem: 'email',
                                                                content: 'info@yandex.ru'
                                                            }]
                                                        }]
                                                    }]
                                                }]
                                            }]
                                        }]
                                    }, {
                                        block: 'col-xs-6',
                                        content: [{
                                            block: 'thumbnails',
                                            content: [{
                                                block: 'h', size: '5',  content: [
                                                    'Отклонены модератором'
                                                ]
                                            }, {
                                                block: 'collapse-section',
                                                content: [{
                                                    elem: 'title',
                                                    target: 'collapse-right',
                                                    title: [{
                                                        tag: 'span',
                                                        content: 'Комплексные решения для бизнеса: стратегическое, проектное, кризисное и антикризисное управление с постановки целей'
                                                    }]
                                                }, {
                                                    elem: 'content',
                                                    attrs: {
                                                        id: 'collapse-right'
                                                    },
                                                    content: [{
                                                        block: 'personal-title',
                                                        mods : {
                                                            size: 'small'
                                                        },
                                                        content: 'Комментарий модератора'
                                                    },
                                                        'Ква́нтовая фи́зика — раздел теоретической физики, в котором изучаются квантово-механические и квантово-полевые системы и законы их движения. Основные законы квантовой физики изучаются в рамках квантовой механики и квантовой теории поля и применяются в других разделах физики.'
                                                    ]
                                                }]
                                            }]
                                        }]
                                    }]
                                }]
                        }
                    ]
                },
                {
                    block: 'modal',
                    scalable: true,
                    attrs: {
                        id: 'edit-modal'
                    },
                    modalBody: {
                        block: 'company',
                        content: [
                            {
                                elem: 'property',
                                content: [{
                                    elem: 'subheading',
                                    content: 'Рубрики каталога:',
                                },
                                    {
                                        elem: 'value',
                                        mix: {
                                          block: 'tags-input'
                                        },
                                        tag: 'input',
                                        attrs: {
                                            type: 'text',
                                            value: 'Бизнес, Банк, Работа, Производство'
                                        }
                                    }]
                            }, {
                                elem: 'property',
                                content: [{
                                    elem: 'subheading',
                                    content: 'Анонс'
                                },
                                    {
                                        elem: 'value',
                                        tag: 'textarea',
                                        attrs: {
                                            rows: '3'
                                        },
                                        content: 'Ква́нтовая фи́зика — раздел теоретической физики, в котором изучаются квантово-механические и квантово-полевые системы и законы их движения. Основные законы квантовой физики. '
                                    }]
                            }, {
                                elem: 'property',
                                content: [{
                                    elem: 'subheading',
                                    content: ['Изображения', {
                                        block: 'change-button',
                                        tag: 'label',
                                        content: ['Добавить', {
                                            elem: 'loader',
                                            tag: 'input',
                                            attrs: {
                                                type: 'file',
                                                multiple: true
                                            }
                                        }]
                                    }]
                                },
                                    {
                                        elem: 'value',
                                        content: [
                                            {
                                                block: 'thumbnails-gallery',
                                                content: [
                                                    {
                                                        elem: 'item',
                                                        src: '../../../images/tmp/tmp1.jpg',
                                                        editable: true
                                                    },
                                                    {
                                                        elem: 'item',
                                                        src: '../../../images/tmp/tmp2.jpg',
                                                        editable: true
                                                    },
                                                    {
                                                        elem: 'item',
                                                        src: '../../../images/tmp/tmp3.jpg',
                                                        editable: true
                                                    },
                                                    {
                                                        elem: 'item',
                                                        src: '../../../images/tmp/tmp4.jpg',
                                                        editable: true
                                                    },
                                                    {
                                                        elem: 'item',
                                                        src: '../../../images/tmp/tmp5.jpg',
                                                        editable: true
                                                    }
                                                ]
                                            }
                                        ]
                                    }]
                            },
                            {
                                elem: 'property',
                                content: [{
                                    elem: 'subheading',
                                    content: 'Описание'
                                },
                                    {
                                        elem: 'value',
                                        content: [
                                            {
                                                block: 'textarea-scrollbar',
                                                mix: {
                                                    block: 'scrollbar-outer'
                                                },
                                                tag: 'textarea',
                                                content: 'Ква́нтовая фи́зика — раздел теоретической физики, в котором изучаются квантово-механические и квантово-полевые системы и законы их движения. Основные законы квантовой физики изучаются в рамках квантовой механики и квантовой теории поля и применяются в других разделах физики.Ква́нтовая фи́зика — раздел теоретической физики, в котором изучаются квантово-механические и квантово-полевые системы и законы их движения. Основные законы квантовой физики изучаются в рамках квантовой механики и квантовой теории поля и применяются в других разделах физики.'
                                            }
                                        ]
                                    }]
                            }, {
                                elem: 'property',
                                content: [{
                                    elem: 'subheading',
                                    content: 'Дополнительное описание'
                                },
                                    {
                                        elem: 'value',
                                        content: [
                                            {
                                                block: 'textarea-scrollbar',
                                                mix: {
                                                    block: 'scrollbar-outer'
                                                },
                                                tag: 'textarea',
                                                content: 'Ква́нтовая фи́зика — раздел теоретической физики, в котором изучаются квантово-механические и квантово-полевые системы и законы их движения. Основные законы квантовой физики изучаются в рамках квантовой механики и квантовой теории поля и применяются в других разделах физики.Ква́нтовая фи́зика — раздел теоретической физики, в котором изучаются квантово-механические и квантово-полевые системы и законы их движения. Основные законы квантовой физики изучаются в рамках квантовой механики и квантовой теории поля и применяются в других разделах физики.'
                                            }
                                        ]
                                    }]
                            }
                        ]
                    }
                },
                {
                    block: 'modal',
                    scalable: true,
                    attrs: {
                        id: 'edit-post'
                    },
                    modalBody: {
                        block: 'company',
                        content: [
                            {
                                elem: 'property',
                                content: [{
                                    elem: 'subheading',
                                    content: 'Рубрики каталога:',
                                },
                                    {
                                        elem: 'value',
                                        tag: 'input',
                                        mix: {
                                            block: 'tags-input'
                                        },
                                        attrs: {
                                            type: 'text',
                                            value: 'Бизнес, Банк, Работа, Производство'
                                        }
                                    }]
                            }, {
                                elem: 'property',
                                content: [{
                                    elem: 'subheading',
                                    content: 'Анонс'
                                },
                                    {
                                        elem: 'value',
                                        tag: 'textarea',
                                        attrs: {
                                            rows: '3'
                                        },
                                        content: 'Ква́нтовая фи́зика — раздел теоретической физики, в котором изучаются квантово-механические и квантово-полевые системы и законы их движения. Основные законы квантовой физики. '
                                    }]
                            }, {
                                elem: 'property',
                                content: [{
                                    elem: 'subheading',
                                    content: ['Изображения', {
                                        block: 'change-button',
                                        tag: 'label',
                                        content: ['Добавить', {
                                            elem: 'loader',
                                            tag: 'input',
                                            attrs: {
                                                type: 'file',
                                                multiple: true
                                            }
                                        }]
                                    }]
                                },
                                    {
                                        elem: 'value',
                                        content: [
                                            {
                                                block: 'thumbnails-gallery',
                                                content: [
                                                    {
                                                        elem: 'item',
                                                        src: '../../../images/tmp/tmp1.jpg',
                                                        editable: true
                                                    },
                                                    {
                                                        elem: 'item',
                                                        src: '../../../images/tmp/tmp2.jpg',
                                                        editable: true
                                                    },
                                                    {
                                                        elem: 'item',
                                                        src: '../../../images/tmp/tmp3.jpg',
                                                        editable: true
                                                    },
                                                    {
                                                        elem: 'item',
                                                        src: '../../../images/tmp/tmp4.jpg',
                                                        editable: true
                                                    },
                                                    {
                                                        elem: 'item',
                                                        src: '../../../images/tmp/tmp5.jpg',
                                                        editable: true
                                                    }
                                                ]
                                            }
                                        ]
                                    }]
                            },
                            {
                                elem: 'property',
                                content: [{
                                    elem: 'subheading',
                                    content: 'Описание'
                                },
                                    {
                                        elem: 'value',
                                        content: [
                                            {
                                                block: 'textarea-scrollbar',
                                                mix: {
                                                    block: 'scrollbar-outer'
                                                },
                                                tag: 'textarea',
                                                content: 'Ква́нтовая фи́зика — раздел теоретической физики, в котором изучаются квантово-механические и квантово-полевые системы и законы их движения. Основные законы квантовой физики изучаются в рамках квантовой механики и квантовой теории поля и применяются в других разделах физики.Ква́нтовая фи́зика — раздел теоретической физики, в котором изучаются квантово-механические и квантово-полевые системы и законы их движения. Основные законы квантовой физики изучаются в рамках квантовой механики и квантовой теории поля и применяются в других разделах физики.'
                                            }
                                        ]
                                    }]
                            }, {
                                elem: 'property',
                                content: [{
                                    elem: 'subheading',
                                    content: 'Дополнительное описание'
                                },
                                    {
                                        elem: 'value',
                                        content: [
                                            {
                                                block: 'textarea-scrollbar',
                                                mix: {
                                                    block: 'scrollbar-outer'
                                                },
                                                tag: 'textarea',
                                                content: 'Ква́нтовая фи́зика — раздел теоретической физики, в котором изучаются квантово-механические и квантово-полевые системы и законы их движения. Основные законы квантовой физики изучаются в рамках квантовой механики и квантовой теории поля и применяются в других разделах физики.Ква́нтовая фи́зика — раздел теоретической физики, в котором изучаются квантово-механические и квантово-полевые системы и законы их движения. Основные законы квантовой физики изучаются в рамках квантовой механики и квантовой теории поля и применяются в других разделах физики.'
                                            }
                                        ]
                                    }]
                            }
                        ]
                    }
                },
                {
                    block: 'modal',
                    scalable: true,
                    attrs: {
                        id: 'add-image'
                    },
                    modalBody: [{
                        block: 'image-loader',
                        tag: 'input',
                        attrs: {
                            type: 'file',
                            multiple: true
                        }
                    }]
                },
                require('../_common/footer.bemjson.js')
            ]
        }
    ]
};