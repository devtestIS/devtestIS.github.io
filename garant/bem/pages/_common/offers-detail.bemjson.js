module.exports = [
    {block: 'sticky', mix: {block: 'row'}, content: [
        {elem: 'sidebar', mix: {block: 'row', elem: 'col', mods: {xs: 12, sm: 4, md: 3}}, content: [
            {elem: 'control', content: [
                {block: 'main-nav', tag: 'aside', mix: {block: 'mbl'}, content: [
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
            {block: 'offers-list', mix: [{block: 'row'}, {block: 'mbl'}], content: [
                {mix: {block: 'row', elem: 'col', mods: {xs: 12}}, content: [
                    {block: 'thumbnails', mods: {type: 'offer-detail'}, content: [
                        {elem: 'controls', content: [
                            {block: 'btn', mods: {block: true, color: 'info'}, content: 'Получить предложение'},
                            {block: 'btn', mods: {block: true}, content: 'О компании'},
                            {block: 'btn', mods: {block: true}, content: 'Все предложения'}
                        ]},
                        {elem: 'header', content: [
                            {elem: 'image', content: [
                                {block: 'img', mods: { lazyload: true, responsive: true }, src: 'http://placehold.it/150x80'}
                            ]},
                            {block: 'h', size: '4', mix: {block: 'thumbnails',elem: 'title'}, content: 'ООО «Олис-Дент»'}
                        ]},
                        {block: 'p', content: 'Мы дарим скидку на все виды аппаратного отбеливания — 20% до конца 2017 года'},
                        {block: 'h', size: '6', content: 'На ваш выбор:'},
                        {block: 'p', content: 'Комплексное отбеливание зубов лампой со скидкой 20% — 8 960 рублей (вместо 11 200 рублей) + реминерализирующая терапии бесплатно (вместо 1 720 рублей). Лазерное отбеливание со скидкой 20% — 13 040 рублей (вместо 16 300 рублей) + реминерализирующая терапия бесплатно (вместо 1 720 рублей)'}
                    ]}
                ]}
            ]},
            {block: 'images-slider', mix: {block: 'row'}, content: [
                ((item)=>{
                    return [item, item, item, item, item, item]
                })(
                    {mix: {block: 'row', elem: 'col', mods: {xs: 6, md: 4}}, content: [
                        {block: 'a', content: [
                            {block: 'img', mods: { lazyload: true, responsive: true }, src: 'http://placehold.it/400x250'}
                        ]}
                    ]}
                )
            ]},
            {block: 'h', size: '4', content: 'Условия и правила'},
            {block: 'p'}
        ]}
    ]}
];
