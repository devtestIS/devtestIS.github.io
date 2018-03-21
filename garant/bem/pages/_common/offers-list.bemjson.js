module.exports = [
    {block: 'sticky', mix: {block: 'row'}, content: [
        {elem: 'sidebar', mix: {block: 'row', elem: 'col', mods: {xs: 12, sm: 4, md: 3}}, content: [
            {elem: 'control', content: [
                {block: 'main-nav', mix: {block: 'mbl'}, content: [
                    {elem: 'control', content: [
                        {elem: 'info', content: [
                            {elem: 'title', content: [
                                'Раздел: развлечения'
                            ]}
                        ]},
                        {elem: 'toggle', content: [
                            {block: 'icomoon', icon: 'navicon'}
                        ]}
                    ]},
                    {elem: 'collapse', content: [
                        {block: 'left-nav', content:
                            ((arrow)=>{
                                let result = [];
                                for(var i in arrow)
                                    result.push(
                                        {elem: 'li', content: [
                                            {block: 'a', content: [
                                                {block: 'span', content: arrow[i]},
                                                {block: 'icomoon', mix: {block: 'pull-right'}, icon: 'arrow-right'}
                                            ]}
                                        ]}
                                    )
                                return result
                            })(['Развлечения', 'Селекция бренда конструктивно', 'Отдых', 'Спорт', 'Игровая', 'СМИ', 'Справки', 'Общество', 'Порталы', 'Дом', 'Работа', 'Учеба', 'Культура', 'Hi-Tech', 'Производство', 'Авто', 'Бизнес'])
                        }
                    ]}
                ]}
            ]}
        ]},
        {elem: 'inner', mix: {block: 'row', elem: 'col', mods: {xs: 12, sm: 8, md: 9}}, content: [
            {block: 'filter-controls', content: [{
                elem: 'city',
                tag: 'form',
                content: [{elem: 'li', mix: {block: 'hidden-xs'}, content: [
                    "Город: "
                ]}, {
                    elem: 'select',
                    content: [{
                        block: 'form-control',
                        tag: 'select',
                        attrs: {
                            id: 'select-cities',
                            placeholder: 'Выберете один или несколько городов'
                        }
                    }]
                }, {
                    block: 'btn',
                    mix: {
                        block: 'btn-primary'
                    },
                    tag: 'button',
                    attrs: {
                        type: 'button'
                    },
                    content: 'Показать'
                }, {
                    block: 'btn',
                    mix: {
                        block: 'btn-default'
                    },
                    tag: 'button',
                    attrs: {
                      type: 'button'
                    },
                    content: 'Сбросить'
                }]
            },
                {elem: 'sort', content: [
                    {elem: 'li', mix: {block: 'hidden-xs'}, content: [
                        "Сортировать: "
                    ]},
                    {elem: 'li', content: [
                        {block: 'switch', content: [
                            {tag: 'a', attrs: {href: '#'}, content: [
                                {elem: 'over'},
                                "По популярности"
                            ]}
                        ]}
                    ]},
                    {elem: 'li', content: [
                        {block: 'switch', content: [
                            {tag: 'a', attrs: {href: '#'}, content: [
                                {elem: 'over'},
                                "По цене"
                            ]}
                        ]}
                    ]}
                ]},
                {elem: 'view', mix: {block: 'hidden-xs'}, content: [
                    {elem: 'li', content: [
                        {block: 'span', content: [
                            {block: 'icomoon', icon: 'th'}
                        ]}
                    ]},
                    {elem: 'li', content: [
                        {block: 'a', content: [
                            {block: 'icomoon', icon: 'th-list'}
                        ]}
                    ]}
                ]}
            ]},
            {elem: 'more', content: [
                {block: 'icomoon', icon: 'refresh', mix: [{block: 'mrm'}, {block: 'fa-spin'}]},
                {block: 'span', content: [
                    'Показать больше предложений'
                ]}
            ]},
            {block: 'offers-list', mix: {block: 'row'}, content:
                ((item)=>{
                    return [item, item, item, item, item, item]
                })([
                    {mix: {block: 'row', elem: 'col', mods: {xs: 12}}, content: [
                        {block: 'thumbnails', mods: {type: 'offer'}, content: [
                            {elem: 'image', content: [
                                {content: [
                                    {block: 'img', mods: { lazyload: true, responsive: true }, src: 'http://placehold.it/150x80'}
                                ]},
                                {elem: 'sections', content: [
                                    {block: 'a', content: 'Дом'},
                                    ', ',
                                    {block: 'a', content: 'Производство'}
                                ]}
                            ]},
                            {elem: 'caption', content: [
                                {elem: 'control', content: [
                                    {block: 'h', size: '5', mix: {block: 'thumbnails', elem: 'title'}, content: 'ООО «ДельтаТелеком»'},
                                    {block: 'btn', mods: {color: 'border-primary'}, content: 'Получить предложение'}
                                ]},
                                {elem: 'description', content: 'В процессе бурения скважины "Центрально-Ольгинская-1" с берега полуострова Хара-Тумус Хатангского залива моря Лаптевых открыла первое... месторождение нефти на шельфе Восточной Арктики, сообщается на сайте компании.'}
                            ]}
                        ]}
                    ]}
                ])
            },
            {elem: 'more', content: [
                {block: 'icomoon', icon: 'refresh', mix: [{block: 'mrm'}, {block: 'fa-spin'}]},
                {block: 'span', content: [
                    'Показать больше предложений'
                ]}
            ]}
        ]}
    ]}
];
