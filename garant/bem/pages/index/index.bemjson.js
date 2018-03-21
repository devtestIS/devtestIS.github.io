module.exports = {
    block: 'page',
    title: 'Главная',
    id: 'INDEX',
    styles: [{elem: 'css', url: '../_merged/_merged.css'}],
    scripts: [
        {elem: 'js', url: '../_merged/_merged.async.js', async: true},
        {elem: 'js', url: '../_merged/_merged.js'},
        {elem: 'js', url: '../_merged/_merged.i18n.ru.js'}
    ],
    content: [
        require('../_common/header.bemjson.js'),
        {block: 'main', content: [
            {block: 'join', content: [
                {
                    elem: 'slider',
                    content: [{
                        elem: 'wrapper',
                        content: [{
                            block: 'picture',
                            mods: {lazyload: true, responsive: true},
                            src: {
                                xs: '../../../images/join-xs.jpg',
                                sm: '../../../images/join-base.jpg'
                            },
                            alt: ''
                        },
                            {elem: 'overlay', mix: {block: 'pattern', mods: {type: 'dotted'}}},
                            {elem: 'inner', content: [
                                {mix: {block: 'container', mods: {fluid: 'false'}}, content: [
                                    {block: 'h', size: '1', mix: {block: 'join', elem: 'title'}, content: 'Клуб клиентов ЕЭС-Гарант'},
                                    {block: 'mvl', content: [
                                        {block: 'p', content: [
                                            'Помогаем найти надежных партнеров. ',
                                            {block: 'br'},
                                            'Актуальные спецпредложения выгодные всем.',
                                            {block: 'br'},
                                            'Читайте или размещайте!'
                                        ]}
                                    ]},
                                    {block: 'btn', mods: {color: 'info', size: 'lg'}, mix: {block: 'text-uppercase'}, content: 'Вступить в Клуб'}
                                ]}
                            ]}]
                    }, {
                        elem: 'wrapper',
                        content: [{
                            block: 'picture',
                            mods: {lazyload: true, responsive: true},
                            src: {
                                xs: '../../../images/join-xs.jpg',
                                sm: '../../../images/join-base.jpg'
                            },
                            alt: ''
                        },
                            {elem: 'overlay', mix: {block: 'pattern', mods: {type: 'dotted'}}},
                            {elem: 'inner', content: [
                                {mix: {block: 'container', mods: {fluid: 'false'}}, content: [
                                    {block: 'h', size: '1', mix: {block: 'join', elem: 'title'}, content: 'Клуб клиентов ЕЭС-Гарант'},
                                    {block: 'mvl', content: [
                                        {block: 'p', content: [
                                            'Помогаем найти надежных партнеров. ',
                                            {block: 'br'},
                                            'Актуальные спецпредложения выгодные всем.',
                                            {block: 'br'},
                                            'Читайте или размещайте!'
                                        ]}
                                    ]},
                                    {block: 'btn', mods: {color: 'info', size: 'lg'}, mix: {block: 'text-uppercase'}, content: 'Вступить в Клуб'}
                                ]}
                            ]}]
                    }, {
                        elem: 'wrapper',
                        content: [{
                            block: 'picture',
                            mods: {lazyload: true, responsive: true},
                            src: {
                                xs: '../../../images/join-xs.jpg',
                                sm: '../../../images/join-base.jpg'
                            },
                            alt: ''
                        },
                            {elem: 'overlay', mix: {block: 'pattern', mods: {type: 'dotted'}}},
                            {elem: 'inner', content: [
                                {mix: {block: 'container', mods: {fluid: 'false'}}, content: [
                                    {block: 'h', size: '1', mix: {block: 'join', elem: 'title'}, content: 'Клуб клиентов ЕЭС-Гарант'},
                                    {block: 'mvl', content: [
                                        {block: 'p', content: [
                                            'Помогаем найти надежных партнеров. ',
                                            {block: 'br'},
                                            'Актуальные спецпредложения выгодные всем.',
                                            {block: 'br'},
                                            'Читайте или размещайте!'
                                        ]}
                                    ]},
                                    {block: 'btn', mods: {color: 'info', size: 'lg'}, mix: {block: 'text-uppercase'}, content: 'Вступить в Клуб'}
                                ]}
                            ]}]
                    }, {
                        elem: 'wrapper',
                        content: [{
                            block: 'picture',
                            mods: {lazyload: true, responsive: true},
                            src: {
                                xs: '../../../images/join-xs.jpg',
                                sm: '../../../images/join-base.jpg'
                            },
                            alt: ''
                        },
                            {elem: 'overlay', mix: {block: 'pattern', mods: {type: 'dotted'}}},
                            {elem: 'inner', content: [
                                {mix: {block: 'container', mods: {fluid: 'false'}}, content: [
                                    {block: 'h', size: '1', mix: {block: 'join', elem: 'title'}, content: 'Клуб клиентов ЕЭС-Гарант'},
                                    {block: 'mvl', content: [
                                        {block: 'p', content: [
                                            'Помогаем найти надежных партнеров. ',
                                            {block: 'br'},
                                            'Актуальные спецпредложения выгодные всем.',
                                            {block: 'br'},
                                            'Читайте или размещайте!'
                                        ]}
                                    ]},
                                    {block: 'btn', mods: {color: 'info', size: 'lg'}, mix: {block: 'text-uppercase'}, content: 'Вступить в Клуб'}
                                ]}
                            ]}]
                    }, {
                        elem: 'wrapper',
                        content: [{
                            block: 'picture',
                            mods: {lazyload: true, responsive: true},
                            src: {
                                xs: '../../../images/join-xs.jpg',
                                sm: '../../../images/join-base.jpg'
                            },
                            alt: ''
                        },
                            {elem: 'overlay', mix: {block: 'pattern', mods: {type: 'dotted'}}},
                            {elem: 'inner', content: [
                                {mix: {block: 'container', mods: {fluid: 'false'}}, content: [
                                    {block: 'h', size: '1', mix: {block: 'join', elem: 'title'}, content: 'Клуб клиентов ЕЭС-Гарант'},
                                    {block: 'mvl', content: [
                                        {block: 'p', content: [
                                            'Помогаем найти надежных партнеров. ',
                                            {block: 'br'},
                                            'Актуальные спецпредложения выгодные всем.',
                                            {block: 'br'},
                                            'Читайте или размещайте!'
                                        ]}
                                    ]},
                                    {block: 'btn', mods: {color: 'info', size: 'lg'}, mix: {block: 'text-uppercase'}, content: 'Вступить в Клуб'}
                                ]}
                            ]}]
                    }, {
                        elem: 'wrapper',
                        content: [{
                            block: 'picture',
                            mods: {lazyload: true, responsive: true},
                            src: {
                                xs: '../../../images/join-xs.jpg',
                                sm: '../../../images/join-base.jpg'
                            },
                            alt: ''
                        },
                            {elem: 'overlay', mix: {block: 'pattern', mods: {type: 'dotted'}}},
                            {elem: 'inner', content: [
                                {mix: {block: 'container', mods: {fluid: 'false'}}, content: [
                                    {block: 'h', size: '1', mix: {block: 'join', elem: 'title'}, content: 'Клуб клиентов ЕЭС-Гарант'},
                                    {block: 'mvl', content: [
                                        {block: 'p', content: [
                                            'Помогаем найти надежных партнеров. ',
                                            {block: 'br'},
                                            'Актуальные спецпредложения выгодные всем.',
                                            {block: 'br'},
                                            'Читайте или размещайте!'
                                        ]}
                                    ]},
                                    {block: 'btn', mods: {color: 'info', size: 'lg'}, mix: {block: 'text-uppercase'}, content: 'Вступить в Клуб'}
                                ]}
                            ]}]
                    }]
                }
            ]},
            {block: 'search-large', content: [
                {mix: {block: 'container', mods: {fluid: 'false'}}, content: [
                    {mix: {block: 'row'}, content: [
                        {mix: {block: 'row', elem: 'col', mods: {xs:12, lg: 4}}, content: [
                            {elem: 'title', content: 'Поиск партнера или предложений'}
                        ]},
                        {mix: {block: 'row', elem: 'col', mods: {xs:12, lg: 8}}, content: [
                            {elem: 'inner', content: [
                                {block: 'form-control', attrs: {placeholder: 'Найти'}},
                                {block: 'icomoon', icon: 'search', mix: {block: 'hidden-xs'}},
                                {block: 'btn', mods: {color: 'info'}, mix: {block: 'text-uppercase'}, content: [
                                    {block: 'span', mix: {block: 'hidden-xs'}, content: "Найти"},
                                    {block: 'icomoon', icon: 'search', mix: {block: 'visible-xs'}}
                                ]}
                            ]}
                        ]}
                    ]}
                ]}
            ]},
            {block: 'pattern', mods: {type: 'dotted'}, mix: [{block: 'ptm'}, {block: 'pbx'}]},
            {mix: {block: 'container', mods: {fluid: 'false'}}, content: [
                {block: 'h', size: '2', mix: {block: 'text-center'}, content: [
                    {block: 'a', content: 'Партнеры клуба'}
                ]},
                {block: 'partners-list',  mix: {block: 'row'}, content: [
                    ((item, item2)=>{
                        return [item, item2, item, item2, item]
                    })([
                        {mix: {block: 'row', elem: 'col', mods: {xs: 12, md: 6}}, content: [
                            {block: 'thumbnails', mods: {type: 'partners'}, content: [
                                {elem: 'header', content: [
                                    {elem: 'image', content: [
                                        { block: 'img', mods: { lazyload: true, responsive: true }, src: 'http://placehold.it/100x80'}
                                    ]},
                                    {block: 'h', size: '5', mix: {block: 'thumbnails', elem: 'title'}, content: [
                                        {block: 'a', content: [
                                            'Бесплатное размещение вакансии'
                                        ]}
                                    ]}
                                ]},
                                {elem: 'description', content: [
                                    {block: 'p', content: 'Бесплатное размещение одной вакансии «Стандарт» на 1 месяц – спецпредложение для компаний, имеющих договор электроснабжения по фиксированной цене. Данный формат поиска персонала оптимально подходит для подбора сотрудников и собирает много откликов даже за один месяц размещения. Хотите больше привелегий для своего бизнеса?'},
                                    {block: 'p', content: 'Оформите договор электроснабжения по '}
                                ]},
                                {block: 'text-center', content: [
                                    {block: 'btn', mods: {color: 'info'}, content: 'Получить предложение'}
                                ]}
                            ]}
                        ]},
                        {mix: {block: 'row', elem: 'col', mods: {xs: 12, md: 6}}, content: [
                            {block: 'thumbnails', mods: {type: 'partners'}, content: [
                                {elem: 'header', content: [
                                    {elem: 'image', content: [
                                        { block: 'img', mods: { lazyload: true, responsive: true }, src: 'http://placehold.it/100x80'}
                                    ]},
                                    {block: 'h', size: '5', mix: {block: 'thumbnails', elem: 'title'}, content: [
                                        {block: 'a', content: [
                                            'Сервис «Финолог» — бесплатно'
                                        ]}
                                    ]}
                                ]},
                                {elem: 'description', content: [
                                    {block: 'p', content: 'Данный формат поиска персонала оптимально подходит для подбора сотрудников и собирает много откликов даже за один месяц размещения. Хотите больше привелегий для своего бизнеса?'},
                                    {block: 'p', content: 'Оформите договор электроснабжения по '}
                                ]},
                                {block: 'text-center', content: [
                                    {block: 'btn', mods: {color: 'info'}, content: 'Получить предложение'}
                                ]}
                            ]}
                        ]}
                    ])
                ]},
                {block: 'pvl'}
            ]}
        ]},
        {block: 'pattern', mods: {type: 'accent'}, mix: [{block: 'pbl'}], content: [
            {mix: {block: 'container', mods: {fluid: 'false'}}, content: [
                {block: 'h', size: '2', content: [
                    {block: 'a', content: 'Предложения клуба'}
                ]},
                require('../_common/offers-list.bemjson.js')
            ]},
            {block: 'pvl'}
        ]},
        {block: 'pattern', mods: {type: 'shadow-top'}, content: [
            {mix: {block: 'container', mods: {fluid: 'false'}}, content: [
                {block: 'pvl', content: [
                    {block: 'h', size: '2', content: [
                        {block: 'a', content: 'Новости Клуба и участников'}
                    ]},
                    {block: 'news-list', mix: {block: 'row'}, content:
                        ((item)=>{
                            return [item, item, item]
                        })([
                            {mix: {block: 'row', elem: 'col', mods: {xs: 12, md: 4}}, content: [
                                {block: 'thumbnails', mods: {type: 'news'}, content: [
                                    {elem: 'date', content: '11.06.2017'},
                                    {block: 'h', size: '5', mix: {block: 'thumbnails', elem: 'title'}, content: [
                                        {block: 'a', content: [
                                            '«Роснефть» открыла первое месторождение нефти на шельфе Восточной Арктики'
                                        ]}
                                    ]},
                                    {elem: 'description', content: 'В процессе бурения скважины "Центрально-Ольгинская-1" с берега полуострова Хара-Тумус Хатангского залива моря Лаптевых открыла первое... месторождение нефти на шельфе Восточной Арктики, сообщается на сайте компании.'}
                                ]}
                            ]}
                        ])
                    }
                ]}
            ]}
        ]},
        require('../_common/footer.bemjson.js')
    ]
};