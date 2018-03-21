module.exports = function (bh) {
    bh.match(module.id.replace('.bh.js', '').match(/([^\\]+)?$/), function (ctx, json) {


        ctx.content(
          {
            block: 'link',
            content: [
              {
                elem: 'text',
                block: 'iv-logo',
                url: 'https://www.intervolga.ru/',
                content: 'Разработка сайта —'
              },
              {
                block: 'iv-logo',
                elem: 'container',
              }
            ]
          }

        , true);
    })
};

