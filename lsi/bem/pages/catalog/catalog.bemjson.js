module.exports = {
    block: 'page',
    title: 'Каталог',
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
            block: 'catalog',
            content: [
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
                            content: 'Каталог товаров'
                        },
                    ]
                },
                require('../_common/catalog.bemjson.js')
            ]
        },
        require('../_common/footer.bemjson.js')
    ]
};
