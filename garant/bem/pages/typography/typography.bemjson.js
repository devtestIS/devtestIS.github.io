module.exports = {
    block: 'page',
    title: 'Типография / Предопределенные блоки',
    id: 'TYPOGRAPHY',
    styles: [{elem: 'css', url: '../_merged/_merged.css'}],
    scripts: [
        {elem: 'js', url: '../_merged/_merged.async.js', async: true},
        {elem: 'js', url: '../_merged/_merged.js'},
        {elem: 'js', url: '../_merged/_merged.i18n.ru.js'}
    ],
    content: [
        require('../_common/header.bemjson.js'),
        {block: 'main', content: [
            {mix: {block: 'container'}, content: [
                {block: 'breadcrumb', content: [
                    {block: 'a', content: 'Главная'},
                    {block: 'a', content: 'Новости'},
                    {block: 'span', content: 'Гонка ГТО'}
                ]},
                {block: 'h', size: '1', mix: {block: 'mtl'}},
                {block: 'p'},
                {block: 'h', size: '2'},
                {block: 'p'},
                {block: 'h', size: '3'},
                {block: 'p'},
                {block: 'h', size: '4'},
                {block: 'p'},
                {block: 'h', size: '5'},
                {block: 'p'},
                {block: 'h', size: '6'},
                {block: 'p'},
                {block: 'hr'},
             
                {block: 'form-horizontal', content:[
                    {block: 'form-group', content: [
                        {mix: {block: 'row', elem: 'col', mods: {xs:12}}, content: [
                            {block: 'control-label', content: 'Текстовое поле'}
                        ]},
                        {mix: {block: 'row', elem: 'col', mods: {xs:12}}, content: [
                            {block: 'form-control'}
                        ]}
                    ]},
                    {block: 'form-group', content: [
                        {mix: {block: 'row', elem: 'col', mods: {xs:12}}, content: [
                            {block: 'control-label', content: 'Радио/чек'}
                        ]},
                        {mix: {block: 'row', elem: 'col', mods: {xs:12}}, content: [
                            {block: 'radio', mods: {styled: true}, content: 'Радиокнопка'},
                            {block: 'checkbox', mods: {styled: true}, content: 'Чекбокс'},
                            {block: 'radio', mods: {styled: true}, disabled: true, checked: true, content: 'Радиокнопка'},
                            {block: 'checkbox', mods: {styled: true}, disabled: true, checked: true, content: 'Чекбокс'}
                        ]}
                    ]},
                    {block: 'form-group', content: [
                        {mix: {block: 'row', elem: 'col', mods: {xs:12}}, content: [
                            {block: 'control-label', content: 'Текстовое поле'}
                        ]},
                        {mix: {block: 'row', elem: 'col', mods: {xs:12}}, content: [
                            {block: 'form-control', tag: 'select', content: [
                                '10:00',
                                '11:00',
                                '12:00',
                                '13:00'
                            ]}
                        ]}
                    ]},
                    {block: 'form-group', content: [
                        {mix: {block: 'row', elem: 'col', mods: {xs:12}}, content: [
                            {block: 'control-label', content: 'Текстовое поле'}
                        ]},
                        {mix: {block: 'row', elem: 'col', mods: {xs:12}}, content: [
                            {block: 'form-control', attrs: {rows: 10}, tag: 'textarea'}
                        ]}
                    ]},
                    {block: 'form-group', content: [
                        {mix: {block: 'row', elem: 'col', mods: {xs:12}}, content: [
                            {block: 'control-label', content: 'Кнопки'}
                        ]},
                        {mix: {block: 'row', elem: 'col', mods: {xs:12}}, content: [
                            {block: 'btn', content: 'Кнопка'},
                            {block: 'btn', mods: {color: 'primary'}, content: 'Кнопка'},
                            {block: 'btn', mods: {color: 'info'}, content: 'Кнопка'},
                            {block: 'btn', mods: {color: 'border-primary'}, content: 'Кнопка'},
                        ]}
                    ]},
                    {block: 'form-group', content: [
                        {mix: {block: 'row', elem: 'col', mods: {xs:12}}, content: [
                            {block: 'control-label', content: 'Кнопки'}
                        ]},
                        {mix: {block: 'row', elem: 'col', mods: {xs:12}}, content: [
                            {block: 'btn', mods: {size: 'lg'}, content: 'Кнопка'},
                            {block: 'btn', mods: {color: 'primary', size: 'lg'}, content: 'Кнопка'},
                            {block: 'btn', mods: {color: 'info', size: 'lg'}, content: 'Кнопка'},
                            {block: 'btn', mods: {color: 'border-primary', size: 'lg'}, content: 'Кнопка'}
                        ]}
                    ]},
                    {block: 'form-group', content: [
                        {mix: {block: 'row', elem: 'col', mods: {xs:12}}, content: [
                            {block: 'control-label', content: 'Кнопки'}
                        ]},
                        {mix: {block: 'row', elem: 'col', mods: {xs:12}}, content: [
                            {block: 'btn', mods: {size: 'sm'}, content: 'Кнопка'},
                            {block: 'btn', mods: {color: 'primary', size: 'sm'}, content: 'Кнопка'},
                            {block: 'btn', mods: {color: 'info', size: 'sm'}, content: 'Кнопка'},
                            {block: 'btn', mods: {color: 'border-primary', size: 'sm'}, content: 'Кнопка'}
                        ]}
                    ]}
                ]}
            ]}
        ]},
        require('../_common/footer.bemjson.js')
    ]
};