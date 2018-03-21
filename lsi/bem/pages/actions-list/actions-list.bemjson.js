module.exports = {
    block: 'page',
    title: 'Список акций',
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
                    content: 'Акции'
                },
                {
                    block: 'row',
                    content: [
                        {
                            elem: 'col',
                            mods: {md: '9', sm: '8', 'md-push': '3', 'sm-push': '4'},
                            content: [
                                {
                                    tag: 'a', attrs: {href: '#'},
                                    block: 'article-preview',
                                    mods: {date:true},
                                    content: [
                                        {
                                            tag: 'div',
                                            elem: 'title',
                                            content: 'Газ как туманность'
                                        },
                                        {elem: 'content', content: [
                                            {mix: {block: 'row'}, content: [
                                                {mix: {block: 'row', elem: 'col', mods: {xs: 12, md: 6}}, content: [
                                                    {
                                                        block: 'img-responsive',
                                                        url: 'article/img-1.jpg'
                                                    }
                                                ]},
                                                {mix: {block: 'row', elem: 'col', mods: {xs: 12, md: 6}}, content: [
                                                    'При облучении инфракрасным лазером плазменное образование искажает луч. Квазар тормозит векторный взрыв. Самосогласованная модель предсказывает, что при определенных условиях взвесь стабилизирует субсветовой солитон. Вещество, в рамках ограничений классической механики, непрозрачно. Гидродинамический удар теоретически возможен. Многочисленные расчеты предсказывают, а эксперименты подтверждают, что струя волнообразна.'
                                                ]}
                                            ]},
                                            {block: 'mtm', mix: [{block: 'article-date-adaptive'}, {block: 'clearfix'}], content: [
                                                {block: 'pull-left', content: [
                                                    {block: 'pull-left', mix: {block: 'prm'}, content: 'Период действия: '},
                                                    {block: 'clearfix', mix: [{block: 'visible-xs'}, {block: 'visible-sm'}]},
                                                    {
                                                        block: 'article-date',
                                                        mix: {block: 'mtn'},
                                                        content: '28.04.2016 - 28.04.2016'
                                                    }
                                                ]}
                                            ]}
                                        ]}
                                    ]
                                },
                                {
                                    block: 'pagination',
                                    content: [
                                        {
                                            elem: 'prev',
                                            mods: {disabled: true},
                                            content: '<i class="fa fa-angle-left visible-xs"></i><span class="hidden-xs">Предыдущая</span>'
                                        },
                                        {
                                            elem: 'item',
                                            cls: 'active',
                                            content: '1'
                                        },
                                        {
                                            elem: 'item',
                                            content: '2'
                                        },
                                        {
                                            elem: 'item',
                                            content: '3'
                                        },
                                        {
                                            elem: 'item',
                                            content: '4'
                                        },
                                        {
                                            elem: 'item',
                                            content: '5'
                                        },
                                        {
                                            elem: 'next',
                                            content: '<i class="fa fa-angle-right visible-xs"></i><span class="hidden-xs">Следующая</span>'
                                        }
                                    ]
                                },
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
}