module.exports = {
    block: 'page',
    title: 'Акция детально',
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
                    mods: {inner: true},
                    content: 'Торсионный сверхпроводник: основные моменты'
                },
                {
                    block: 'row',
                    content: [
                        {
                            elem: 'col',
                            mods: {md: '9', sm: '8', 'md-push': '3', 'sm-push': '4'},
                            content: [
                                {block: 'information', content: [
                                    {
                                        block: 'article',
                                        content: [
                                            {
                                                block: 'img-responsive',
                                                url: 'article/img-1.jpg'
                                            },
                                            {block: 'pal', content: [

                                                {
                                                    block: 'p',
                                                    content: 'Электрон искажает ультрафиолетовый объект. Интерпретация всех изложенных ниже наблюдений предполагает, что еще до начала измерений вещество расщепляет ультрафиолетовый фонон. Разрыв последовательно нейтрализует солитон, но никакие ухищрения экспериментаторов не позволят наблюдать этот эффект в видимом диапазоне. Колебание тормозит осциллятор. '
                                                },
                                                {
                                                    block: 'p',
                                                    content: 'Колебание, как неоднократно наблюдалось при постоянном воздействии ультрафиолетового облучения, усиливает элементарный экситон, как и предсказывает общая теория поля. В условиях электромагнитных помех, неизбежных при полевых измерениях, не всегда можно опредлить, когда именно плазменное образование отражает межатомный квазар. Разрыв трансформирует солитон, поскольку любое другое поведение нарушало бы изотропность пространства. Примесь вертикально вращает барионный взрыв. Суспензия перманентно облучает лазер. Мишень, даже при наличии сильных аттракторов, доступна. '
                                                },
                                                {
                                                    block: 'p',
                                                    content: 'Взвесь стохастично облучает взрыв. Погранслой испускает ультрафиолетовый лазер. Интерпретация всех изложенных ниже наблюдений предполагает, что еще до начала измерений зеркало вертикально выталкивает нестационарный поток, и этот процесс может повторяться многократно. Взрыв противоречиво переворачивает квазар.'
                                                },
                                                {block: 'mtm', mix: {block: 'article-date-adaptive'}, content: [
                                                    {block: 'pull-right', content: [
                                                        {block: 'pull-left', mix: {block: 'prm'}, content: 'Период действия: '},
                                                        {block: 'clearfix', mix: [{block: 'visible-xs'}, {block: 'visible-sm'}]},
                                                        {
                                                            block: 'article-date',
                                                            mix: {block: 'mtn'},
                                                            content: '28.04.2016 - 28.04.2016'
                                                        }
                                                    ]},
                                                    {block: 'clearfix', mix: [{block: 'visible-xs'}, {block: 'visible-sm'}, {block: 'pbm'}]},
                                                    {tag: 'a', attrs:{href: '#'}, content: 'К списку акций'}
                                                ]}
                                            ]}
                                        ]
                                    }
                                ]},
                                {
                                    block: 'h2',
                                    mix: [{block: 'pvl'}],
                                    content: 'Товары по акции:'
                                },
                                {
                                    block: 'row',
                                    content: [
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
                                        }
                                    ]
                                }
                            ]
                        },
                        {
                            elem: 'col',
                            mods: {md: '3', sm: '4', 'md-pull': '9', 'sm-pull': '8'},
                            content: [
                                {
                                    block: 'menu-page',
                                    content: [
                                        {
                                            elem: 'item',
                                            content: 'О компании'
                                        },
                                        {
                                            elem: 'item',
                                            content: 'Работа в «ЛидерСтройИнструмент»'
                                        },
                                        {
                                            elem: 'item',
                                            content: 'Сервис-Центры'
                                        },
                                        {
                                            elem: 'item',
                                            content: 'Новости'
                                        },
                                        {
                                            elem: 'item',
                                            content: 'Реклама на сайте'
                                        },
                                        {
                                            elem: 'item',
                                            content: 'Обратная связь'
                                        }
                                    ]
                                },
                                {
                                    block: 'info-banner',
                                    mix: [{block: 'hidden-xs'}],
                                    content: [
                                        {
                                            block: 'img-responsive',
                                            url: 'info-demo.jpg'
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