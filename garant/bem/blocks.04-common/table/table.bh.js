module.exports = function (bh) {
    bh.match('table', function (ctx, json) {
        if(!ctx.ctx.mods.pseudo){
            ctx.tag('table');
        }
    })
}