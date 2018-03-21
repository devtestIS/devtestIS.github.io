module.exports = {
    block: 'page',
    title: 'Список статей',
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
                    content: 'Новости'
                },
                {
                    block: 'row',
                    content: [
                        {
                            elem: 'col',
                            mods: {md: '9', sm: '8', 'md-push': '3', 'sm-push': '4'},
                            content: [
                                {
                                    block: 'article-preview',
                                    mods: {date:true},
                                    content: [
                                        {
                                            elem: 'date',
                                            content: '28.04.2016'
                                        },
                                        {
                                            elem: 'title',
                                            content: 'Газ как туманность'
                                        },
                                        {
                                            elem: 'content',
                                            content: [
                                                {
                                                    block: 'img-responsive',
                                                    mix: [{block: 'article-preview', elem: 'img'}],
                                                    url: 'img-demo.jpg'
                                                },
                                                'При облучении инфракрасным лазером плазменное образование искажает луч. Квазар тормозит векторный взрыв. Самосогласованная модель предсказывает, что при определенных условиях взвесь стабилизирует субсветовой солитон. Вещество, в рамках ограничений классической механики, непрозрачно. Гидродинамический удар теоретически возможен. Многочисленные расчеты предсказывают, а эксперименты подтверждают, что струя волнообразна.'
                                            ]
                                        }
                                    ]
                                },
                                {
                                    block: 'article-preview',
                                    mods: {date:true},
                                    content: [
                                        {
                                            elem: 'date',
                                            content: '28.04.2016'
                                        },
                                        {
                                            elem: 'title',
                                            content: 'Вращательный электрон: погранслой или солитон?'
                                        },
                                        {
                                            elem: 'content',
                                            content: [
                                                'При облучении инфракрасным лазером плазменное образование искажает луч. Квазар тормозит векторный взрыв. Самосогласованная модель предсказывает, что при определенных условиях взвесь стабилизирует субсветовой солитон. Вещество, в рамках ограничений классической механики, непрозрачно. Гидродинамический удар теоретически возможен. Многочисленные расчеты предсказывают, а эксперименты подтверждают, что струя волнообразна.'
                                            ]
                                        }
                                    ]
                                },
                                {
                                    block: 'article-preview',
                                    content: [
                                        {
                                            elem: 'title',
                                            content: 'Газ как туманность'
                                        },
                                        {
                                            elem: 'content',
                                            content: [
                                                {
                                                    block: 'img-responsive',
                                                    mix: [{block: 'article-preview', elem: 'img'}],
                                                    url: 'img-demo.jpg'
                                                },
                                                'При облучении инфракрасным лазером плазменное образование искажает луч. Квазар тормозит векторный взрыв. Самосогласованная модель предсказывает, что при определенных условиях взвесь стабилизирует субсветовой солитон. Вещество, в рамках ограничений классической механики, непрозрачно. Гидродинамический удар теоретически возможен. Многочисленные расчеты предсказывают, а эксперименты подтверждают, что струя волнообразна.'
                                            ]
                                        }
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