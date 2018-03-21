module.exports = [
    {
        tag: 'h2',
        content: 'Пример типовой проблемы при выводе объектов плиткой'
    },
    {
        block: 'row',
        content: [
          {
              elem: 'col',
              mods: {xs:6, sm: 4, md:3, lg: 2},
              content: require('./product-list-item-big.bemjson.js')
          },
          {
              elem: 'col',
              mods: {xs:6, sm: 4, md:3, lg: 2},
              content: require('./product-list-item-small.bemjson.js')
          },
          {
              elem: 'col',
              mods: {xs:6, sm: 4, md:3, lg: 2},
              content: require('./product-list-item-small.bemjson.js')
          },
          {
              elem: 'col',
              mods: {xs:6, sm: 4, md:3, lg: 2},
              content: require('./product-list-item-small.bemjson.js')
          },
          {
              elem: 'col',
              mods: {xs:6, sm: 4, md:3, lg: 2},
              content: require('./product-list-item-small.bemjson.js')
          },
          {
              elem: 'col',
              mods: {xs:6, sm: 4, md:3, lg: 2},
              content: require('./product-list-item-small.bemjson.js')
          },
          {
              elem: 'col',
              mods: {xs:6, sm: 4, md:3, lg: 2},
              content: require('./product-list-item-small.bemjson.js')
          },
          {
              elem: 'col',
              mods: {xs:6, sm: 4, md:3, lg: 2},
              content: require('./product-list-item-small.bemjson.js')
          },
          {
              elem: 'col',
              mods: {xs:6, sm: 4, md:3, lg: 2},
              content: require('./product-list-item-small.bemjson.js')
          },
          {
              elem: 'col',
              mods: {xs:6, sm: 4, md:3, lg: 2},
              content: require('./product-list-item-small.bemjson.js')
          },
          {
              elem: 'col',
              mods: {xs:6, sm: 4, md:3, lg: 2},
              content: require('./product-list-item-small.bemjson.js')
          },
          {
              elem: 'col',
              mods: {xs:6, sm: 4, md:3, lg: 2},
              content: require('./product-list-item-small.bemjson.js')
          },
        ]
    },
    {
        tag: 'h2',
        content: 'Как надо'
    },
    {
        block: 'layout-tiles',
        grid: {xs: 6, lg: 2},
        content: [
            require('./product-list-item-big.bemjson.js'),
            require('./product-list-item-small.bemjson.js'),
            require('./product-list-item-small.bemjson.js'),
            require('./product-list-item-small.bemjson.js'),
            require('./product-list-item-small.bemjson.js'),
            require('./product-list-item-small.bemjson.js'),
            require('./product-list-item-small.bemjson.js'),
            require('./product-list-item-small.bemjson.js'),
            require('./product-list-item-small.bemjson.js'),
            require('./product-list-item-small.bemjson.js'),
            require('./product-list-item-small.bemjson.js'),
            require('./product-list-item-small.bemjson.js'),
        ]
    },
];
