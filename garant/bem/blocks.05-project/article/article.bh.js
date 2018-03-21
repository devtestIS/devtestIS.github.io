module.exports = function (bh) {
  bh.match(module.id.replace('.bh.js', '').match(/([^\\]+)?$/), function (ctx, json) {
    var date = json.date;
    var title = json.title;
    var text = json.text;
    ctx.content([
      {
        elem: 'date', content: date
      },
      {
        elem: 'title',

        content: {block: 'link', content:  title}
      },
      {
        elem: 'text', content:{tag: 'p', content: text}
      }
    ], true);
  });
};