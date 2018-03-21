module.exports = [
    {block: 'header', content: [
        {mix: {block: 'container', mods: {fluid: 'false'}}, content: [
            {elem: 'row', content: [
                {elem: 'logo', mix: {block: 'row', elem: 'col', mods: {sm: 2}}, content: [
                    {block: 'a', content: [
                        {block: 'icomoon', icon: 'logo'}
                    ]}
                ]},
                {elem: 'inner', content: [
                    {block: 'nav-tools', content: [
                        {elem: 'inner', content: [
                            {elem: 'li', content: [
                                'Клуб клиентов ЕЭС-Гарант'
                            ]},
                            {elem: 'li', content: [
                                {block: 'a', content: [
                                    {block: 'icomoon', mix: {block: 'mrs'}, icon: 'map-marker'},
                                    'Владивосток'
                                ]}
                            ]},
                            {elem: 'li', content: [
                                {block: 'a', content: [
                                    {block: 'icomoon', mix: {block: 'mrs'}, icon: 'phone'},
                                    'Заказать звонок'
                                ]}
                            ]},
                            {elem: 'li', content: [
                                {block: 'a', content: [
                                    {block: 'icomoon', mix: {block: 'mrs'}, icon: 'user'},
                                    {block: 'span', mix: {block: 'hidden-ex'}, content: 'Личный кабинет'}
                                ]}
                            ]}
                        ]}
                    ]},
                    {block: 'hr', mix: {block: 'hidden-xs'}},
                    {block: 'main-nav', content: [
                        {elem: 'control', content: [
                            {elem: 'info', content: [
                                {elem: 'logo', content: [
                                    {block: 'a', content: [
                                        {block: 'icomoon', icon: 'logo'}
                                    ]}
                                ]}
                            ]},
                            {elem: 'toggle', content: [
                                {block: 'icomoon', icon: 'navicon'}
                            ]}
                        ]},
                        {elem: 'collapse', content: [
                            {elem: 'inner', content: [
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
                    ]}
                ]}  
            ]}
        ]}
    ]}
];
