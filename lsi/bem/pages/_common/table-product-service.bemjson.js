module.exports = {
    block: 'pseudo-table',
    attrs: {
        'data-auto-title': 'true'
    },
    mix: [{block: 'table-bordered'}, {block: 'table-striped'}],
    content: [
        {
            elem: 'thead',
            mix: [{block: 'hidden-xs'}, {block: 'hidden-sm'}],
            content: [
                {
                    elem: 'tr',
                    content: [
                        {
                            elem: 'th',
                            content: 'Сервис-центр'
                        },
                        {
                            elem: 'th',
                            content: 'Адреса'
                        },
                        {
                            elem: 'th',
                            content: 'Телефон'
                        } 
                    ]
                },
            ]
        },
        {
            elem: 'tbody',
            content: [
                {
                    elem: 'tr',
                    content: [
                        {
                            elem: 'td',
                            content: 'ООО "ИОЛА-УФА"'
                        },
                        {
                            elem: 'td',
                            content: 'Кавказская 8'
                        },
                        {
                            elem: 'td',
                            content: '292-97-73'
                        }
                    ]
                },
                {
                    elem: 'tr',
                    content: [
                        {
                            elem: 'td',
                            content: 'ИП Мингалев А.В.'
                        },
                        {
                            elem: 'td',
                            content: 'Кирова 101'
                        },
                        {
                            elem: 'td',
                            content: '274-03-36, 246-31-86'
                        }
                    ]
                },
                {
                    elem: 'tr',
                    content: [
                        {
                            elem: 'td',
                            content: 'ИП Вегеле В.Э'
                        },
                        {
                            elem: 'td',
                            content: 'Первомайская 49'
                        },
                        {
                            elem: 'td',
                            content: '240-40-07, 240-40-03'
                        }
                    ]
                },
                {
                    elem: 'tr',
                    content: [
                        {
                            elem: 'td',
                            content: 'ООО "ИОЛА-УФА"'
                        },
                        {
                            elem: 'td',
                            content: 'Кавказская 8'
                        },
                        {
                            elem: 'td',
                            content: '292-97-73'
                        }
                    ]
                },
                {
                    elem: 'tr',
                    content: [
                        {
                            elem: 'td',
                            content: 'ИП Мингалев А.В.'
                        },
                        {
                            elem: 'td',
                            content: 'Кирова 101'
                        },
                        {
                            elem: 'td',
                            content: '274-03-36, 246-31-86'
                        }
                    ]
                },
                {
                    elem: 'tr',
                    content: [
                        {
                            elem: 'td',
                            content: 'ИП Вегеле В.Э'
                        },
                        {
                            elem: 'td',
                            content: 'Первомайская 49'
                        },
                        {
                            elem: 'td',
                            content: '240-40-07, 240-40-03'
                        }
                    ]
                }
            ]
        }


    ]
}