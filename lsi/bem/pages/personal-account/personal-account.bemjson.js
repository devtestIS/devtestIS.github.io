module.exports = {
    block: 'page',
    title: 'Профиль',
    head: [{elem: 'meta', attrs: {name: 'format-detection', content: 'telephone=no'}}],
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
                            mods: {md: '3', sm: '4'},
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
                        {
                            elem: 'col',
                            mods: {md: '9', sm: '8'},
                            content: [
                                {
                                    block: 'article',
                                    content: 'В личном кабинете Вы можете проверить текущее состояние корзины, ход выполнения Ваших заказов, просмотреть или изменить личную информацию'
                                },
                                {
                                    block: 'row',
                                    content: [
                                        {
                                            elem: 'col',
                                            mods: {md: '4'},
                                            content: [
                                                {
                                                    block: 'account-link',
                                                    content: [
                                                        {
                                                            block: 'img-responsive',
                                                            mix: [{block: 'account-link', elem: 'img'}],
                                                            url: 'account/profile.png'
                                                        },
                                                        {
                                                            elem: 'text',
                                                            content: 'Профиль <br/>пользователя'
                                                        }
                                                    ]
                                                }
                                            ]
                                        },
                                        {
                                            elem: 'col',
                                            mods: {md: '4'},
                                            content: [
                                                {
                                                    block: 'account-link',
                                                    content: [
                                                        {
                                                            block: 'img-responsive',
                                                            mix: [{block: 'account-link', elem: 'img'}],
                                                            url: 'account/order.png'
                                                        },
                                                        {
                                                            elem: 'text',
                                                            content: 'Заказы'
                                                        }
                                                    ]
                                                }
                                            ]
                                        },
                                        {
                                            elem: 'col',
                                            mods: {md: '4'},
                                            content: [
                                                {
                                                    block: 'account-link',
                                                    content: [
                                                        {
                                                            block: 'img-responsive',
                                                            mix: [{block: 'account-link', elem: 'img'}],
                                                            url: 'account/basket.png'
                                                        },
                                                        {
                                                            elem: 'text',
                                                            content: 'Корзина'
                                                        }
                                                    ]
                                                }
                                            ]
                                        }
                                    ]
                                },
                                {
                                    block: 'account-indent',
                                }
                            ]
                        }
                    ]
                }
            ]
        },
        require('../_common/footer.bemjson.js')
    ]
};