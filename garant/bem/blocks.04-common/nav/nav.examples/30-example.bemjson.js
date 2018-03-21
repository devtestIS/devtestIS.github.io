({
  block: 'nav',
  mods: {'type': 'pills', 'orientation': 'stacked'},
  content:[
    {
      elem: 'item',
      mods: {'state': 'active'},
      url: '#1',
      content: 'Первый пункт меню (активный)'
    },
    {
      elem: 'item',
      content: 'Второй пункт меню'
    },
    {
      elem: 'item',
      mods: {'state': 'disabled'},
      url: '#3',
      content: 'Третий пункт меню (заблокирован)'
    }
  ]
})
