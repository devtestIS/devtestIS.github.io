module.exports = [
    {block: 'call-btn-wrap', content: [
        {block: 'btn', mods: {color: 'primary'}, content: [
            "Позвонить онлайн"
        ]}
    ]},
    {
        block: 'footer',
        content: [
            {
                block: 'container',
                content: [
                    {
                        block: 'row',
                        content: [
                            {
                                elem: 'col',
                                mods: {md: '3', sm: '6'},
                                content: [
                                    {
                                        block: 'footer-title',
                                        content: 'Компания'
                                    },
                                    {
                                        block: 'footer-list',
                                        content: [
                                            {
                                                elem: 'item',
                                                content: [{elem : 'link', content: 'О компании'}]
                                            },
                                            {
                                                elem: 'item',
                                                content: [{elem : 'link', content: 'Работа в «ЛидерСтройИнструмент»'}]
                                            },
                                            {
                                                elem: 'item',
                                                content: [{elem : 'link', content: 'Сервис-центры'}]
                                            },
                                            {
                                                elem: 'item',
                                                content: [{elem : 'link', content: 'Новости'}]
                                            }
                                        ]
                                    }
                                ]
                            },
                            {
                                elem: 'col',
                                mods: {md: '3', sm: '6'},
                                content: [
                                    {
                                        block: 'footer-title',
                                        content: 'Адреса магазинов'
                                    },
                                    {
                                        block: 'footer-list',
                                        content: [
                                            {
                                                elem: 'item',
                                                content: [{elem : 'link', content: 'Уфа, Новоженова 88'}]
                                            },
                                            {
                                                elem: 'item',
                                                content: [{elem : 'link', content: 'Уфа, Менделеева, 134/4'}]
                                            },
                                            {
                                                elem: 'item',
                                                content: [{elem : 'link', content: 'Уфа, Индустриальное шоссе, 7/1'}]
                                            }
                                        ]
                                    }
                                ]
                            },
                            {
                                block: 'clearfix',
                                mix: [{block: 'visible-sm-block'}]
                            },
                            {
                                elem: 'col',
                                mods: {md: '3', sm: '6'},
                                content: [
                                    {
                                        block: 'footer-title',
                                        content: 'Клиентам'
                                    },
                                    {
                                        block: 'footer-list',
                                        content: [
                                            {
                                                elem: 'item',
                                                content: [{elem : 'link', content: 'Доставка и оплата'}]
                                            },
                                            {
                                                elem: 'item',
                                                content: [{elem : 'link', content: 'Статьи'}]
                                            },
                                            {
                                                elem: 'item',
                                                content: [{elem : 'link', content: 'Видео'}]
                                            },
                                            {
                                                elem: 'item',
                                                content: [{elem : 'link', content: 'Покупайте в кредит!'}]
                                            },
                                            {
                                                elem: 'item',
                                                content: [{elem : 'link', content: 'Жалобы и предложения'}]
                                            },
                                            {
                                                elem: 'item',
                                                content: [{elem : 'link', content: 'Личный кабинет'}]
                                            }
                                        ]
                                    }
                                ]
                            },
                            {
                                elem: 'col',
                                mods: {md: '3', sm: '6'},
                                content: [
                                    {
                                        block: 'footer-title',
                                        content: 'Мы в социальных сетях'
                                    },
                                    {
                                        block: 'soc',
                                        content: [
                                            {
                                                elem: 'item',
                                                url: 'soc/vkontakte.png'
                                            },
                                            {
                                                elem: 'item',
                                                url: 'soc/facebook.png'
                                            }
                                        ]
                                    },
                                    {
                                        block: 'footer-title',
                                        content: 'Подпишитесь на новости и акции'
                                    },
                                    {
                                        block: 'subscription'
                                    }
                                ]
                            }
                        ]
                    },
                    {
                        block: 'footer-info',
                        content: [
                            '<strong>Внимание!</strong> Цены, указанные на сайте, и сведения о наличии товаров не являются публичной офертой!<br>',
                            'Внешний вид, цветовая гамма, технические характеристики товара и комплектность могут отличаться от реальных, уточняйте сведения на момент покупки и оплаты.<br>',
                            'Вся информация на сайте о товарах носит справочный характер и не является публичной офертой в соответствии с пунктом 2 статья 437 ГК РФ'
                        ]
                    }
                ]
            },
            {
                elem: 'bottom',
                content: [
                    {
                        block: 'container',
                        content: [
                            {
                                block: 'copyright',
                                content: '© 2010-2015. ООО "ЛидерСтройИнструмент"'
                            },
                            {
                                block: 'footer-iv',
                                content: [
                                    {
                                        block: 'link',
                                        mix: [{block: 'footer-iv', elem: 'link'}],
                                        content: 'Разработка сайта'
                                    },
                                    ' — ИНТЕРВОЛГА'
                                ]
                            }
                        ]
                    }
                ]
            }, 
            {
                block: 'to-up'
            }
        ]
    },
    require('../_common/modal-select-city.bemjson.js')
];
