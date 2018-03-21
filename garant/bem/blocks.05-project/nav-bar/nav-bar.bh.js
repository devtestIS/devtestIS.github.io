module.exports = function (bh) {

    bh.match(module.id.replace('.bh.js', '').match(/([^\\]+)?$/), function (ctx, json) {

        ctx.mix([{
                block: 'navbar'
            }]
        )
            .tag('nav');

        var content;
        if (typeof ctx.content()[0] === 'string') {
            content = ctx.content().map(function (item) {
                return [
                    {
                        elem: 'item',
                        tag: 'li',
                        content: {
                            tag: 'a',
                            attrs: {href: '#'},
                            content: item
                        }

                    }

                ];
            });


        }
      if (typeof ctx.content()[0] === 'object') {
        content = ctx.content().map(function (item) {
          return item;
        });
      }
      ctx.content([
        {
          block: "navbar-header",
          mix: [{block: 'visible-xs-block'}],
          content: [
            {

              tag: 'button',
              attrs: {
                // 'data-toggle': 'collapse',
                'data-target': '#bs-example-navbar-collapse-1',
                'aria-expanded': 'false'
              },
              mix: [
                {block: 'collapsed'},
                // {block: 'navbar-toggle'},
                {
                  block: 'collapse-button',
                  mods: {'navbar': true}
                }],
              content: [
                {
                  tag: 'span',
                  block: 'icon-bar'
                },
                {
                  tag: 'span',
                  block: 'icon-bar'
                },
                {
                  tag: 'span',
                  block: 'icon-bar'
                }
              ]
            },



            {
              block: 'nav-bar', elem: 'logo',
              content: {
               block: 'logo',
                content:{block: 'link', content: {block: 'img', url: 'logo.png'}}
              }

            }
          ],
        },
        {
          elem: 'list',
          tag: 'div',
          mix: [
            {block: 'collapse'},
            {block: 'navbar-collapse'}
          ],
          attrs: {
            id: 'bs-example-navbar-collapse-1',
            'aria-expanded': 'true',
            role: 'navigation'
          },
          content: [
            {
              block: 'nav-bar',
              elem: 'container',
              tag: 'ul',
              mix: [
                {block: 'navbar-nav'}
              ],
              content: content,

            }]

        }
      ], true);
    });
};