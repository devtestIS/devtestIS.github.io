module.exports = function (bh) {
    bh.match('table__th', function (ctx, json) {
        if(!ctx.ctx.mods.pseudo){
            ctx.tag('th')
        }
    })
}