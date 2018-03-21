module.exports = [

  {
    block: 'offers',
    content: [
      {
        block: 'container',
        content: [
          {
            block: 'row',
            content: [
              {
                elem: 'col',
                mods: {md: 12},
                content: [
                  {
                    block: 'title',
                    content: 'Предложения клуба'
                  }
                ]
              },
              {
                elem: 'col',
                mods: {md: 3, sm: 4, xs: 12},
                content: [

                  {
                    block: 'collapse-button',
                    mods: {offers: true},
                    attrs: {'data-target': '#sidebar'},

                  },
                  {
                    block: 'clearfix'
                  },
                  {
                    block: 'collapse',
                    mods: {sidebar: true},
                    attrs: {id: 'sidebar'},
                    content: {
                      block: 'sidebar',
                      content: [
                        {
                          elem: 'container',
                          content: [
                            {

                              elem: 'item',
                              content: {
                                block: 'link',
                                content: 'Развлечения'
                              }
                            },
                            {

                              elem: 'item',
                              content: {
                                block: 'link',
                                content: 'Отдых'
                              }
                            },
                            {

                              elem: 'item',
                              content: {
                                block: 'link',
                                content: 'Спорт'
                              }
                            },
                            {
                              elem: 'item',

                              content: {
                                block: 'link',
                                content: 'Игровая'
                              }
                            },
                            {
                              elem: 'item',

                              content: {
                                block: 'link',
                                content: 'СМИ'
                              }
                            },
                            {
                              elem: 'item',

                              content: {
                                block: 'link',
                                content: 'Справки'
                              }
                            },
                            {
                              elem: 'item',

                              content: {
                                block: 'link',
                                content: 'Общество'
                              }
                            },
                            {
                              elem: 'item',

                              content: {
                                block: 'link',
                                content: 'Порталы'
                              }
                            },
                            {
                              elem: 'item',

                              content: {
                                block: 'link',
                                content: 'Дом'
                              }
                            },
                            {
                              elem: 'item',

                              content: {
                                block: 'link',
                                content: 'Работа'
                              }
                            },
                            {
                              elem: 'item',
                              content: {
                                block: 'link',
                                content: 'Учеба'
                              }
                            },
                            {
                              elem: 'item',

                              content: {
                                block: 'link',
                                content: 'Культура'
                              }
                            },
                            {
                              elem: 'item',

                              content: {
                                block: 'link',
                                content: 'Hi-Tech'
                              }
                            },
                            {
                              elem: 'item',

                              content: {
                                block: 'link',
                                content: 'Производство'
                              }
                            },
                            {
                              elem: 'item',

                              content: {
                                block: 'link',
                                content: 'Авто'
                              }
                            },
                            {
                              elem: 'item',

                              content: {
                                block: 'link',
                                content: 'Бизнес'
                              }
                            }
                          ]
                        }
                      ]
                    }
                  }
                ]
              },
              {
                elem: 'col',
                mods: {md: 9, sm: 8, xs: 12},
                content: [
                  {
                    block: 'offers',
                    elem: 'list',
                    content: [
                      {
                        block: 'offer-item',
                        url: 'offers/logo1.png',
                        title: 'ООО «Олис-Дент»',
                        type: {block: 'link', content: 'Медицина'},
                        text: '<p>Мы дарим скидку на все виды аппаратного отбеливания — 20% до конца 2017 года </p><p><b>На ваш выбор:</b></p><p>Комплексное отбеливание зубов лампой со скидкой 20% — 8 960 рублей (вместо 11 200 рублей) + реминерализирующая терапии бесплатно (вместо 1 720 рублей). Лазерное отбеливание со скидкой 20% — 13 040 рублей (вместо 16 300 рублей) + реминерализирующая терапия бесплатно (вместо 1 720 рублей)</p>'
                      },
                      {
                        block: 'offer-item',
                        title: 'ООО «ДельтаТелеком»',
                        type: {block: 'link', content: 'Отдых'},
                        text: '<p>В рамках сервиса «Беспроводной дом» вы можете заказать установку и настройку wifi маршрутизатра ASUS RT-N10.<br>Сервис доступен только абонентам сети ДельтаТелеком.ASUS RT-N10 + Настройка + Установка - 1850 руб.</p>'
                      },
                      {
                        block: 'offer-item',
                        url: 'offers/logo2.png',
                        title: 'ООО «Компания Профиль»',
                        type: [ {block: 'link', content:'Дом'},', ', {block: 'link', content: 'Производство'}],
                        text: '<p>Получите  гарантированную скидку 5%, при переходе с сайта Клуба Клиентов ЕЭС-Гаранта</p>'
                      },
                      {
                        block: 'offer-item',
                        url: 'offers/logo3.png',
                        title: 'ООО «Открытый мир»',
                        type: [ {block: 'link', content:'Бизнес'}, ', ', {block: 'link', content:'Банк'}, ', ',{block: 'link', content:'Работа'}, ', ',{block: 'link', content:'Производство'}],
                        text: '<p>РОЛЬШТОРЫ В ПОДАРОК ПРИ ЗАКАЗЕ ОСТЕКЛЕНИЯ ЛОДЖИИ «ПОД КЛЮЧ»<br>Читайте больше на нашем сайте!</p>'
                      },

                    ]
                  }


                ]
              },
              {
                elem: 'col',
                mods: {sm: 9, 'sm-offset': 3, xs: 12},
                content: [
                  {

                    block: 'link',
                    mix: {
                      block: 'offers',
                      elem: 'more',
                    },
                    content: [
                      {
                        block: 'svg',
                        url: 'more',
                        mods: {more: true},

                      },
                      {
                        tag: 'span',
                        content: 'Показать больше предложений'
                      }

                    ]
                  }
                ]
              },

            ]
          }
        ]

      }
    ]
  }
]