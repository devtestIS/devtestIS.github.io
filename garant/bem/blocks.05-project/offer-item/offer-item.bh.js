module.exports = function (bh) {
  bh.match(module.id.replace('.bh.js', '').match(/([^\\]+)?$/), function (ctx, json) {
    var title = json.title;
    var type = json.type;
    var url = json.url || false;
    var text = json.text;

    var img = url ?   {block: 'img', url: url} : '';
    var withoutImg = url ? false : true;

    ctx.content([
      {
        elem: 'left',

        content: [
          {
            elem: 'img',
            content: img
          },
          {
            elem: 'link',
            content: type
          }
        ]
      },
      {
        elem: 'right',
        content: [
          {
            elem: 'header',
            content: [
              {
                elem: 'title',
                content: title,
              },
              {
                mix: {block: 'offer-item', elem: 'btn'},
                block: 'btn',
                mods: {color: 'default'},
                content: 'Получить предложение'
              },
            ]
          },

          {
            elem: 'text',
            content: text
          }
        ]

      }


    ], true)
  })
};