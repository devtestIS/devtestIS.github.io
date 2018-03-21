module.exports = {
    block: 'page',
    title: 'Предложения / Список',
    id: 'OFFERS_LIST',
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
                    'Предложения Клуба Клиентов '
                ]},
                {block: 'search-large', mods: {color: 'lite'}, content: [
                    {elem: 'inner', content: [
                        {block: 'form-control', attrs: {placeholder: 'Поиск партнера или предложения'}},
                        {block: 'icomoon', icon: 'search', mix: {block: 'hidden-xs'}},
                        {block: 'btn', mods: {color: 'info'}, mix: {block: 'text-uppercase'}, content: [
                            {block: 'span', mix: {block: 'hidden-xs'}, content: "Найти"},
                            {block: 'icomoon', icon: 'search', mix: {block: 'visible-xs'}}
                        ]}
                    ]}
                ]}
            ]}
        ]},
        {block: 'pattern', mods: {type: 'accent'}, mix: [{block: 'pbl'}], content: [
            {mix: {block: 'container', mods: {fluid: 'false'}}, content: [
                {block: 'h', size: '2', mods: {light: true}, content: [
                    'Все категории'
                ]},
                {block: 'category-list', content:
                    ((item)=>{
                        return [item, item, item, item, item, item, item, item, item, item, item, item]
                    })([
                        {elem: 'item', content: [
                            {block: 'h', mix: {block: 'category-list', elem: 'title'}, size: 5, content: [
                                {block: 'a', content: 'Спорт'}
                            ]},
                            {block: 'a', content: 'волейбол'},
                            ', ',
                            {block: 'a', content: 'баскетбол'},
                            ', ',
                            {block: 'a', content: 'футбол'},
                            ', ',
                            {block: 'a', content: 'хоккей'},
                            ', ',
                            {block: 'a', content: 'спортивная пресса'},
                            '...'
                        ]}
                    ])
                }
            ]}
        ]},
        require('../_common/footer.bemjson.js')
    ]
};



