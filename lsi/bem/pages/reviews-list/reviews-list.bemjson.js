module.exports = {
    block: 'page',
    title: 'Отзывы',
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
                            content: 'Отзывы'
                        }
                    ]
                },
                {
                    block: 'title-page',
                    mods: {inner: true},
                    content: 'Отзывы'
                },
                {
                    block: 'row',
                    content: [
                        {
                            elem: 'col',
                            mods: {md: '9', sm: '8', 'md-push': '3', 'sm-push': '4'},
                            content: [
                                {
                                    block: 'reviews-preview',
                                    content: [
                                        {
                                            elem: 'title',
                                            content: 'Мотобур + бур почвенный ф200мм PATRIOT GARDEN PT AE 52D'
                                        },
                                        {
                                            elem: 'img',
                                            content: [
                                                {
                                                    block: 'img-responsive',
                                                    url: 'products/img-1.jpg'
                                                },
                                            ]
                                        },
                                        {
                                            elem: 'content',
                                            content: [
                                                {
                                                    block: 'star-rating',
                                                    mods: {disabled: true, 'reviews-preview':true}
                                                },
                                                {
                                                    elem: 'name',
                                                    content: 'Филипп'
                                                },
                                                {
                                                    elem: 'date',
                                                    content: '28.04.2016'
                                                },
                                                {
                                                    elem: 'text',
                                                    content:  'Купил в прошлом году, летом делал ямы для столбов, зимой брали на рыбалку. Конечно очень облегчает работу, лунки делает не успеешь зевнуть. В этом году под посадку деревьев делал ямки, а что - все же не руками, быстро.'
                                                }
                                            ]
                                        }
                                    ]
                                },
                                {
                                    block: 'reviews-preview',
                                    content: [
                                        {
                                            elem: 'title',
                                            content: 'Мотобур + бур почвенный ф200мм PATRIOT GARDEN PT AE 52D'
                                        },
                                        {
                                            elem: 'img',
                                            content: [
                                                {
                                                    block: 'img-responsive',
                                                    url: 'products/img-1.jpg'
                                                },
                                            ]
                                        },
                                        {
                                            elem: 'content',
                                            content: [
                                                {
                                                    block: 'star-rating',
                                                    mods: {disabled: true, 'reviews-preview':true}
                                                },
                                                {
                                                    elem: 'name',
                                                    content: 'Филипп'
                                                },
                                                {
                                                    elem: 'date',
                                                    content: '28.04.2016'
                                                },
                                                {
                                                    elem: 'text',
                                                    content:  'Купил в прошлом году, летом делал ямы для столбов, зимой брали на рыбалку. Конечно очень облегчает работу, лунки делает не успеешь зевнуть. В этом году под посадку деревьев делал ямки, а что - все же не руками, быстро. Купил в прошлом году, летом делал ямы для столбов, зимой брали на рыбалку. Конечно очень облегчает работу, лунки делает не успеешь зевнуть. В этом году под посадку деревьев делал ямки, а что - все же не руками, быстро. Купил в прошлом году, летом делал ямы для столбов, зимой брали на рыбалку. Конечно очень облегчает работу, лунки делает не успеешь зевнуть. В этом году под посадку деревьев делал ямки, а что - все же не руками, быстро.'
                                                }
                                            ]
                                        }
                                    ]
                                },
                                {
                                    block: 'reviews-preview',
                                    content: [
                                        {
                                            elem: 'title',
                                            content: 'Мотобур + бур почвенный ф200мм PATRIOT GARDEN PT AE 52D'
                                        },
                                        {
                                            elem: 'img',
                                            content: [
                                                {
                                                    block: 'img-responsive',
                                                    url: 'products/img-1.jpg'
                                                },
                                            ]
                                        },
                                        {
                                            elem: 'content',
                                            content: [
                                                {
                                                    block: 'star-rating',
                                                    mods: {disabled: true, 'reviews-preview':true}
                                                },
                                                {
                                                    elem: 'name',
                                                    content: 'Филипп'
                                                },
                                                {
                                                    elem: 'date',
                                                    content: '28.04.2016'
                                                },
                                                {
                                                    elem: 'text',
                                                    content:  'Купил в прошлом году, летом делал ямы для столбов, зимой брали на рыбалку. Конечно очень облегчает работу, лунки делает не успеешь зевнуть. В этом году под посадку деревьев делал ямки, а что - все же не руками, быстро.'
                                                }
                                            ]
                                        }
                                    ]
                                },
                                {
                                    block: 'reviews-preview',
                                    content: [
                                        {
                                            elem: 'title',
                                            content: 'Мотобур + бур почвенный ф200мм PATRIOT GARDEN PT AE 52D'
                                        },
                                        {
                                            elem: 'img',
                                            content: [
                                                {
                                                    block: 'img-responsive',
                                                    url: 'products/img-1.jpg'
                                                },
                                            ]
                                        },
                                        {
                                            elem: 'content',
                                            content: [
                                                {
                                                    block: 'star-rating',
                                                    mods: {disabled: true, 'reviews-preview':true}
                                                },
                                                {
                                                    elem: 'name',
                                                    content: 'Филипп'
                                                },
                                                {
                                                    elem: 'date',
                                                    content: '28.04.2016'
                                                },
                                                {
                                                    elem: 'text',
                                                    content:  'Купил в прошлом году, летом делал ямы для столбов, зимой брали на рыбалку. Конечно очень облегчает работу, лунки делает не успеешь зевнуть. В этом году под посадку деревьев делал ямки, а что - все же не руками, быстро.'
                                                }
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