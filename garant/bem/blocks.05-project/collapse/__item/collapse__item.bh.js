module.exports = function (bh) {
    bh.match(module.id.replace('.bh.js', '').match(/([^\\]+)?$/), function (ctx, json) {
        ctx.tag('li')
    })
};