module.exports = [
  {
    block: 'join',
    content : [
      {
        elem: 'background',
        content: {
          block: 'img',
          url: 'join.jpg'
        }
      },
      {
        elem: 'top',
        content: [
          {
            elem: 'content',
            content: [
              {
                elem: 'title',
                content: 'Клуб клиентов ЕЭС-Гарант'

              },
              {
                elem: 'text',
                content: 'Помогаем найти надежных партнеров.  Актуальные спецпредложения выгодные всем. Читайте или размещайте!'
              },
              {
                block: 'btn',
                mods: {color: 'primary',  size: 'lg'},
                mix: {block: 'join', elem: 'btn'}, 
                content: 'Вступить в клуб'
              }
            ]
          },
          {
            block: 'main-search',
            content: [
              {
                block: 'container',
                content: {
                  block: 'row',
                  content: [
                    {
                      elem:'col',
                      mods: {lg: 3, md: 4},
                      content: {
                        block: 'main-search',
                        elem: 'title',
                        content: 'Поиск партнера или предложений'
                      }
                    },
                    {
                      elem: 'col',
                      mods: {lg: 9, md: 8},
                      content :  {

                        block: 'form-inline',
                        content: [
                          {
                            block: 'main-search', elem: 'input',
                            content:[
                              {
                                block: 'svg',
                                mods: {search: true},
                                url: 'search',
                                mix: {   block: 'main-search', elem: 'icon'},
                              },
                              {
                                block: 'input',
                                type: 'search',
                                placeholder: 'Найти'

                              },
                              {
                                mix: {   block: 'main-search', elem: 'btn'},
                                tag: 'button',
                                block: 'btn',
                                mods: {color: 'primary', size: 'lg'},
                                content: 'Найти'
                              }
                            ]

                          },


                        ]

                      }
                    }
                  ]
                }
              }



            ]
          }
        ]
      }

    ]
  }
  ];