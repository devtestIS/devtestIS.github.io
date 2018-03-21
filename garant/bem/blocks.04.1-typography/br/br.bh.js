module.exports = function (bh) {
    bh.match('br', function (ctx, json) {
        ctx.tag('br');
    });
};