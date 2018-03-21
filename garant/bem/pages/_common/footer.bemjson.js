module.exports = [
    {block: 'footer', content: [
        {mix: {block: 'container', mods: {fluid: 'false'}}, content: [
            {block: 'main-nav', content: [
                {elem: 'inner', mix: {block: 'pvn'}, content: [
                    {elem: 'li', content: [
                        {block: 'a', content: 'Все предложения'}
                    ]},
                    {elem: 'li', content: [
                        {block: 'a', content: 'Все компании'}
                    ]},
                    {elem: 'li', content: [
                        {block: 'a', mix: {block: 'main-nav', elem: 'arrow'}, content: 'О клубе'},
                        {elem: 'dropdown', content: [
                            {elem: 'li', content: [
                                {block: 'a', content: 'Вложеный 1'}
                            ]},
                            {elem: 'li', content: [
                                {block: 'a', content: 'Вложеный 2'}
                            ]}
                        ]}
                    ]},
                    {elem: 'li', content: [
                        {block: 'a', content: 'Новости'}
                    ]},
                    {elem: 'li', content: [
                        {block: 'a', content: 'Как стать партнером клуба'}
                    ]}
                ]}
            ]}
        ]},
        {block: 'hr'},
        {mix: {block: 'container', mods: {fluid: 'false'}}, content: [
            {elem: 'row', content: [
                {elem: 'col', mix: {block: 'nowrap'}, content: [
                    '2017, ООО «ЕЭС-Гарант»'
                ]},
                {elem: 'col', content: [
                    'Адрес: 143421, Московская область, Красногорский р-н, автодорога «Балтия», территория 26 км бизнес-центр «Рига Ленд», стр. 3'
                ]}
            ]}
        ]},
        {block: 'hr'},
        {mix: {block: 'container', mods: {fluid: 'false'}}, content: [
            {elem: 'row', content: [
                {elem: 'col', content: [
                    {block: 'btn', mods: {color: 'info'}, mix: {block: 'text-uppercase'}, content: 'Заказать звонок'}
                ]},
                {elem: 'col', content: [
                    {block: 'search', content: [
                        {block: 'form-control', attrs: {placeholder: 'Подпишитесь на рассылку'}},
                        {block: 'btn', mods: {color: 'info'}, mix: {block: 'text-uppercase'}, content: [
                            {block: 'icomoon', icon: 'envelope-o'}
                        ]}
                    ]}
                ]},
                {elem: 'col', content: [
                    {block: 'share', content: [
                        {elem: 'li', content: [
                            {block: 'fa', icon: 'vk', mix: 'a', tag: 'a', attrs: {href: '#'}}
                        ]},
                        {elem: 'li', content: [
                            {block: 'fa', icon: 'facebook', mix: 'a', tag: 'a', attrs: {href: '#'}}
                        ]},
                        {elem: 'li', content: [
                            {block: 'fa', icon: 'youtube', mix: 'a', tag: 'a', attrs: {href: '#'}}
                        ]},
                        {elem: 'li', content: [
                            {block: 'fa', icon: 'twitter', mix: 'a', tag: 'a', attrs: {href: '#'}}
                        ]}
                    ]}
                ]},
                {elem: 'col', content: [
                    {block: 'developer', content: [
                        {block: 'a', content: 'Разработка сайта'},
                        {block: 'mhs', content: [
                            "—"
                        ]},
                        {content: [
                            {block: 'img', mods: { lazyload: true, responsive: true }, src: '../../../images/iv-logo.png'}
                        ]}
                    ]}
                ]}
            ]}
        ]}
    ]}
];
