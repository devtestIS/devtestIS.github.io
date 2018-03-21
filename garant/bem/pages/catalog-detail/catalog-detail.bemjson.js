module.exports = {
    block: 'page',
    title: 'Каталог / Детальная',
    id: 'CATALOG_DETAIL',
    styles: [{elem: 'css', url: '../_merged/_merged.css'}],
    scripts: [
        {elem: 'js', url: '../_merged/_merged.async.js', async: true},
        {elem: 'js', url: '../_merged/_merged.js'},
        {elem: 'js', url: '../_merged/_merged.i18n.ru.js'}
    ],
    content: [
        require('../_common/header.bemjson.js'),
        {block: 'main', content: [
            {mix: {block: 'container', mods: {fluid: 'false'}}, content: [
                {block: 'breadcrumb', content: [
                    {block: 'a', content: 'Главная'},
                    {block: 'a', content: 'Новости'},
                    {block: 'span', content: 'Гонка ГТО'}
                ]},
                {block: 'h', size: '1', content: [
                    'Скидка на все виды аппаратного отбеливания'
                ]},
                require('../_common/offers-detail.bemjson.js')
            ]}
        ]},
        require('../_common/footer.bemjson.js')
    ]
};