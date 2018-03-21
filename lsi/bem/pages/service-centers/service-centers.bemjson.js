module.exports = {
    block: 'page',
    title: 'Cервис центры',
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
                                {
                                    block: 'article',
                                    content: 'В личном кабинете Вы можете проверить текущее состояние корзины, ход выполнения Ваших заказов, просмотреть или изменить личную информацию'
                                },
                                {
                                    block: 'service-centers',
                                    content: [
                                        require('../_common/table.bemjson.js')
                                    ]
                                },
                                {
                                    block: 'account-indent',
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
                                            content: 'Профиль пользователя'
                                        },
                                        {
                                            elem: 'item',
                                            content: 'Заказы'
                                        },
                                        {
                                            elem: 'item',
                                            content: 'Корзина'
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