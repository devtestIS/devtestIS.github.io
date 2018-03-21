module.exports = function (bh) {
    bh.match(module.id.replace('.bh.js', '').match(/([^\\]+)?$/), function (ctx, json) {
        var fs = require('fs');
        var html = fs.readFileSync('bem/blocks.05-project/svg-sprite/symbol/svg/sprite.symbol.svg', 'utf8');
        html = html.toString();
        ctx.content(html)
    })
};