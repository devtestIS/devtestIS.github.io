module.exports = function (bh) {
    bh.match('table__colgroup', function (ctx, json) {
        if(!ctx.ctx.mods.pseudo){
            ctx.tag('colgroup')
        }
    })
}
