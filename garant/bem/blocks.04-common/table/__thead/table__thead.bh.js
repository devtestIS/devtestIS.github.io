module.exports = function (bh) {
    bh.match('table__thead', function (ctx, json) {
        if(!ctx.ctx.mods.pseudo){
            ctx.tag('thead')
        }
    })
}