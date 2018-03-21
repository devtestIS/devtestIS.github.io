module.exports = function(bh) {

    bh.match('btn', function(ctx, json) {
        ctx.mod('color', 'default');

        switch (ctx.tag()) {
          case 'div': break;
          case 'a':
            ctx
              .attr('role', 'button')
              .attr('href', json.url || '#');
            break;

          case 'input':
            ctx
              .attr('type', 'submit');
            break;

          case 'button':
          default:
            ctx
              .tag('button')
              .attr('type', 'submit');
        }
    });

};
